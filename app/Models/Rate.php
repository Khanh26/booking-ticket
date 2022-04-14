<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $table = 'rate';
    public $timestamps = false;
    protected $fillable = ['ID_RATE', 'ID_MEMBER', 'ID_POST', 'POINT_RATE', 'DAY_RATE'];
    protected $primaryKey = 'ID_RATE';
    public function member() {
        return $this->belongsTo(Member::class , 'ID_MEMBER', 'ID_MEMBER');
    }

    public function post() {
        return $this->belongsTo(Post::class, 'ID_POST', 'ID_POST');
    }

}
