<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suitable extends Model
{
    use HasFactory;
    protected $table = 'suitable';
    public $timestamps = false;
    protected $fillable = ['ID_SUITABLE', 'NOTE_SUITABLE'];
    protected $primaryKey = 'ID_SUITABLE';
    public function movie() {
        return $this->hasMany(Movie::class, 'ID_SUITABLE', 'ID_SUITABLE');
    }
}
