<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminProfile extends Component
{
    use WithFileUploads;
    public $firstname;
    public $lastname;
    public $date_of_birth;
    public $email;
    public $phone;
    public $address;
    public $city;
    public $state;
    public $zipcode;
    public $country;
    public $about;
    public $image;
    public $user;


    public function updateImage(){
        $this->validate([
           'image'  => 'required|image|max:250'
        ]);
        //Find and delete old image
        $c_data = User::find(Auth::user()->id);
        if ($c_data->profile_photo_path){
            $this->deleteOldFile($c_data->profile_photo_path);
        }
        //Proceeds to storing the new data image
        $image = $this->storeImage($this->image);
        User::where('id', Auth::user()->id)->update([
           'profile_photo_path' => $image,
        ]);
        session()->flash('message', 'Image uploaded successfully.');
        $this->emit('alert', ['type' => 'success', 'message' => 'Image uploaded successfully.']);
        $this->image = '';
        $this->refresh();
    }

    public function storeImage($imageFile)
    {
        $img = ImageManagerStatic::make($imageFile)->encode('jpg');
        $name = Str::random(50). '.jpg';
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    protected function deleteOldFile($filename){
        Storage::delete('/public/'.$filename);
    }


    public function refresh(){
        $user = UserDetail::where('user_id', Auth::user()->id)->first();
        $userAccount = User::find(Auth::user()->id);
        if($user){
            $this->firstname    = $user->firstname;
            $this->lastname     = $user->lastname;
            $this->date_of_birth= $user->date_of_birth;
            $this->email        = Auth::user()->email;
            $this->phone        = $user->phone;
            $this->address      = $user->address;
            $this->city         = $user->city;
            $this->state        = $user->state;
            $this->zipcode      = $user->zipcode;
            $this->country      = $user->country;
            $this->about        = $user->about;
            $this->user         = $userAccount;
         }else{
            $this->email = Auth::user()->email;
            $this->firstname    = '';
            $this->lastname     = '';
            $this->date_of_birth= '';
            $this->phone        = '';
            $this->address      = '';
            $this->city         = '';
            $this->state        = '';
            $this->zipcode      = '';
            $this->country      = '';
            $this->about        = '';
            $this->user         = $userAccount;
        }
    }

    public function mount(){
        $this->refresh();
    }

    public function updated($field){
        $this->validateOnly($field, [
            'firstname'         => 'required|max:255',
            'lastname'          => 'required|max:255',
            'date_of_birth'     => 'required|max:255',
            'phone'             => 'required|max:255',
            'address'           => 'required|max:255',
            'city'              => 'required|max:255',
            'state'             => 'required|max:255',
            'zipcode'           => 'required|max:255',
            'country'           => 'required|max:255',
            'about'             => 'required|max:1000',
        ]);
    }

    public function updateProfile(){
        $this->validate([
            'firstname'         => 'required|max:255',
            'lastname'          => 'required|max:255',
            'date_of_birth'     => 'required|max:255',
            'phone'             => 'required|max:255',
            'address'           => 'required|max:255',
            'city'              => 'required|max:255',
            'state'             => 'required|max:255',
            'zipcode'           => 'nullable|max:255',
            'country'           => 'required|max:255',
            'about'             => 'required|max:1000',

        ]);

        $user = UserDetail::where('user_id', Auth::user()->id);
        if($user->count() == 0){
            //Insert afres
            UserDetail::create([
                'user_id'       => Auth::user()->id,
                'firstname'     => $this->firstname,
                'lastname'      => $this->lastname,
                'date_of_birth' => $this->date_of_birth,
                'phone'         => $this->phone,
                'address'       => $this->address,
                'city'          => $this->city,
                'state'         => $this->state,
                'zipcode'       => $this->zipcode,
                'country'       => $this->country,
                'about'         => $this->about,
            ]);

            User::where('id', Auth::user()->id)->update([
                'name' => $this->lastname . ' ' . $this->firstname,
            ]);

            $this->refresh();
            session()->flash('message', 'Profile updated successfully.');
            $this->emit('alert', ['type' => 'success', 'message' => 'Profile updated successfully.']);
            return;
        }
        //Else update the existing one
        UserDetail::where('user_id', Auth::user()->id)->update([
            'firstname'     => $this->firstname,
            'lastname'      => $this->lastname,
            'date_of_birth' => $this->date_of_birth,
            'phone'         => $this->phone,
            'address'       => $this->address,
            'city'          => $this->city,
            'state'         => $this->state,
            'zipcode'       => $this->zipcode,
            'country'       => $this->country,
            'about'         => $this->about,
        ]);

        User::where('id', Auth::user()->id)->update([
            'name' => $this->lastname . ' ' . $this->firstname,
        ]);
        $this->refresh();
        session()->flash('message', 'Profile updated successfully.');
        $this->emit('alert', ['type' => 'success', 'message' => 'Profile updated successfully.']);

    }

    public function render()
    {
        return view('livewire.admin.admin-profile');
    }
}
