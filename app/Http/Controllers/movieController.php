<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function show() {
        return view('client.movie');
    }

    public function showDetails() {
        return view('client.detailsMovie');
    }

    public function getAllMovie() {
        $movie = Movie::with('genre', 'rated')->get();
        return response()->json($movie);
    }
}
