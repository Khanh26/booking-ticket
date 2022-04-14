<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rated extends Model
{
    use HasFactory;
    protected $table = 'rated';
    public $timestamps = false;
    protected $fillable = ['ID_RATED', 'NOTE_RATED'];
    protected $primaryKey = 'ID_RATED';
    public function movie() {
        return $this->hasMany(Movie::class);
    }
}
