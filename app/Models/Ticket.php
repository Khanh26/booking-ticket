<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'ticket';
    public $timestamps = false;
    protected $fillable = ['ID_TICKET', 'ID_SHOWTIME', 'ID_MEMBER', 'DAY_TICKET', 'LOCATION_TICKET'];
    public function showtime() {
        return $this->belongsTo(Showtime::class,'ID_SHOWTIME', 'ID_SHOWTIME');
    }

    public function member() {
        return $this->belongsTo(Member::class,'ID_MEMBER', 'ID_MEMBER');
    }
}
