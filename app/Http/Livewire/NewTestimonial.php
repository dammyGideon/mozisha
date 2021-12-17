<?php

namespace App\Http\Livewire;

use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewTestimonial extends Component
{
    public $first_name;
    public $last_name;
    public $gender;
    public $linkedin;
    public $image;
    public $testimony;
    public $rating;
    public $profession;

    use WithFileUploads;

    public function updated($field)
    {
        $this->validateOnly($field, [
           'last_name'    => 'required|max:255',
            'first_name'  => 'required|max:255',
            'gender'      => 'required|max:255',
            'linkedin'    => 'nullable|max:800',
            'image'       => 'required|image|max:1000',
            'testimony'   => 'required|max:1000',
            'rating'      => 'required|numeric|max:5',
            'profession'  => 'required|max:255',
        ]);
    }

    public function addTestimonial()
    {
        $this->validate([
            'last_name'   => 'required|max:255',
            'first_name'  => 'required|max:255',
            'gender'      => 'required|max:255',
            'image'       => 'required|image|max:1000',
            'linkedin'    => 'nullable|max:800',
            'testimony'   => 'required|max:1000',
            'rating'      => 'required|numeric|max:5',
            'profession'  => 'required|max:255',
        ]);


        //Store the image and get the parameters
        $image = $this->storeFile();
        Testimonial::create([
            'user_id'     => Auth::user()->id,
            'last_name'   => $this->last_name,
            'first_name'  => $this->first_name,
            'gender'      => $this->gender,
            'image'       => $image['name'],
            'linkedin'    => $this->linkedin,
            'testimony'   => $this->testimony,
            'rating'      => $this->rating,
            'profession'  => $this->profession,
        ]);

        $this->discard(); // Clearing user inputs area
        session()->flash('message', 'Testimonial added successfully!.'); //displays a flash message
    }

    public function discard()
    {
        $this->first_name   = '';
        $this->last_name    = '';
        $this->gender       = '';
        $this->image        = '';
        $this->testimony    = '';
        $this->rating       = '';
        $this->linkedin     = '';
        $this->profession   = '';
    }

    public function storeFile()
    {

        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        $original_filename = $this->image->getClientOriginalName();
        $name = time() .Str::random(50).'_'.$original_filename;
        Storage::disk('public')->put($name, $img);

//
//        $file =  $this->image;
//        $original_filename = $file->getClientOriginalName();
//        $filename = time() .Str::random(50).'_'.$original_filename;
//
//        $file->storeAs('public', $filename); //stores the file in the public directory

        $fileData =
            [
                'name'          => $name,
                'original_name' => $original_filename,
            ];

        return $fileData;
    }


    public function render()
    {
        return view('livewire.admin.new-testimonial');
    }
}
