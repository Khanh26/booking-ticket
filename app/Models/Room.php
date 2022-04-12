<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'room';
    protected $fillable = ['ID_ROOM', 'NAME_ROOM'];

    public function showtime() {
        return $this->hasMany(Showtime::class);
    }

}
