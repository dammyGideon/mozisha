<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Social as SocialModel;


class Social extends Component
{
    public $facebook;
    public $fb_client;
    public $google_client;
    public $twitter;
    public $linkedin;
    public $instagram;
    public $youtube;
    public $whatsapp;


    public function refresh(){
       $social =  SocialModel::latest()->first();
       $this->facebook = $social->facebook;
       $this->fb_client = $social->facebook_app_id;
       $this->google_client = $social->google_client_id;
       $this->twitter = $social->twitter;
       $this->linkedin = $social->linkedin;
       $this->instagram = $social->instagram;
       $this->youtube = $social->youtube;
       $this->whatsapp = $social->whatsapp;
    }

    public function mount(){
        $this->refresh();
    }

    public function updated($field){
        $this->validateOnly($field, [
            'facebook'      => 'required|max:255',
            'fb_client'     => 'required|max:255',
            'google_client' => 'required|max:255',
            'twitter'       => 'required|max:255',
            'linkedin'      => 'required|max:255',
            'instagram'     => 'required|max:255',
            'youtube'       => 'required|max:255',
            'whatsapp'      => 'required|max:255',
        ]);
    }

    public function updateSocial(){
        $this->validate([
            'facebook'      => 'required|max:255',
            'fb_client'     => 'required|max:255',
            'google_client' => 'required|max:255',
            'twitter'       => 'required|max:255',
            'linkedin'      => 'required|max:255',
            'instagram'     => 'required|max:255',
            'youtube'       => 'required|max:255',
            'whatsapp'      => 'required|max:255',
        ]);
        SocialModel::latest()->first()->update([
            'facebook'           => $this->facebook,
            'facebook_app_id'    => $this->fb_client,
            'google_client_id'   => $this->google_client,
            'twitter'            => $this->twitter,
            'linkedin'           => $this->linkedin,
            'instagram'          => $this->instagram,
            'youtube'            => $this->youtube,
            'whatsapp'           => $this->whatsapp,
        ]);

        $this->refresh();
        session()->flash('social_message', 'Social connects updated successfully.'); //displays a flash message
        $this->emit('alert', ['type' => 'success', 'message' => 'Social connects updated successfully.']);
        session()->flash('message', 'Social connects updated successfully.'); //displays a flash message

    }

    public function render()
    {
        return view('livewire.admin.social');
    }
}
