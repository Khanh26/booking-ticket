<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table = 'account';
    public $timestamps = false;
    protected $fillable = ['USERNAME', 'PASSWORD', 'ROLE', 'STATUS'];
    protected $primaryKey = 'USERNAME';
    
    public function member() {
        return $this->hasMany(Member::class);
    }

    public function admin() {
        return $this->hasMany(Admin::class);
    }
}
