<?php

namespace App\Http\Livewire;

use App\Mail\MenteeCreateAccountEmail;
use App\Mail\MentorCreateAccountEmail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class UserGoogleSelectPassword extends Component
{
    public $role;
    public $password;
    public $password_confirmation;
    public $google_id;


    public function mount($google_id){
        $this->google_id = $google_id;

    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'password'              => 'required|min:6',
            'password_confirmation' => 'min:6|required_with:password|same:password',
        ]);
    }


    public function updatePassword()
    {
        $this->validate([
            'password'              => 'required|min:6',
            'password_confirmation' => 'min:6|required_with:password|same:password',
        ]);

        $user = User::where('google_id', $this->google_id)->update([
            'password' => Hash::make($this->password),
        ]);

        $newAccount =  User::where('google_id', $this->google_id)->first();

        $newAccount->attachRole(Session::get('role'));

        try {
            if(Session::get('role') == 'mentor'){

                //Mails user concerning the registration
                $data = [
                    'email' => $newAccount->email,
                    'name'  => $newAccount->name,
                ];
                Mail::to($newAccount->email)->send(new MentorCreateAccountEmail($data));
            }

            if(Session::get('role') == 'mentee'){
                //Mails user concerning the registration
                $data = [
                    'email' => $newAccount->email,
                    'name'  => $newAccount->name,
                ];
                Mail::to($newAccount->email)->send(new MenteeCreateAccountEmail($data));
            }
            }catch (\Exception $e){

            }


        //Unset role session
        Session::forget('role');

        //Inform user of the update and redirect to login
        session()->flash('message', 'Registration completed.');
        redirect()->route('user.login');
    }

    public function discard(){
        $this->password              = '';
        $this->password_confirmation = '';
    }


    public function render()
    {
        return view('livewire.auth.user-google-select-password');
    }
}
