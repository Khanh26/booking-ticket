<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class movieController extends Controller
{
    public function show() {
        return view('client.movie');
    }
}