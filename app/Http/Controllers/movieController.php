<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function show() {
        return view('client.movie');
    }

    public function showDetails() {
        return view('client.detailsMovie');
    }

}
