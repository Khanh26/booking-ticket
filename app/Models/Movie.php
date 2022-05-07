<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $table = 'movie';
    public $timestamps = false;
    protected $primaryKey = 'ID_MOVIE';
    protected $fillable = ['ID_MOVIE', 'ID_SUITABLE', 'ID_LANGUAGE','NAME_MOVIE', 'POSTER_MOVIE', 'TIME_MOVIE', 'OPDAY_MOVIE', 'TRAILER_MOVIE','DIRECTOR_MOVIE', 'ACTOR_MOVIE', 'CONTENT_MOVIE', 'STATUS_MOVIE'];
    public function genre() {
        return $this->belongsToMany(Genre::class);
    }

    public function suitable() {
        return $this->belongsTo(Suitable::class, 'ID_SUITABLE', 'ID_SUITABLE');
    }

    public function language() {
        return $this->belongsTo(Language::class, 'ID_LANGUAGE', 'ID_LANGUAGE');
    }

    public function showtime() {
        return $this->hasMany(Showtime::class, 'ID_MOVIE', 'ID_MOVIE');
    }
}


