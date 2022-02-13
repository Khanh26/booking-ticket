<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class newsController extends Controller
{
    public function showNews() {
        return view('client.news');
    }

    public function showReviewMovie() {
        return view('client.news');
    }

    public function showCinemaCorner() {
        return view('client.news');
    }

    public function showPromotion() {
        return view('client.news');
    }
}
