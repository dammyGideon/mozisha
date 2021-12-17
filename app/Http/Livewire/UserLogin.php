<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserLogin extends Component
{

    use AuthenticatesUsers;

    public $email;
    public $password;
    public $remember;

    // Real time authentication method
    public function updated($field)
    {
        $this->validateOnly
        ($field, [
            'email'    => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);
    }


    /**
     * Handle user destination after authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return "Redirects"
     */

    protected function authenticated($user)
    {
        // Redirects to the Mentors portal
        if ($user->hasRole('mentor')){return redirect()->intended('mentor/dashboard');}

        // Redirects to the mentees/Apprentice portal
        if ($user->hasRole('mentee')){return redirect()->intended('mentee/dashboard');}

        // Redirects to the Admin portal
        if ($user->hasRole('administrator')){return redirect()->intended('/executive');}

        // Redirects to the Admin portal
        if ($user->hasRole('superadministrator')){return redirect()->intended('/executive');}

        // Redirects to the Admin portal
        if ($user->hasRole('developer')){return redirect()->intended('/executive');}

        // Redirects to the Admin portal
        if ($user->hasRole('writer')){return redirect()->intended('/executive');}

        // Redirects to the Admin portal
        if ($user->hasRole('editor')){return redirect()->intended('/executive');}

        // Redirects home if user has no assigned role
        return redirect()->route('homepage');

    }

    /*
    | Handles user authentication
    */
    public function login()
    {
        $this->validate
        ([
            'email'    => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password, 'status' => 'Active'], $this->remember))
        {

            // If Authentication is passed...
            $user = User::where('email', $this->email)->first();

            //Redirects to the appropriate routes
            return $this->authenticated($user);

        }

        // If Authentication failed...
        $this->emit('alert', ['type' => 'error', 'message' => 'Invalid login credentials.']);

    }

    /*
    | Renders the livewire component to the browser
    */
    public function render()
    {
        return view('livewire.auth.user-login');
    }
}
