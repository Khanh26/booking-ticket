<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Showtime;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function checkOut($idMovie) {
        $movie = Movie::with('suitable')
        ->whereHas('showtime', function($query) {
            $query->where('DAY_SHOWTIME', '>=', Carbon::now()->toDateString());
        })
        ->where('ID_MOVIE', '=', $idMovie)->first();

        if($movie) {
            $showtime = Showtime::where('ID_MOVIE', '=', $idMovie)
            ->where('DAY_SHOWTIME', '>=', Carbon::now()->toDateString() )
            ->orderBy('DAY_SHOWTIME', 'ASC')
            ->groupBy('DAY_SHOWTIME')->get('DAY_SHOWTIME');
            return view('client.checkout')->with('data', [
                'movie' => $movie,
                'day_show' => $showtime,
            ]);
        } else {
            echo '404';
        }
    }

    
    
}
