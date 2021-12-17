<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class Settings extends Component
{
    use WithFileUploads;

    public $company;
    public $website;
    public $domain;
    public $email;
    public $phone;
    public $address;
    public $alert_email;
    public $alert_email_pass;
    public $slogan;
    public $country;
    public $state;
    public $about;
    public $logo;
    public $favicon;


    public function updated($field)
    {

        $this->validateOnly($field, [
            'website'             => 'required|max:255',
            'company'             => 'required|max:255',
            'address'             => 'required|max:255',
            'domain'              => 'required|max:255',
            'logo'                => 'nullable|image|max:512',
            'favicon'             => 'nullable|image:png,ico|max:100',
            'email'               => 'required|email|max:255',
            'phone'               => 'required|max:255',
            'alert_email'         => 'required|email|max:255',
            'alert_email_pass'    => 'required|max:255',
            'slogan'              => 'required|max:255',
            'country'             => 'required|max:155',
            'state'               => 'required|max:155',
            'about'               => 'required|max:500',
        ]);

    }

    public function mount(){
        $this->refresh();
    }

    public function refresh()
    {
        $payment =  Setting::latest()->first();
        $this->website          = $payment->website;
        $this->company          = $payment->company;
        $this->domain           = $payment->domain;
        $this->address          = $payment->address;
        //$this->logo             = $payment->logo;
        //$this->favicon          = $payment->favicon;
        $this->email            = $payment->email;
        $this->phone            = $payment->phone;
        $this->alert_email      = $payment->alert_email;
        $this->alert_email_pass = $payment->alert_email_pass;
        $this->slogan           = $payment->slogan;
        $this->country          = $payment->country;
        $this->about            = $payment->about;
        $this->state            = $payment->state;

    }

    public function storeImage($imageFile)
    {
        $img = ImageManagerStatic::make($imageFile)->encode('jpg');
        $name = Str::random(). '.jpg';
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    public function updateSetting()
    {
        $setting = Setting::latest()->first();//Fetches the current the settings

        $this->validate([
            'website'             => 'required|max:255',
            'company'             => 'required|max:255',
            'domain'              => 'required|max:255',
            'address'             => 'required|max:255',
            'state'               => 'required|max:255',
            'logo'                => 'nullable|image|max:155',
            'favicon'             => 'nullable|image:png,ico|max:100',
            'email'               => 'required|email|max:255',
            'phone'               => 'required|max:255',
            'alert_email'         => 'required|email|max:255',
            'alert_email_pass'    => 'required|max:255',
            'slogan'              => 'required|max:255',
            'country'             => 'required|max:155',
            'about'               => 'required|max:500',
        ]);

        if (!empty($this->logo)){$logo = $this->storeImage($this->logo);}else{$logo = $setting->logo;} //Setting up the image
        if (!empty($this->favicon)){$favicon = $this->storeImage($this->favicon);}else{$favicon = $setting->favicon;} //Setting up the image

        $setting->first()->update([
            'website'             => $this->website,
            'company'             => $this->company,
            'domain'              => $this->domain,
            'logo'                => $logo,
            'favicon'             => $favicon,
            'address'             => $this->address,
            'email'               => $this->email,
            'phone'               => $this->phone,
            'alert_email'         => $this->alert_email,
            'alert_email_pass'    => $this->alert_email_pass,
            'slogan'              => $this->slogan,
            'country'             => $this->country,
            'state'               => $this->state,
            'about'               => $this->about,
            'user_id'             => Auth::user()->id,
        ]); //updates the first record
        //Clearing user inputs after submission
        $this->refresh();
        $this->emit('alert', ['type' => 'success', 'message' => 'Website information updated successfully.']);
        session()->flash('message', 'Website information updated successfully.'); //displays a flash message
    }


    public function render()
    {
        return view('livewire.admin.settings');
    }

}
