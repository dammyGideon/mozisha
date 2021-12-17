<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AdminPassword extends Component
{
    public $old_password;
    public $password;
    public $password_confirmation;

    public function discard(){
        $this->password               = '';
        $this->old_password           = '';
        $this->password_confirmation  = '';
    }

    public function updated($field){
        $this->validateOnly($field, [
            'old_password'          => 'required|max:255',
            'password'              => 'required|min:6',
            'password_confirmation' => 'min:6|required_with:password|same:password',
        ]);
    }

    public function updatePassword(){
        $this->validate([
            'old_password'          => 'required|max:255',
            'password'              => 'required|min:6',
            'password_confirmation' => 'min:6|required_with:password|same:password',
        ]);
        //validates the old password
        $user = User::where('email', '=', Auth::user()->email)->first();
        //$hashedPassword = User::find(Auth::user()->id)->password;
        if (Hash::check($this->old_password, $user->password)) { //Checks if the supplied password is valid
            // The passwords match...
            $newHashedpassword = Hash::make($this->password); //Hasshing the new password
            User::where('id', Auth::user()->id)->update([
               'password' => $newHashedpassword,
            ]);
            session()->flash('pass_message', 'Password updated successfully.');
            $this->emit('alert', ['type' => 'success', 'message' => 'Password updated successfully.']);
            $this->discard();;
            return;
        }
        session()->flash('pass_error', 'Invalid password.');
        $this->emit('alert', ['type' => 'error','message' => 'Invalid password.']);
        return;
    }

    public function render()
    {
        return view('livewire.admin.admin-password');
    }
}
