<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ShowTimeController;
use App\Http\Controllers\TicketController;
use App\Models\Ticket;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// movie
Route::get('/reportMovieTicket',[MovieController::class, 'reportMovieTicket']);
Route::get('/reportMoviePrice',[MovieController::class, 'reportMoviePrice']);
Route::get('/getAllMovie',[MovieController::class, 'getAllMovie']);
Route::get('/getMovieByName',[MovieController::class, 'getMovieByName']);
Route::get('/getMovieById', [MovieController::class, 'getMovieById']);
Route::get('/getMovieByStatus/{status}', [MovieController::class, 'getMovieByStatus']);
Route::get('/filterMovie',[MovieController::class, 'filterMovie']);
Route::post('/createMovie', [MovieController::class, 'create']);
Route::delete('/deleteMovie/{idMovies}', [MovieController::class, 'remove']);
Route::put('/updateMovie/{idMovie}', [MovieController::class, 'update']);
// Route::post('/registerAdmin', [AuthController::class, 'postRegisterAdmin']);
// genre
Route::get('/getAllGenre',[GenreController::class, 'getAllGenre']);
// Showtime
Route::get('/getShowtimeById/{idShowtime}', [ShowTimeController::class, 'getShowtimeById']);
Route::get('/getAllShowTime/{number}', [ShowTimeController::class, 'getAllShowTime']);
Route::get('/getTimeByDay/{idMovie}', [ShowTimeController::class, 'getTimeByDay']);

Route::post('/isTimeShowtime', [ShowTimeController::class, 'isTime']);
Route::post('/createShowtime', [ShowTimeController::class, 'create']);
Route::put('/updateShowtime/{idShowtime}', [ShowTimeController::class, 'update']);
Route::delete('/removeShowtime/{idShowtime}', [ShowTimeController::class, 'remove']);
Route::delete('/getIdShowTime', [ShowTimeController::class, 'getIdShowTime']);
// ticket
Route::get('/getChair/{idShowtime}', [TicketController::class, 'getChair']);
Route::get('/getAllTicket', [TicketController::class, 'getAllTicket']);
Route::post('/createTicket', [TicketController::class, 'create']);
Route::get('/getticket', [TicketController::class, 'getAll']);

