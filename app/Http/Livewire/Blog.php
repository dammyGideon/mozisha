<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog as Blogs;
use Livewire\WithPagination;

class Blog extends Component
{
    use WithPagination;

//    public $blogs;
//    public $randBlogs;

    public $category = 'all';
    public $softDevNo;
    public $entNo;
    public $collNo;
    public $markNo;
    public $semNo;
    public $eleNo;
    public $freNo;
    public $busNo;


    public function updated(){

    }


    public function mount(){
        //count records
        $this->softDevNo = Blogs::Where(['status' => 'Active', 'category' => 'Software_development'])->count();
        $this->entNo     = Blogs::Where(['status' => 'Active', 'category' => 'Entrepreneurship'])->count();
        $this->collNo    = Blogs::Where(['status' => 'Active', 'category' => 'Collaboration'])->count();
        $this->markNo    = Blogs::Where(['status' => 'Active', 'category' => 'Marketing'])->count();
        $this->semNo     = Blogs::Where(['status' => 'Active', 'category' => 'Seminars'])->count();
        $this->eleNo     = Blogs::Where(['status' => 'Active', 'category' => 'E-learning'])->count();
        $this->freNo     = Blogs::Where(['status' => 'Active', 'category' => 'Freelancing'])->count();
        $this->busNo     = Blogs::Where(['status' => 'Active', 'category' => 'Business'])->count();

    }


    public function render()
    {
        if($this->category == 'all' || $this->category == ''){
            return view('livewire.guest.blog', [
                'blogs' => Blogs::Where('status', 'Active')->orderBy('created_at','desc')->paginate(20),
                'randBlogs' => Blogs::Where('status', 'Active')->inRandomOrder()->orderBy('created_at','desc')->limit(5)->get(),
            ]);
        }else{
            return view('livewire.guest.blog', [
                'blogs' => Blogs::Where(['status' => 'Active', 'category' => $this->category])->orderBy('created_at','desc')->paginate(20),
                'randBlogs' => Blogs::Where('status', 'Active')->inRandomOrder()->orderBy('created_at','desc')->limit(5)->get(),
            ]);
        }

    }
}
