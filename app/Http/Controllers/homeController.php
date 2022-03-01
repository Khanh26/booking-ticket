<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
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

    public function login() {
        return view('client.login');
    }

    public function register() {
        return view('client.register');
    }
}
