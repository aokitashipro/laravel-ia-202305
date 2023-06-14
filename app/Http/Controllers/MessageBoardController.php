<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MessageBoard;

class MessageBoardController extends Controller
{
    public function index()
    {
        $messages = MessageBoard::all();

        return view('messages.index', compact('messages'));

    }

    public function create()
    {
        return view('messages.create');   
    }

    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'name' => ['required', 'min:2', 'max:20'],
            'email' => ['required', 'email'],
            'contact_to' => ['required', 'min:2', 'max:20'],
            'message' => ['required', 'min:10', 'max:200']
        ]);

        MessageBoard::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact_to' => $request->contact_to,
            'message' => $request->message
        ]);

        return redirect('messages');
    }

    public function show(string $id)
    {
        $message = MessageBoard::findOrFail($id);

        return view('messages.show', compact('message'));   
    }

    public function edit(string $id)
    {
        $message = MessageBoard::findOrFail($id);

        return view('messages.edit', compact('message'));   
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'min:2', 'max:20'],
            'email' => ['required', 'email'],
            'contact_to' => ['required', 'min:2', 'max:20'],
            'message' => ['required', 'min:10', 'max:200']
        ]);

        $message = MessageBoard::findOrFail($id);
        $message->name = $request->name;
        $message->email = $request->email;
        $message->contact_to = $request->contact_to;
        $message->message = $request->message;
        $message->save();

        return redirect('messages');
    }

    public function destroy(string $id)
    {
        $message = MessageBoard::findOrFail($id);
        $message->delete();

        return redirect('messages');
    }
}
