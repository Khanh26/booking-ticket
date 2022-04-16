<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $table = 'movie';
    public $timestamps = false;
    protected $fillable = ['ID_MOVIE', 'ID_RATED', 'NAME_MOVIE', 'POSTER_MOVIE', 'TRAILER_MOVIE','DIRECTOR_MOVIE', 'ACTOR_MOVIE', 'CONTENT_MOVIE', 'STATUS_MOVIE'];
    protected $primaryKey = 'ID_MOVIE';
    public function genre() {
        return $this->belongsToMany(Genre::class);
    }

    public function rated() {
        return $this->belongsTo(Rated::class, 'ID_RATED', 'ID_RATED');
    }

    public function showtime() {
        return $this->hasMany(Showtime::class);
    }
}


