<?php

namespace App\Http\Livewire;

use App\Models\Apprenticeship;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MentorApprenticeships extends Component
{
    public $apps_no;
    public $appTitle;
    use WithPagination;


    public function mount()
    {
        $this->fetchDefaultApp();
    }

    public function fetchDefaultApp()
    {
        $this->apps_no =  Apprenticeship::where('user_id', Auth::user()->id)->count();

    }

    public function render()
    {
        //If view is being sorted
        if($this->appTitle)
        {
            $this->apps_no = Apprenticeship::where([
                ['title', 'like', '%' . $this->appTitle. '%'],
                ['user_id', Auth::user()->id]
            ])->count();
            return view('livewire.mentor.mentor-apprenticeships',
                [
                    'apps' => Apprenticeship::where([
                        ['title', 'like', '%' . $this->appTitle. '%'],
                        ['user_id', Auth::user()->id]
                    ])->orderBy('created_at', 'DESC')->paginate(10),
                ]);
        }

        return view('livewire.mentor.mentor-apprenticeships',
            [
                'apps' => Apprenticeship::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(10),
            ]
        );
    }
}
