<?php

namespace App\Http\Livewire;

use App\Models\Request;
use Livewire\Component;

class ApplicationSuccess extends Component
{
    public $user;
    public $app;
    public $date;
    public $time;

    public function mount($user, $app, $request){
        $this->user = $user;
        $this->app  = $app;

        //Getting the request
//        Request::where('mentor_id', $this->app->user_id)->first();
        $this->date = $request->created_at->format('d M Y');
        $this->time = $request->created_at->format('h:iA');

    }


    public function render()
    {
        return view('livewire.mentee.application-success');
    }
}
