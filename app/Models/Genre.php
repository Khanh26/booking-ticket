<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $table = 'genre';
    public $timestamps = false;
    protected $fillable = ['ID_GENRE', 'NAME_GENRE'];
    protected $primaryKey = 'ID_GENRE';
    
    public function movie() {
        return $this->belongsToMany(Movie::class);
    }
}
