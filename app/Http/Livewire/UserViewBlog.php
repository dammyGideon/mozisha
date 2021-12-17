<?php

namespace App\Http\Livewire;

use App\Models\Blog as Blogs;
use App\Models\BlogComment;
use Livewire\Component;

class UserViewBlog extends Component
{
    public $blog;
    public $randomBlogs;

    public $category = 'all';
    public $softDevNo;
    public $entNo;
    public $collNo;
    public $markNo;
    public $semNo;
    public $eleNo;
    public $freNo;
    public $busNo;


    public $commentNo;

    public  function fetchRandomBlogs()
    {
        $this->randomBlogs = Blogs::where([
            ['status', '=', 'Active'],
            ['id', '!=', $this->blog->id]
        ])->inRandomOrder()->limit(6)->get();
    }

    public function mount($blog){
        $this->blog = $blog;
        Blogs::where('id', $this->blog->id)->update([
            'view'  => $this->blog->view+1,
        ]);
        $this->countCategories();
        $this->fetchRandomBlogs();
        $this->countComments();
    }
    public function countCategories()
    {
        $this->softDevNo = Blogs::Where(['status' => 'Active', 'category' => 'Software_development'])->count();
        $this->entNo     = Blogs::Where(['status' => 'Active', 'category' => 'Entrepreneurship'])->count();
        $this->collNo    = Blogs::Where(['status' => 'Active', 'category' => 'Collaboration'])->count();
        $this->markNo    = Blogs::Where(['status' => 'Active', 'category' => 'Marketing'])->count();
        $this->semNo     = Blogs::Where(['status' => 'Active', 'category' => 'Seminars'])->count();
        $this->eleNo     = Blogs::Where(['status' => 'Active', 'category' => 'E-learning'])->count();
        $this->freNo     = Blogs::Where(['status' => 'Active', 'category' => 'Freelancing'])->count();
        $this->busNo     = Blogs::Where(['status' => 'Active', 'category' => 'Business'])->count();
    }


    public function countComments()
    {
        $this->commentNo = BlogComment::where('blog_id', $this->blog->id)->count();
    }
    public function render()
    {
        return view('livewire.guest.user-view-blog');
    }
}
