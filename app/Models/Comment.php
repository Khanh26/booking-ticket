<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $fillable = ['ID_COMMENT', 'ID_POST', 'ID_MEMBER', 'DAY_COMMENT', 'CONTENT_COMMENT'];

    public function post() {
        return $this->belongsTo(Post::class, 'ID_POST', 'ID_POST');
    }

    public function member() {
        return $this->belongsTo(Member::class, 'ID_MEMBER', 'ID_MEMBER');
    }
}
