<?php

namespace App\Http\Livewire;

use App\Models\BlogComment;
use Livewire\Component;

class CommentForm extends Component
{
    public $blog;
    public $comments;
    public $totalComments;

    public $name;
    public $email;
    public $website;
    public $message;

    public function updated($field)
    {
        $this->validateOnly($field, [
           'name'    => 'required|max:255',
           'email'   => 'required|max:255|email',
           'website' => 'nullable|max:500',
           'message' => 'required|max:2000'
        ]);
    }
    public function countComments()
    {
        $this->totalComments = BlogComment::where('blog_id', $this->blog->id)->count();
    }
    public function postComment()
    {
        $this->validate([
            'name'    => 'required|max:255',
            'email'   => 'required|max:255|email',
            'website' => 'nullable|max:500',
            'message' => 'required|max:2000'
        ]);

        BlogComment::create([
           'blog_id' => $this->blog->id,
           'name'    => $this->name,
           'email'   => $this->email,
           'website' => $this->website,
           'message' => $this->message
        ]);

        $this->emit('alert', ['type' => 'success', 'message' => 'Comment submitted.']);
        $this->refresh();
    }

    public function refresh()
    {
        $this->name    = '';
        $this->email   = '';
        $this->website = '';
        $this->message = '';
        $this->fetchBlogComments();
        $this->countComments();
    }

    public function fetchBlogComments()
    {
        $this->comments = BlogComment::where('blog_id', $this->blog->id)->get();
    }

    public function mount($blog)
    {
        $this->blog = $blog;
        $this->refresh();
    }

    public function render()
    {
        return view('livewire.guest.comment-form');
    }
}
