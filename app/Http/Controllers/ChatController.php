<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Events\Message;
use App\Http\Requests;
use App\User;

class ChatController extends Controller
{
    public function post(Request $request) {
        $message = new Message(
            Auth::user()->name,
            $request->input("message")
        );

        broadcast($message);

        return response()->json([
            "status" => "ok"
        ]);
    }

    public function username($id) {
        $user = User::find($id);

        return response()->json([
            "status" => "ok",
            "name" => $user->name
        ]);
    }
}
