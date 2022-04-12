<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $table = 'genre';
    protected $fillable = ['ID_GENRE', 'NAME_GENRE'];

    public function movie() {
        return $this->hasMany(Movie::class);
    }
}
