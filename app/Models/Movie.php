<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $table = 'movie';
    protected $fillable = ['ID_MOVIE', 'ID_RATED', 'ID_GENRE', 'NAME_MOVIE', 'POSTER_MOVIE', 'TRAILER_MOVIE','DIRECTOR_MOVIE', 'ACTOR_MOVIE', 'CONTENT_MOVIE', 'STATUS_MOVIE'];

    public function genre() {
        return $this->belongsTo(Genre::class, 'ID_GENRE','ID_GENRE');
    }

    public function rated() {
        return $this->belongsTo(Rated::class,'ID_RATED', 'ID_RATED');
    }

    public function showtime() {
        return $this->hasMany(Showtime::class);
    }
}


