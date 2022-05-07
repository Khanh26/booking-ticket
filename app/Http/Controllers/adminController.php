<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Language;
use App\Models\Suitable;
use App\Models\Movie;
use App\Models\Room;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function admin() {
        $movieShowing = Movie::whereHas('showtime')->count();
        $movieComingSoon = Movie::doesntHave('showtime')->where('STATUS_MOVIE', '=', 1)->count();
        return view('admin.home')->with('data', [
            'movieShowing' =>  $movieShowing,
            'movieComingSoon'=> $movieComingSoon
        ]);
    }

    public function pageShowMovie() {
        $movie = Movie::with('genre', 'suitable', 'language')
            ->where('STATUS_MOVIE', '=', 1)->get();
        $room = Room::all();
        $currentDate = Carbon::now()->toDateString();
        return view('admin.pageShowMovie')
        ->with('data', [
            'movie' => $movie,
            'room' => $room,
            'currentDate' => $currentDate,
        ]);
    }

    public function pageUpdateMovie() {
        $genres = Genre::all();
        $suitable = Suitable::all();
        $language = Language::all();
        return view('admin.pageUpdateMovie')
            ->with('data', [
                'genres' => $genres, 
                'suitable' => $suitable,
                'language' => $language,
            ]);
    }
}
