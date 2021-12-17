<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use App\Models\Connect;
use App\Models\Event;
use App\Models\Team;
use App\Models\User;
use Livewire\Component;

class AdminDashboard extends Component
{
    public $users;
    public $app;
    public $events;
    public $team;

    public function mount()
    {
        $this->countUsers();
        $this->countApp();
        $this->countTeam();
        $this->countEvent();
    }

    public function countUsers()
    {
        $this->users = User::count();
    }

    public function countApp()
    {
        $this->app = Connect::where('status', 'Active')->count();
    }

    public function countEvent()
    {
        $this->events = Event::where([
            ['status', '=', 'Active'],
            ['start_time_stamp', '>', time()]
        ])->count();
    }

    public function countTeam()
    {
        $this->team = Team::count();
    }

    public function render()
    {
        return view('livewire.admin.admin-dashboard');
    }
}
