<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Test extends Component
{
    use WithFileUploads;

    public $image;

    public $count = 0;

    public function inc(){
        $this->count += 1;
    }

    public function dec(){
        $this->count--;
    }


    public function render()
    {
        return view('livewire.guest.test');
    }
}
