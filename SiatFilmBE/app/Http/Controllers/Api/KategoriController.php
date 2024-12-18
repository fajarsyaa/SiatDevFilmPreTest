<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $rc = 200;
        $message = "sukses";
        $kategori = Kategori::all();

        if ($kategori->isEmpty()) {
            $rc = 404;
            $message = "data tidak ditemukan";
        }

        $response = [
            'message' =>  $message,
            'code' => $rc,
            'data' => $kategori->makeHidden(['created_at', 'updated_at']),
        ];

        return response()->json($response, $rc);
    }
}
