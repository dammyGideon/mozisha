<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AdminMembersPassword extends Component
{
    public $old_password;
    public $password;
    public $password_confirmation;

    public $member;

    public function mount($member)
    {
        $this->member = $member;
    }

    public function discard(){
        $this->password               = '';
        $this->old_password           = '';
        $this->password_confirmation  = '';
    }

    public function updated($field){
        $this->validateOnly($field, [
            'password'              => 'required|min:6',
            'password_confirmation' => 'min:6|required_with:password|same:password',
        ]);
    }

    public function updatePassword(){
        $this->validate([
            'password'              => 'required|min:6',
            'password_confirmation' => 'min:6|required_with:password|same:password',
        ]);
            // The passwords match...
            $newHashedpassword = Hash::make($this->password); //Hashing the new password
            User::where('id', $this->member->id)->update([
                'password' => $newHashedpassword,
            ]);
            session()->flash('pass_message', 'Password updated successfully.');
            $this->emit('alert', ['type' => 'success', 'message' => 'Password updated successfully.']);
            $this->discard();;
            return;

    }

    public function render()
    {
        return view('livewire.admin.admin-members-password');
    }
}
