<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index($redirect = 0)
    {
        return view('chat.index', compact('redirect'));
    }
    public function store(Request $request)
    {
        MessageSent::dispatch($request->text, $request->sender_id, $request->receiver_id);
        return response()->json(['success' => true, 'message' => 'Message sent successfully']);
    }
}
