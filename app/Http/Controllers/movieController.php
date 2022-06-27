<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class MovieController extends Controller
{
    public function show()
    {
        $movieShowing = Movie::with('suitable')->whereHas('showtime', function ($query) {
            $query->where('DAY_SHOWTIME', '>=', Carbon::now()->toDateString());
        })
        ->get();

        $movieComingSoon = Movie::with('suitable')->doesntHave('showtime')->where('STATUS_MOVIE', '=', 1)->get();
        return view('client.movie')->with('data', [
            'movieShowing' => $movieShowing,
            'movieComingSoon' => $movieComingSoon,
        ]);
    }

    public function showDetails($idMovie)
    {
        $movie = Movie::with('genre', 'suitable', 'language')->where('ID_MOVIE','=',$idMovie)->first();
        return view('client.detailsMovie')->with('data', $movie);
    }

    public function update(Request $request, $idMovie)
    {
        $image = $request->POSTER_MOVIE;
        if ($image != '') {
            $image->move('img/poster', $image->getClientOriginalName());
            $genres = explode('-', $request->GENRES);
            $newMovie = [
                'ID_SUITABLE' => $request->ID_SUITABLE,
                'ID_LANGUAGE' => $request->ID_LANGUAGE,
                'NAME_MOVIE' => $request->NAME_MOVIE,
                'POSTER_MOVIE' => $image->getClientOriginalName(),
                'TIME_MOVIE' => $request->TIME_MOVIE,
                'TRAILER_MOVIE' => $request->TRAILER_MOVIE,
                'OPDAY_MOVIE' => $request->OPDAY_MOVIE,
                'DIRECTOR_MOVIE' => $request->DIRECTOR_MOVIE,
                'ACTOR_MOVIE' => $request->ACTOR_MOVIE,
                'CONTENT_MOVIE' => $request->CONTENT_MOVIE,
                'STATUS_MOVIE' => $request->STATUS_MOVIE,
            ];
    
            $movie = Movie::where('ID_MOVIE', '=', $idMovie)->first();
            $movie->update($newMovie);
            $movie->genre()->detach();
            if($movie) {
                foreach ($genres as $key => $value) {
                    $movie->genre()->attach($value);
                }
                return response()->json(['result' => 'success']);
            } 
            else {
                return response()->json(['result' => 'error']);
            }
        } else {
            $genres = explode('-', $request->GENRES);
            $newMovie = [
                'ID_SUITABLE' => $request->ID_SUITABLE,
                'ID_LANGUAGE' => $request->ID_LANGUAGE,
                'NAME_MOVIE' => $request->NAME_MOVIE,
                'TIME_MOVIE' => $request->TIME_MOVIE,
                'TRAILER_MOVIE' => $request->TRAILER_MOVIE,
                'OPDAY_MOVIE' => $request->OPDAY_MOVIE,
                'DIRECTOR_MOVIE' => $request->DIRECTOR_MOVIE,
                'ACTOR_MOVIE' => $request->ACTOR_MOVIE,
                'CONTENT_MOVIE' => $request->CONTENT_MOVIE,
                'STATUS_MOVIE' => $request->STATUS_MOVIE,
            ];
    
            $movie = Movie::where('ID_MOVIE', '=', $idMovie)->first();
            $movie->update($newMovie);
            $movie->genre()->detach();
            if($movie) {
                foreach ($genres as $key => $value) {
                    $movie->genre()->attach($value);
                }
                return response()->json(['result' => 'success']);
            } 
            else {
                return response()->json(['result' => 'error']);
            }
        }
    }

    public function create(Request $request)
    {
        $image = $request->POSTER_MOVIE;
        $image->move('img/poster', $image->getClientOriginalName());
        $genres = explode('-', $request->GENRES);

        $newMovie = [
            'ID_SUITABLE' => $request->ID_SUITABLE,
            'ID_LANGUAGE' => $request->ID_LANGUAGE,
            'NAME_MOVIE' => $request->NAME_MOVIE,
            'POSTER_MOVIE' => $image->getClientOriginalName(),
            'TIME_MOVIE' => $request->TIME_MOVIE,
            'TRAILER_MOVIE' => $request->TRAILER_MOVIE,
            'OPDAY_MOVIE' => $request->OPDAY_MOVIE,
            'DIRECTOR_MOVIE' => $request->DIRECTOR_MOVIE,
            'ACTOR_MOVIE' => $request->ACTOR_MOVIE,
            'CONTENT_MOVIE' => $request->CONTENT_MOVIE,
        ];

        $movie = Movie::create($newMovie);
        if ($movie) {
            foreach ($genres as $key => $value) {
                $movie->genre()->attach($value);
            }
            return response()->json(['result' => 'success']);
        } else {
            return response()->json(['result' => 'error']);
        }
        
    }

    public function remove($idMovies)
    {
        $movie = Movie::whereIn('ID_MOVIE', explode('-', $idMovies))->get();
        foreach ($movie as $key => $value) {
            if (!$value->genre()->detach() || !$value->delete()) {
                return response()->json(['result' => 'error']);
                break;
            }
        }
        return  response()->json(['result' => 'success']);
    }

    public function getAllMovie()
    {
        $movie = Movie::with('genre', 'suitable', 'language')->orderBy('ID_MOVIE', 'desc')->get();
        return response()->json($movie);
    }

    public function getMovieByName(Request $request)
    {
        $movie = Movie::where('NAME_MOVIE', 'like', '%' . $request->search . '%')->get();;
        return response()->json($movie);
    }

    public function getMovieById(Request $request)
    {
        $movie = Movie::with('genre', 'suitable', 'language')
            ->where('ID_MOVIE', '=', $request->id)->first();
        return response()->json($movie);
    }

    public function getMovieByStatus($status) {
        $movie = Movie::with('genre', 'suitable', 'language')
            ->where('STATUS_MOVIE', '=', $status)->get();
        return $movie;
    }

    public function filterMovie(Request $request)
    {
        $genres = $request->genres;
        $suitable = $request->suitable;
        $status = $request->status;
        $language = $request->language;
        $movie = Movie::whereHas('genre', function ($query) use ($genres) {
            if (strlen($genres) > 0) {
                $query->whereIn('ID_GENRE', explode('-', $genres));
            }
        })
            ->where(function ($query) use ($suitable) {
                if (strlen($suitable) > 0) {
                    $query->whereIn('ID_SUITABLE', explode('-', $suitable));
                }
            })->where(function ($query) use ($status) {
                if (strlen($status) > 0) {
                    $query->whereIn('STATUS_MOVIE', explode('-', $status));
                }
            })->where(function ($query) use ($language) {
                if (strlen($language) > 0) {
                    $query->whereIn('ID_LANGUAGE', explode('-', $language));
                }
            })->get();
        return response()->json($movie);
    }

    public function reportMovieTicket() {
        $movieShowing = Movie::select('movie.NAME_MOVIE', DB::raw('count(*) as total'))
        ->join('showtime', 'showtime.ID_MOVIE', '=', 'movie.ID_MOVIE')
        ->join('ticket', 'ticket.ID_SHOWTIME', '=', 'showtime.ID_SHOWTIME')
        ->groupBy('movie.NAME_MOVIE')
        ->get();
        return response()->json($movieShowing);
    }

    public function reportMoviePrice() {
        $movieShowing = Movie::select('movie.NAME_MOVIE', DB::raw('SUM(showtime.PRICE_SHOWTIME) as total'))
        ->join('showtime', 'showtime.ID_MOVIE', '=', 'movie.ID_MOVIE')
        ->join('ticket', 'ticket.ID_SHOWTIME', '=', 'showtime.ID_SHOWTIME')
        ->groupBy('movie.NAME_MOVIE')
        ->get();
        return response()->json($movieShowing);
    }
}
