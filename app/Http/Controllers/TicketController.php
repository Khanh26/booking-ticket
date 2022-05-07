<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use LDAP\Result;

class TicketController extends Controller
{
    public function show()
    {
        return view('client.ticket');
    }

    public function getChair($idShowtime)
    {
        $ticket = Ticket::where('ID_SHOWTIME', '=', $idShowtime)->get('LOCATION_TICKET');
        if ($ticket) {
            return response()->json($ticket);
        } else {
            return response()->json(['message', 'error']);
        }
    }

    public function getAllTicket(Request $request)
    {
        if ($request->filter == 'dayUp') {
            $ticket = Ticket::join('member', 'member.ID_MEMBER', '=', 'ticket.ID_MEMBER')
                ->join('showtime', 'showtime.ID_SHOWTIME', '=', 'ticket.ID_SHOWTIME')
                ->join('movie', 'movie.ID_MOVIE', '=', 'showtime.ID_MOVIE')
                ->where('ticket.ID_MEMBER', '=', $request->ID_MEMBER)->orderBy('DAY_TICKET', 'DESC')->get();
                return response()->json($ticket);
        }
        if ($request->filter == 'dayDown') {
            $ticket = Ticket::join('member', 'member.ID_MEMBER', '=', 'ticket.ID_MEMBER')
                ->join('showtime', 'showtime.ID_SHOWTIME', '=', 'ticket.ID_SHOWTIME')
                ->join('movie', 'movie.ID_MOVIE', '=', 'showtime.ID_MOVIE')
                ->where('ticket.ID_MEMBER', '=', $request->ID_MEMBER)->orderBy('DAY_TICKET', 'ASC')->get();
                return response()->json($ticket);
        }
        if ($request->filter == 'valueUp') {
            $ticket = Ticket::join('member', 'member.ID_MEMBER', '=', 'ticket.ID_MEMBER')
                ->join('showtime', 'showtime.ID_SHOWTIME', '=', 'ticket.ID_SHOWTIME')
                ->join('movie', 'movie.ID_MOVIE', '=', 'showtime.ID_MOVIE')
                ->where('ticket.ID_MEMBER', '=', $request->ID_MEMBER)->orderBy('PRICE_SHOWTIME', 'DESC')->get();
                return response()->json($ticket);
        }
        if ($request->filter == 'valueDown') {
            $ticket = Ticket::join('member', 'member.ID_MEMBER', '=', 'ticket.ID_MEMBER')
                ->join('showtime', 'showtime.ID_SHOWTIME', '=', 'ticket.ID_SHOWTIME')
                ->join('movie', 'movie.ID_MOVIE', '=', 'showtime.ID_MOVIE')
                ->where('ticket.ID_MEMBER', '=', $request->ID_MEMBER)->orderBy('PRICE_SHOWTIME', 'ASC')->get();
                return response()->json($ticket);
        }
        if ($request->filter == 'value') {
            $ticket = Ticket::join('member', 'member.ID_MEMBER', '=', 'ticket.ID_MEMBER')
                ->join('showtime', 'showtime.ID_SHOWTIME', '=', 'ticket.ID_SHOWTIME')
                ->join('movie', 'movie.ID_MOVIE', '=', 'showtime.ID_MOVIE')
                ->where('ticket.ID_MEMBER', '=', $request->ID_MEMBER)
                ->where('showtime.DAY_SHOWTIME', '>=', Carbon::now()->toDateString())
                ->where('showtime.TIME_END', '>', Carbon::now()->toTimeString())
                ->orderBy('DAY_TICKET', 'ASC')->get();
                return response()->json($ticket);
        }

        if ($request->filter == 'noValue') {
            $ticket = Ticket::join('member', 'member.ID_MEMBER', '=', 'ticket.ID_MEMBER')
                ->join('showtime', 'showtime.ID_SHOWTIME', '=', 'ticket.ID_SHOWTIME')
                ->join('movie', 'movie.ID_MOVIE', '=', 'showtime.ID_MOVIE')
                ->where('ticket.ID_MEMBER', '=', $request->ID_MEMBER)
                ->where('showtime.DAY_SHOWTIME', '<', Carbon::now()->toDateString())
                ->where('showtime.TIME_END', '<=', Carbon::now()->toTimeString())
                ->orderBy('DAY_TICKET', 'ASC')->get();
                return response()->json($ticket);
        }
        
    }

    public function getAll() {
        $ticket = Ticket::all();
        return response()->json($ticket);
    }

    public function create(Request $request)
    {
        $chairs = explode('-', $request->LOCATION_TICKET);

        foreach ($chairs as $key => $value) {
            $ID_TICKET = '' . $request->ID_SHOWTIME . '' . $value . '' . Carbon::now()->timestamp;
            $ticket = Ticket::create([
                'ID_TICKET' => $ID_TICKET,
                'ID_SHOWTIME' => $request->ID_SHOWTIME,
                'ID_MEMBER' => $request->ID_MEMBER,
                'LOCATION_TICKET' => $value
            ]);
            if (!$ticket) {
                return response()->json(['message' => 'error']);
                break;
            }
        };
        return response()->json(['message' => 'success']);
    }
}
