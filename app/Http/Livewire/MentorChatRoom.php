<?php

namespace App\Http\Livewire;

use App\Events\ChatEvent;
use App\Models\Chat;
use App\Models\Connect;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use mysql_xdevapi\Exception;

class MentorChatRoom extends Component
{
    public $connect;
    public $user;
    public $message;

    public $msgs;

    public $channelString;

    protected function getListeners()
    {
        return ["echo:private-".Session::get('chat_id').",ChatEvent" => 'handleIncomingMessages'];
    }


    public function mount($connect_id_string)
    {
        Session::put('chat_id', $connect_id_string);
        $this->user = User::find(Auth::id());

        $this->connect = Connect::where('connect_id_string', $connect_id_string)->first();
        $this->refreshOldMessages();

    }

    public function send()
    {
        $this->validate([
            'message' => 'required|max:1000',
        ]);
        try {
            event(new ChatEvent($this->message, $this->user));
            Chat::create([
                'sender_id' => Auth::user()->id,
                'receiver_id' => $this->connect->mentee_id,
                'connect_id_string' => $this->connect->connect_id_string,
                'message'    => $this->message,
            ]);

            $this->discard();
            $this->refreshOldMessages();
        }catch (\Exception $e){
            $this->emit('alert', ['type' => 'error', 'message' => 'Message sending failed, please check your internet connection!']);
        }

    }

    public function handleIncomingMessages(){
        //Alert User
        $this->emit('alert', ['type' => 'info', 'message' => '1 New Message']);

        //Refresh the page for New message to show
        $this->refreshOldMessages();
    }

    public function refreshOldMessages()
    {
        $this->msgs = Chat::where('connect_id_string', $this->connect->connect_id_string)->get();
        $this->emit('scroll-down');
    }

    public function discard()
    {
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.chatroom.mentor-chat-room');
    }
}
