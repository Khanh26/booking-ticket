<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typepost extends Model
{
    use HasFactory;
    protected $table = 'typepost';
    protected $fillable = ['ID_TYPEPOST', 'NAME_TYPEPOST'];

    public function post() {
        return $this->hasMany(Post::class);
    }
}
