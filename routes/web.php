<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\movieController;
use App\Http\Controllers\newsController;
use App\Http\Controllers\adminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [homeController::class,'home'])->name('home');

Route::get('/dang-nhap', [homeController::class,'login'])->name('login');
Route::get('/dang-ky', [homeController::class,'register'])->name('register');

Route::post('dang-ky', []);

Route::get('/tim-kiem', [homeController::class,'search'])->name('search');
Route::prefix('phim')->group( function() {
    Route::get('/', [movieController::class,'show'])->name('movie');
    Route::get('/chitiet', [movieController::class,'showDetails'])->name('detailsMovie');
});

Route::prefix('tin-tuc')->group(function() {
    Route::get('/', [newsController::class, 'showNews'])->name('news');
    Route::get('/review-phim', [newsController::class, 'showReviewMovie'])->name('reviewMovie');
    Route::get('/goc-dien-anh', [newsController::class, 'showCinemaCorner'])->name('cinemaCorner');
    Route::get('khuyen-mai',[newsController::class, 'showPromotion'])->name('promotion');
});
Route::get('/gioi-thieu', [homeController::class,'about'])->name('about');

// admin
Route::prefix('/admin')->group(function() {
    Route::get('/', [adminController::class,'admin'])->name('admin');
    Route::get('/sap-lich-chieu-phim', [adminController::class,'pageShowMovie'])->name('pageShowMovie');
    Route::get('/cap-nhap-phim', [adminController::class,'pageUpdateMovie'])->name('pageUpdateMovie');
});