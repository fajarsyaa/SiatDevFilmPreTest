<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailFilm extends Model
{
    protected $table = 'detail_film';
    protected $primaryKey = 'id_detail';

    public function film()
    {
        return $this->belongsTo(Film::class, 'film_id', 'id_film');
    }
}