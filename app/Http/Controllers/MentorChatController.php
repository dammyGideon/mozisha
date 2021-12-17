<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MentorChatController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $user;
    public $target_id;
    public $connect_id_string;

    public function __construct()
    {
//        $this->middleware('auth');
//        $user = User::find(Auth::id());

    }

    public function chat ($connect_id_string)
    {
        return view('chat.mentor_chatroom', ['connect_id_string' => $connect_id_string]);
    }

    public function send (Request $request)
    {
        $this->user = User::find(Auth::id());
        $this->saveToDatabase($request);
        event(new ChatEvent($request->message, $this->user));
    }

    public function saveToDatabase ($request)
    {
       Chat::create([
           'receiver_id'        => session()->get('chat_target_id'),
           'sender_id'          => Auth::user()->id,
           'connect_id_string'  => session()->get('chat_connect_id_string'),
           'message'            => $request->message,
       ]);

    }

    public function getOldMessages()
    {
        $chats = Chat::where('connect_id_string', session()->get('chat_connect_id_string'))->get();
        if ($chats){
            return response()->json($chats, 200);
        }
        return [];
    }

    public function deleteSession()
    {
        Chat::where('connect_id_string', $this->connect_id_string)->delete();
    }

}
