<?php

namespace App\Http\Livewire;

use App\Mail\AccountUpdateEmail;
use App\Mail\MenteeCreateAccountEmail;
use App\Mail\MentorCreateAccountEmail;
use App\Mail\AdminNewMentorMail;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class MentorRegister extends Component
{   
    use AuthenticatesUsers;
    public $first_name;
    public $last_name;
    public $terms;
    public $email;
    public $password;
    public $password_confirmation;
    public $remember;

    public function updated($field){
        $this->validateOnly($field, [
            'first_name'            => 'required|max:255',
            'last_name'             => 'required|max:255',
            'email'                 => 'required|email|max:255|unique:users,email',
            'password'              => 'required|min:6',
            'password_confirmation' => 'min:6|required_with:password|same:password',
        ]);
    }

    public function messages()
    {
        return [
            'terms.required' => ' You have to agree to Apprenticeship Privacy Policy & Terms.',
        ];
    }

    public function addUser(){
        $this->validate([
            'first_name'            => 'required|max:255',
            'last_name'             => 'required|max:255',
            'email'                 => 'required|email|max:255|unique:users,email',
            'password'              => 'required|min:6',
            'password_confirmation' => 'min:6|required_with:password|same:password',
        ]);



        $user = User::create([
            'name'     => $this->last_name . ' ' . $this->first_name,
            'email'    => $this->email,
            'password' => $this->password,
        ]);

        //Updating user details
        $newAccount =  User::where('email', $this->email)->first();
        UserDetail::create([
            'user_id'       => $newAccount->id,
            'firstname'     => $this->first_name,
            'lastname'      => $this->last_name,
            'age'           => '',
            'phone'         => '',
            'address'       => '',
            'city'          => '',
            'state'         => '',
            'zipcode'       => '',
            'country'       => '',
            'about'         => '',
        ]);
        //Sets the user role
        $newAccount->attachRole('mentor');

        try {
            //Mails user concerning the registration
            $data = [
                'email' => $this->email,
                'name'  => $this->last_name. ' '.$this->first_name,
            ];
            Mail::to($this->email)->send(new MentorCreateAccountEmail($data));
        }catch (\Exception $e){
            $this->emit('alert', ['type' => 'info', 'message' => 'Welcome mail failed.']);
        }

        try {
            //Mails user concerning the registration
            $data = [
                'email' => $this->email,
                'name'  => $this->last_name. ' '.$this->first_name,
            ];
            Mail::to(['bolaji@mozisha.com','kene@mozisha.com', 'info@mozisha.com'])->send(new AdminNewMentorMail($data));
        }catch (\Exception $e){
            $this->emit('alert', ['type' => 'info', 'message' => 'Welcome mail failed.']);
        }


        if (Auth::attempt(['email' => $this->email, 'password' => $this->password, 'status' => 'Active'], $this->remember))
        {

            // If Authentication is passed...
            $user = User::where('email', $this->email)->first();

            //Redirects to the appropriate routes
            return $this->authenticated($user);

        }

        session()->flash('message', 'A mail has been sent, please check your email to confirm your account and proceed.');
        $this->emit('alert', ['type' => 'success', 'message' => 'A mail has been sent, please check your email to confirm your account and proceed.']);
        return redirect()->route('user.registered');
    }

    protected function authenticated($user)
    {
        // Redirects to the Mentors portal
        if ($user->hasRole('mentor')) {
            session()->flash('message', 'A mail has been sent, please check your email to confirm your account and proceed.');
            $this->emit('alert', ['type' => 'success', 'message' => 'A mail has been sent, please check your email to confirm your account and proceed.']);
            return redirect()->intended('mentor/profile');
        }

        // Redirects to the mentees/Apprentice portal
        if ($user->hasRole('mentee')) {
            session()->flash('message', 'A mail has been sent, please check your email to confirm your account.');
            $this->emit('alert', ['type' => 'success', 'message' => 'A mail has been sent, please check your email to confirm your account.']);
            return redirect()->intended('mentee/profile');
        }

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

    public function discard(){
        $this->first_name            = '';
        $this->last_name             = '';
        $this->email                 = '';
        $this->password              = '';
        $this->password_confirmation = '';
    }

    public function render()
    {
        return view('livewire.mentor.mentor-register');
    }
}
