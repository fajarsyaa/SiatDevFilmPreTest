<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'film';
    protected $primaryKey = 'id_film';

    protected $fillable = [
        'id_film',
        'judul',
        'sinopsis',
        'publisher',
        'durasi',
        'id_kategori',
        'path_video'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function detailFilm()
    {
        return $this->hasOne(DetailFilm::class,'film_id');
    }
}
