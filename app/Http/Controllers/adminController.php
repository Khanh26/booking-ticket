<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin() {
        return view('admin.home');
    }

    public function pageShowMovie() {
        return view('admin.pageShowMovie');
    }

    public function pageUpdateMovie() {
        return view('admin.pageUpdateMovie');
    }
}
