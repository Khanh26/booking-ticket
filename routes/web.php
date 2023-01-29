<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TicketController;

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
Route::prefix('/')->group(function() {
    Route::get('/', [HomeController::class,'home'])->name('home');
    Route::get('/dang-nhap', [AuthController::class,'login'])->name('login');
    Route::get('/dang-ky', [AuthController::class,'register'])->name('register');
    Route::get('/dang-xuat', [AuthController::class, 'logout'])->name('logout');
    Route::post('/dang-nhap',[AuthController::class, 'postLogin'])->name('postLogin');
    Route::post('/dang-ky',[AuthController::class, 'postRegister'])->name('postRegister');
    Route::get('/ve-cua-toi',[TicketController::class, 'show'])->name('ticket');


    Route::get('/tim-kiem', [HomeController::class,'search'])->name('search');
    Route::prefix('phim')->group( function() {
        Route::get('/', [MovieController::class,'show'])->name('movie');
        Route::get('/{idMovie}', [MovieController::class,'showDetails'])->name('detailsMovie');
        Route::get('/dat-ve/{idMovie}', [BookingController::class,'checkOut'])->name('checkout');
    });

    Route::prefix('tin-tuc')->group(function() {
        Route::get('/', [NewsController::class, 'showNews'])->name('news');
        Route::get('/review-phim', [NewsController::class, 'showReviewMovie'])->name('reviewMovie');
        Route::get('/goc-dien-anh', [NewsController::class, 'showCinemaCorner'])->name('cinemaCorner');
        Route::get('khuyen-mai',[NewsController::class, 'showPromotion'])->name('promotion');
    });
    Route::get('/gioi-thieu', [HomeController::class,'about'])->name('about');
});

// admin
Route::prefix('/admin')->group(function() {
    Route::get('/', [AdminController::class,'admin'])->name('admin');
    Route::get('/dang-nhap', [AuthController::class,'loginAdmin'])->name('loginAdmin');
    Route::post('/dang-nhap', [AuthController::class,'postLoginAdmin'])->name('postLoginAdmin');
    Route::get('/dang-xuat', [AuthController::class,'logoutAdmin'])->name('logoutAdmin');
    Route::get('/sap-lich-chieu-phim', [AdminController::class,'pageShowMovie'])->name('pageShowMovie');
    Route::get('/cap-nhap-phim', [AdminController::class,'pageUpdateMovie'])->name('pageUpdateMovie');
});
