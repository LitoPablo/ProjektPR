<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConversationRequest;
use App\Http\Resources\ConversationResource;
use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ConversationController extends Controller
{
    public function index()
    {
        return Inertia::render('Conversation/Index', [
            'conversations' => ConversationResource::collection(Conversation::where('user_1', Auth()->Id())->orWhere('user_2', Auth()->Id())->paginate(10)->appends(request()->query()))->response()->getData(true),
        ]);
    }

    public function show(Conversation $conversation)
    {
        return Inertia::render('Conversation/Show', [
            'conversation' => $conversation->load('messages.user'),
        ]);
    }

    public function create()
    {
        return Inertia::render('Conversation/Create');
    }

    public function store(ConversationRequest $request)
    {
        $user = User::where('email', $request->get('email'))->first();

        Conversation::create([
            'title' => $request->get('title'),
            'user_1' => Auth()->id(),
            'user_2' => $user->id,
        ]);
        return redirect()->route('conversation.index');
    }

    public function edit(Conversation $conversation)
    {
        return Inertia::render('Conversation/Edit', [
            'conversation' => $conversation
        ]);
    }

    public function update(Request $request, Conversation $conversation)
    {
        $conversation->update($request->all());
        return redirect()->route('conversation.index');
    }

    public function destroy(Conversation $conversation)
    {
        $conversation->delete();
        return back();
    }
}
