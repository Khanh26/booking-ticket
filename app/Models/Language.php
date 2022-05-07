<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $table = 'language';
    public $timestamps = false;
    protected $fillable = ['ID_LANGUAGE', 'NAME_LANGUAGE'];
    protected $primaryKey = 'ID_LANGUAGE';

    public function movie() {
        return $this->hasMany(Movie::class, 'ID_LANGUAGE', 'ID_LANGUAGE');
    }
}
