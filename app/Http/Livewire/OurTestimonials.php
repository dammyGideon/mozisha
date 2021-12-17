<?php

namespace App\Http\Livewire;

use App\Models\Testimonial;
use Livewire\Component;
use Livewire\WithPagination;

class OurTestimonials extends Component
{
    use WithPagination;
    public $randTestimonials;

    public function mount()
    {
        $this->fetchRandomTestimonials();
    }

    public function fetchRandomTestimonials()
    {
        $this->randTestimonials = Testimonial::latest()->get();
    }

    public function render()
    {
        return view('livewire.guest.our-testimonials', ['testimonials' => Testimonial::latest()->paginate(6)]);
    }
}
