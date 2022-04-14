<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;
    protected $table = 'showtime';
    public $timestamps = false;
    protected $fillable = ['ID_SHOWTIME', 'ID_ROOM', 'ID_MOVIE', 'DAY_SHOWTIME', 'TIME_START', 'TIME_END'];
    protected $primaryKey = 'ID_SHOWTIME';
    public function room() {
        return $this->belongsTo(Room::class, 'ID_ROOOM', 'ID_ROOM');
    }

    public function movie() {
        return $this->belongsTo(Movie::class, 'ID_MOVIE', 'ID_MOVIE');
    }

    public function ticket() {
        return $this->hasMany(ticket::class);
    }
}
