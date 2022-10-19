<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TicketController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Ticket/Index', [
            'tickets' => TicketResource::collection(Ticket::paginate(10)->appends(request()->query()))->response()->getData(true),
        ]);
    }
    
    public function show(Ticket $ticket)
    {
        return Inertia::render('Admin/Ticket/Show', [
            'ticket' => $ticket->load('messages.user'),
        ]);
    }

    public function close(Ticket $ticket) {
        $ticket->update(['ticket_status_id' => $ticket->ticket_status_id == 4 ? 1 : 4]);
        return redirect()->back();
    }
}
