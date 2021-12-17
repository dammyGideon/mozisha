<?php

namespace App\Http\Livewire;

use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditTestimonial extends Component
{
    public $testimonial;
    public $first_name;
    public $last_name;
    public $gender;
    public $linkedin;
    public $image;
    public $old_image;
    public $testimony;
    public $rating;
    public $profession;

    use WithFileUploads;

    public function mount($testimonial)
    {
        $this->testimonial = $testimonial;
        $this->refresh();
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'last_name'    => 'required|max:255',
            'first_name'  => 'required|max:255',
            'gender'      => 'required|max:255',
            'linkedin'    => 'nullable|max:800',
            'image'       => 'nullable|image|max:1000',
            'testimony'   => 'required|max:1000',
            'rating'      => 'required|numeric|max:5',
            'profession'  => 'required|max:255',
        ]);
    }

    public function updateTestimonial()
    {
        $this->validate([
            'last_name'   => 'required|max:255',
            'first_name'  => 'required|max:255',
            'gender'      => 'required|max:255',
            'image'       => 'nullable|image|max:1000',
            'linkedin'    => 'nullable|max:800',
            'testimony'   => 'required|max:1000',
            'rating'      => 'required|numeric|max:5',
            'profession'  => 'required|max:255',
        ]);

        //Store the image and get the parameters
        if($this->image){
            $this->deleteOldFile($this->testimonial->image);
            $image = $this->storeFile();
        }else{
            $image = [
                'name' => $this->testimonial->image,
            ];
        }

        Testimonial::where('id', $this->testimonial->id)->update([
            'last_name'   => $this->last_name,
            'first_name'  => $this->first_name,
            'gender'      => $this->gender,
            'image'       => $image['name'],
            'linkedin'    => $this->linkedin,
            'testimony'   => $this->testimony,
            'rating'      => $this->rating,
            'profession'  => $this->profession,
        ]);

        $this->refresh(); // Clearing user inputs area
        session()->flash('message', 'Testimonial updated successfully!.'); //displays a flash message
    }

    public function refresh()
    {
        $testimonial         = Testimonial::findOrFail($this->testimonial->id);
        $this->first_name    = $testimonial->first_name;
        $this->last_name     = $testimonial->last_name;
        $this->gender        = $testimonial->gender;
        $this->linkedin      = $testimonial->linkedin;
        $this->old_image     = $testimonial->ImagePath;
        $this->testimony     = $testimonial->testimony;
        $this->rating        = $testimonial->rating;
        $this->profession    = $testimonial->profession;
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

    protected function deleteOldFile($filename)
    {
        Storage::delete('/public/'.$filename);
    }

    public function render()
    {
        return view('livewire.admin.edit-testimonial');
    }
}
