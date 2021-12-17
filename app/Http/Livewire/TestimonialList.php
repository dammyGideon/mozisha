<?php

namespace App\Http\Livewire;

use App\Models\Testimonial;
use Livewire\Component;
use Livewire\WithPagination;

class TestimonialList extends Component
{
    use WithPagination;

    public function remove($id){
        Testimonial::where('id', $id)->delete();
        session()->flash('message', 'Testimonial Deleted!.'); //displays a flash message
    }

    public function render()
    {
        return view('livewire.admin.testimonial-list', [
            'members' => Testimonial::latest()->paginate(15),]);
    }
}
