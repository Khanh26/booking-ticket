<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
class GenreController extends Controller
{
    public function getAllGenre() {
        $genres = Genre::all();
        return response()->json($genres);
    }

    public function create() {
        
    }
}
