<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function home()
    {
        return view('client.home');
        
    }
    
    public function about() {
        return view('client.about');
    }

    public function search(Request $request) {
        return view('client.search')->with('resultSearch',$request->input('Search'));
        // return view('client.search');
    }
}
