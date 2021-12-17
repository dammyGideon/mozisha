<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Models\ChatConnect;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatPlatform extends Component
{


    public $chats; //Users that've been chatted with
    public $unread; //unread messages
    public $mentors; //mentors among chats
    public $mentees; //mentee among chats
    public $support; //Admins among chats


    public function mount()
    {
        //$this->sortChat();
    }

    public function updated()
    {

    }

    /**
     * Search for users with their
     * name or email
     */
    public function searchUser()
    {

    }

    /**
     * Search for chats with their
     * name or email
     */
    public function searchChat()
    {

    }

    /**
     * Sorting Active chats/friends based on logged in user_id
     */
    public function sortConnects()
    {
        $this->chats = ChatConnect::where([
            ['initiator_id', '=', Auth::user()->id] ||
            ['partner_id',   '=', Auth::user()->id],
            ['status',       '=', 'Active'],
        ])->latest()->get();
    }

    /**
     * Sorting Active chats/friends based on mentors role and logged in user_id
     */
    public function sortMentors()
    {
        $this->mentors = ChatConnect::where([
            ['initiator_id', '=', Auth::user()->id] ||
            ['partner_id',   '=', Auth::user()->id],
            ['status',       '=', 'Active'],
        ])->latest()->get();
    }

    /**
     * Sorting Active chats/friends based on mentees role and logged in user_id
     */
    public function sortMentees()
    {
        $this->mentors = ChatConnect::where([
            ['initiator_id', '=', Auth::user()->id] ||
            ['partner_id',   '=', Auth::user()->id],
            ['status',       '=', 'Active'],
        ])->latest()->get();
    }

    /**
     * Sorting Active chats/friends based on support role and logged in user_id
     */
    public function sortSupports()
    {
        $this->mentors = ChatConnect::where([
            ['initiator_id', '=', Auth::user()->id] ||
            ['partner_id',   '=', Auth::user()->id],
            ['status',       '=', 'Active'],
        ])->latest()->get();
    }

    /**
     * Sorting Unread messages based on logged in user_id
     */
    public function sortUnread()
    {
        $this->unread = Chat::where([
            ['receiver_id', '=', Auth::user()->id],
            ['status',      '=', 'Pending'],
        ])->latest()->get();
    }

    /**
     * Sort chats with the
     * provided criteria
     */
    public function sortChat()
    {
        // Sorting Active chats/friends based on logged in user_id
        $this->sortConnects();

        // Sorting Active chats/friends based on mentors role and logged in user_id
        $this->sortMentors();

        // Sorting Active chats/friends based on mentees role and logged in user_id
        $this->sortMentees();

        // Sorting Active chats/friends based on support role and logged in user_id
        $this->sortSupports();

        // Sorting Unread messages based on logged in user_id
        $this->sortUnread();

    }


    public function render()
    {
        return view('livewire.chat.chat-platform');
    }
}
