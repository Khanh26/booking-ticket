<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Showtime;
use App\Models\Movie;

class ShowTimeController extends Controller
{

    public function create(Request $request) {
        $data = [
            'ID_MOVIE' => $request->ID_MOVIE,
            'ID_ROOM' => $request->ID_ROOM,
            'DAY_SHOWTIME' => $request->DAY_SHOWTIME,
            'TIME_START' => $request->TIME_START,
            'TIME_END' => $request->TIME_END,
            'PRICE_SHOWTIME' => $request->PRICE_SHOWTIME,
        ];
        $showtime = Showtime::create($data);
        if($showtime) {
            return response()->json(['message' => 'success']);
        } else {
            return response()->json(['message' => 'error']);
        }
    }

    public function update(Request $request, $idShowtime) {
        $data = [
            'ID_MOVIE' => $request->ID_MOVIE,
            'ID_ROOM' => $request->ID_ROOM,
            'DAY_SHOWTIME' => $request->DAY_SHOWTIME,
            'TIME_START' => $request->TIME_START,
            'TIME_END' => $request->TIME_END,
            'PRICE_SHOWTIME' => $request->PRICE_SHOWTIME,
        ];
        $showtime = Showtime::where('ID_SHOWTIME', '=', $idShowtime)->first();
        $showtime->update($data);
        if($showtime) {
            return response()->json(['message' => 'success']);
        } else {
            return response()->json(['message' => 'error']);
        }
    }

    public function getShowtimeById($idShowtime) {
        $showtime = Showtime::where('ID_SHOWTIME', '=', $idShowtime)->first();
        return response()->json($showtime);
    }

    public function getAllShowTime($number)
    {
        $dayNow = Carbon::now()->addDay($number * 7);
        $nextWeek = Carbon::now()->addDay($number * 7 + 7);
        $day_show = Showtime::whereBetween('DAY_SHOWTIME', [$dayNow->toDateString(), $nextWeek->toDateString()])
            ->orderBy('DAY_SHOWTIME', 'ASC')
            ->groupBy('DAY_SHOWTIME')->get('DAY_SHOWTIME');
        $data = [];
        for ($i = 0; $i < count($day_show); $i++) {
            $showTime = Showtime::with('room', 'movie')->where('DAY_SHOWTIME', '=', $day_show[$i]['DAY_SHOWTIME'])->orderBy('TIME_START', 'ASC')->get();
            array_push($data, [
                'DAY_SHOWTIME' => $day_show[$i]['DAY_SHOWTIME'],
                'SHOWTIME' => $showTime,
            ]);
        }
        return response()->json($data);
    }

    public function remove($idShowtime) {
        $showtime = Showtime::where('ID_SHOWTIME', '=', $idShowtime)->first();
        if($showtime->delete()) {
            return  response()->json(['result' => 'success']);
        }else {
            return  response()->json(['result' => 'error']);
        }

    }

    public function isTime(Request $request)
    {
        $timeMovie = Movie::where('ID_MOVIE', '=', $request->movie)->get('TIME_MOVIE')->first();
        $newTime = Carbon::create(null, null, null, explode(':', $request->time_start)[0], explode(':', $request->time_start)[1])->addMinutes($timeMovie['TIME_MOVIE'] + 15)->toTimeString();

        $showTimeStart = Showtime::where('ID_ROOM', '=', $request->room)
            ->where('ID_MOVIE', '=', $request->movie)
            ->where('DAY_SHOWTIME', '=', $request->day_show)
            ->where('TIME_START', '<=', $request->time_start)
            ->where('TIME_END', '>=', $request->time_start)->count();


        if ($showTimeStart > 0) {
            return response()->json([
                'message' => 'error',
                'time_end' => $newTime,
            ]);
        } else {
            $showTimeEnd = Showtime::where('ID_ROOM', '=', $request->room)
                ->where('ID_MOVIE', '=', $request->movie)
                ->where('DAY_SHOWTIME', '=', $request->day_show)
                ->where('TIME_START', '<=', $newTime)
                ->where('TIME_END', '>=', $newTime)->count();
            if ($showTimeEnd > 0) {
                return response()->json([
                    'message' => 'error',
                    'time_end' => $newTime,
                ]);
            } else {
                return response()->json([
                    'message' => 'success',
                    'time_end' => $newTime,
                ]);
            }
        }
    }

    public function getTimeByDay(Request $request, $idMovie) {
        $showtime = Showtime::where('ID_MOVIE', '=', $idMovie)
        ->where('DAY_SHOWTIME', '=', $request->day_showtime)->get(['ID_SHOWTIME','PRICE_SHOWTIME','TIME_START','TIME_END']);
        if($showtime) {
            return response()->json($showtime);
        }
    }

    public function getIdShowTime(Request $request) {
        $showtime = Showtime::where('ID_MOVIE', '=', $request->id_movie)
        ->where('DAY_SHOWTIME', '=', $request->day_showtime)
        ->where('TIME_START', '=', $request->time_start)
        ->where('TIME_END', '=', $request->time_end)
        ->get('ID_SHOWTIME')->first();
        if($showtime) {
            return response()->json($showtime);
        }
    }
}
