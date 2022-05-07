<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\Movie;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function home()
    {
        $movieShowing = Movie::with('suitable')->whereHas('showtime')->get();
        $movieComingSoon = Movie::with('suitable')->doesntHave('showtime')->where('STATUS_MOVIE', '=', 1)->get();
        return view('client.home')->with('data', [
            'movieShowing' => $movieShowing,
            'movieComingSoon' => $movieComingSoon,
        ]);   
    }
    
    public function about() {
        return view('client.about');
    }
    public function search(Request $request) {
        $movieShowing = Movie::with('suitable')->whereHas('showtime')->where('NAME_MOVIE','LIKE', '%'.$request->input('Search').'%')->get();
        $movieComingSoon = Movie::with('suitable')->doesntHave('showtime')->where('NAME_MOVIE','LIKE', '%'.$request->input('Search').'%')->where('STATUS_MOVIE', '=', 1)->get();
        return view('client.search')->with('data', [
            'movieShowing' => $movieShowing,
            'movieComingSoon' => $movieComingSoon,
            'search' => $request->input('Search')
        ]);   
    }
}
