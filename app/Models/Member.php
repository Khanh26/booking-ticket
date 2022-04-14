<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'member';
    public $timestamps = false;
    protected $fillable = ['ID_MEMBER', 'USERNAME', 'NAME_MEMBER', 'BIRTHDAY_MEMBER', 'GENDER_MEMBER', 'EMAIL_MEMBER', 'PHONE_MEMBER', 'ADDRESS_MEMBER'];
    protected $primaryKey = 'ID_MEMBER';
    
    public function account() {
        return $this->belongsTo(Account::class, 'USERNAME', 'USERNAME');
    }

    public function ticket() {
        return $this->hasMany(Ticket::class);
    }
}
