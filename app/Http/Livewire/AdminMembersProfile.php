<?php

namespace App\Http\Livewire;

use App\Models\About;
use App\Models\FamiliarTool;
use App\Models\Language;
use App\Models\NeededExperience;
use App\Models\NeededIndustry;
use App\Models\PersonalInterest;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserEducation;
use App\Models\UserWorkExperience;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminMembersProfile extends Component
{
    use WithFileUploads;
    public $firstname;
    public $lastname;
    public $age;
    public $email;
    public $phone;
    public $address;
    public $address_2;
    public $gender;
    public $city;
    public $state;
    public $zipcode;
    public $country;
    public $about;
    public $status;
    public $created_at;
    public $image;
    public $user;


    //Member to be viewed and updated
    public $member;

    public $detail;
    public $aboutUser;
    public $educations;
    public $workExperience;
    public $tool;
    public $industry;
    public $language;
    public $neededExperience;
    public $personalInterest;


    public function mount($user){
        $this->member = $user;
        $this->status = $user->status;

        //refresh the data on the page
        $this->refresh();
    }

    public function fetchDetails(){
        $this->detail = UserDetail::where('user_id', $this->member->id)->first();
    }

    public function fetchLanguage(){
        $this->language = Language::where('user_id', $this->member->id)->get();
    }

    public function fetchInterest(){
        $this->personalInterest = PersonalInterest::where('user_id', $this->member->id)->get();
    }

    public function fetchAbout(){
        $this->about = About::where('user_id', $this->member->id)->first();
    }

    public function fetchEducation(){
        $this ->educations =  UserEducation::where('user_id', $this->member->id)->get();
    }

    public function fetchWorkExperience(){
        $this->workExperience =  UserWorkExperience::where('user_id', $this->member->id)->get();
    }

    public function fetchTool(){
        $this->tool = FamiliarTool::where('user_id', $this->member->id)->get();
    }

    public function fetchIndustry(){
        $this->industry =  NeededIndustry::where('user_id', $this->member->id)->get();
    }

    public function fetchNeededExperience(){
        $this->neededExperience = NeededExperience::where('user_id', $this->member->id)->get();
    }


    public function updateImage(){
        $this->validate([
            'image'  => 'required|image|max:250'
        ]);
        //Find and delete old image
        $c_data = User::find($this->member->id);
        if ($c_data->profile_photo_path){
            $this->deleteOldFile($c_data->profile_photo_path);
        }
        //Proceeds to storing the new data image
        $image = $this->storeImage($this->image);
        User::where('id', $this->member->id)->update([
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
        $user = UserDetail::where('user_id', $this->member->id)->first();
        $userAccount = User::find($this->member->id);
        if($user){
            $this->firstname    = $user->firstname;
            $this->lastname     = $user->lastname;
            $this->age          = $user->age;
            $this->email        = $this->member->email;
            $this->phone        = $user->phone;
            $this->address      = $user->address;
            $this->address_2    = $user->address_2;
            $this->gender       = $user->gender;
            $this->city         = $user->city;
            $this->state        = $user->state;
            $this->zipcode      = $user->zipcode;
            $this->country      = $user->country;
            $this->created_at   = $user->created_at;
            $this->user         = $userAccount;
        }else{
            $this->email = $this->member->email;
            $this->firstname    = '';
            $this->lastname     = '';
            $this->age          = '';
            $this->phone        = '';
            $this->address      = '';
            $this->address_2    = '';
            $this->gender       = '';
            $this->city         = '';
            $this->state        = '';
            $this->zipcode      = '';
            $this->country      = '';
            $this->created_at   = '';
            $this->user         = $userAccount;
        }


        //Other Information that belongs to the user
        $this->fetchDetails();
        $this->fetchAbout();
        $this->fetchEducation();
        $this->fetchNeededExperience();
        $this->fetchWorkExperience();
        $this->fetchTool();
        $this->fetchIndustry();
        $this->fetchLanguage();
        $this->fetchInterest();


    }

    public function updated($field){
        $this->validateOnly($field, [
            'firstname'         => 'required|max:255',
            'lastname'          => 'required|max:255',
            'age'               => 'required|max:255',
            'phone'             => 'required|max:255',
            'status'            => 'nullable|in:Active,Disabled',
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
            'age'               => 'required|max:255',
            'phone'             => 'required|max:255',
            'status'            => 'nullable|in:Active,Disabled',
            'address'           => 'required|max:255',
            'city'              => 'required|max:255',
            'state'             => 'required|max:255',
            'zipcode'           => 'nullable|max:255',
            'country'           => 'required|max:255',
            'about'             => 'required|max:1000',

        ]);

        $user = UserDetail::where('user_id', $this->member->id);
        if($user->count() == 0){
            //Insert afres
            UserDetail::create([
                'user_id'       => $this->member->id,
                'firstname'     => $this->firstname,
                'lastname'      => $this->lastname,
                'age'           => $this->age,
                'phone'         => $this->phone,
                'address'       => $this->address,
                'city'          => $this->city,
                'state'         => $this->state,
                'zipcode'       => $this->zipcode,
                'country'       => $this->country,
                'about'         => $this->about,
            ]);

            User::where('id', $this->member->id)->update([
                'name' => $this->lastname . ' ' . $this->firstname,
            ]);

            $this->refresh();
            session()->flash('message', 'Profile updated successfully.');
            $this->emit('alert', ['type' => 'success', 'message' => 'Profile updated successfully.']);
            return;
        }
        //Else update the existing one
        UserDetail::where('user_id', $this->member->id)->update([
            'firstname'     => $this->firstname,
            'lastname'      => $this->lastname,
            'age'           => $this->age,
            'phone'         => $this->phone,
            'address'       => $this->address,
            'city'          => $this->city,
            'state'         => $this->state,
            'zipcode'       => $this->zipcode,
            'country'       => $this->country,
            'about'         => $this->about,
        ]);

        User::where('id', $this->member->id)->update([
            'name' => $this->lastname . ' ' . $this->firstname,
            'status' => $this->status,
        ]);
        $this->refresh();
        session()->flash('message', 'Profile updated successfully.');
        $this->emit('alert', ['type' => 'success', 'message' => 'Profile updated successfully.']);

    }

    public function render()
    {
        return view('livewire.admin.admin-members-profile');
    }
}
