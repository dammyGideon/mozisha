<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Testimonial;
use Livewire\Component;
use App\Models\Blog;

class Homepage extends Component

{
    public $blogs;
    public $events;

    public $testimonials;

    public function mount(){
        $this->blogs = Blog::Where('status', 'Active')->orderBy('created_at','desc')->take(3)->get();
        $this->fetchUpcoming();
        $this->fetchTestimonials();
    }

    public function fetchTestimonials()
    {
        $this->testimonials = Testimonial::inRandomOrder()->get();
    }

    public function fetchUpcoming()
    {
       $this->events =  Event::where([
            ['status', '=', 'Active'],
//            ['start_time_stamp', '>', time()]
        ])->limit(3)->get();
    }

    public function render()
    {
        return view('livewire.guest.homepage');
    }
}
