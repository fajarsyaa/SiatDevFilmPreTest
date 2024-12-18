<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(Request $request)
    {
        $query = Film::query();

        // Filter judul
        if ($request->has('judul')) {
            $query->where('judul', 'like', '%' . $request->judul . '%');
        }

        // Filter kategori
        if ($request->has('kategori')) {            
            $query->where('id_kategori', $request->kategori);
        }

        // tidak ada filter
        if (!$request->has('kategori') && !$request->has('judul')) {
            $query->orderBy('created_at', 'desc')->limit(10);
        }

        $films = $query->paginate(12);
        $rc = 200;
        $message = "sukses";
        if ($films->isEmpty()) {
            $rc = 404;
            $message = "data tidak ditemukan";
        }

        $response = [
            'message' =>  $message,
            'code' => $rc,
            'data' => $films,
        ];


        return response()->json($response,  $rc);
    }

    public function detail($id)
    {
        $film = Film::with('detailFilm')->find($id);

        $rc = 200;
        $message = "sukses";
        if (!$film) {
            $rc = 404;
            $message = "data tidak ditemukan";
        }

        $response = [
            'message' =>  $message,
            'code' => $rc,
            'data' => $film->makeHidden(['created_at', 'updated_at']),
        ];
        return response()->json($response, 200);
    }
}
