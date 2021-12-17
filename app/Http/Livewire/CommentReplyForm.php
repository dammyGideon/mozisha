<?php

namespace App\Http\Livewire;

use App\Models\BlogComment;
use App\Models\BlogCommentReply;
use Livewire\Component;

class CommentReplyForm extends Component
{
    public $comment;
    public $replies;
    public $totalReplies;

    public $name;
    public $email;
    public $website;
    public $message;

    public $formStatus;


    protected $listeners = ['showForm' => 'showReplyForm'];

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name'    => 'required|max:255',
            'email'   => 'required|max:255|email',
            'website' => 'nullable|max:500',
            'message' => 'required|max:2000'
        ]);
    }
    public function countReplies()
    {
        $this->totalReplies = BlogCommentReply::where('comment_id', $this->comment->id)->count();
    }
    public function postReply()
    {
        $this->validate([
            'name'    => 'required|max:255',
            'email'   => 'required|max:255|email',
            'website' => 'nullable|max:500',
            'message' => 'required|max:2000'
        ]);

        BlogCommentReply::create([
            'comment_id' => $this->comment->id,
            'name'       => $this->name,
            'email'      => $this->email,
            'website'    => $this->website,
            'message'    => $this->message
        ]);

        $this->emit('alert', ['type' => 'success', 'message' => 'Reply submitted.']);
        $this->refresh();
    }

    public function showReplyForm()
    {
        $this->formStatus = true;
    }

    public function refresh()
    {
        $this->name    = '';
        $this->email   = '';
        $this->website = '';
        $this->message = '';
        $this->fetchCommentReplies();
        $this->countReplies();
        $this->formStatus = false;
    }

    public function fetchCommentReplies()
    {
        $this->replies = BlogCommentReply::where('comment_id', $this->comment->id)->get();
    }

    public function mount($comment)
    {
        $this->comment = $comment;
        $this->refresh();
    }

    public function render()
    {
        return view('livewire.guest.comment-reply-form');
    }
}
