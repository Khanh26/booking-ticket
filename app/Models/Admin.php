<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admin';
    protected $fillable = ['ID_ADMIN', 'USERNAME', 'NAME_ADMIN', 'BIRTHDAY_ADMIN', 'GENDER_ADMIN', 'EMAIL_ADMIN', 'PHONE_ADMIN', 'ADDRESS_ADMIN'];

    public function account() {
        return $this->belongsTo(Account::class, 'USERNAME', 'USERNAME');
    }
}
