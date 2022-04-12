<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table = 'account';
    protected $fillable = ['USERNAME', 'PASSWORD', 'ROLE', 'TOKEN', 'VERIFY', 'STATUS'];
    
    public function member() {
        return $this->hasMany(Member::class);
    }

    public function admin() {
        return $this->hasMany(Admin::class);
    }
}
