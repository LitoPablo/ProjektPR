<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use App\Models\TicketLevel;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TicketController extends Controller
{
    public function index()
    {
        return Inertia::render('Ticket/Index', [
            'tickets' => TicketResource::collection(Ticket::with('ticket_status')->where('user_id', Auth()->Id())->orderBy('ticket_level_id', 'desc')->paginate(10)->appends(request()->query()))->response()->getData(true),
        ]);
    }

    public function show(Ticket $ticket)
    {
        return Inertia::render('Ticket/Show', [
            'ticket' => $ticket->load('messages.user'),
        ]);
    }

    public function create()
    {
        return Inertia::render('Ticket/Create', [
            'ticket_levels' => TicketLevel::all(),
        ]);
    }

    public function store(TicketRequest $request)
    {
        Ticket::create(array_merge($request->all(), ['ticket_status_id' => 1]));
        return redirect()->route('ticket.index');
    }

    // public function edit(Ticket $ticket)
    // {
    //     return Inertia::render('Ticket/Edit', [
    //         'ticket' => $conversation
    //     ]);
    // }

    // public function update(Request $request, Ticket $ticket)
    // {
    //     $ticket->update($request->all());
    //     return redirect()->route('conversation.index');
    // }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->back();
    }
}
