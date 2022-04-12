<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';
    protected $fillable = ['ID_POST', 'ID_TYPEPOST', 'ID_ADMIN','TITLE_POST', 'CONTENT_POST', 'DAY_POST', 'STATUS_POST', 'SUBTITLE_POST'];

    public function typepost() {
        return $this->belongsTo(Typepost::class ,'ID_TYPEPOST', 'ID_TYPEPOST');
    }

    public function admin() {
        return $this->belongsTo(Admin::class, 'ID_ADMIN', 'ID_ADMIN');
    }

    public function rate() {
        return $this->hasMany(Rate::class);
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }

}
