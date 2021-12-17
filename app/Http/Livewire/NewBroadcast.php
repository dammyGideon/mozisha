<?php

namespace App\Http\Livewire;

use App\Models\BroadcastMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewBroadcast extends Component
{
    use WithFileUploads;

    public $image;
    public $subject;
    public $target;
    public $message;

    public function updated($field)
    {
        $this->validateOnly($field, [
           'subject'    => 'required|max:255',
            'target'    => 'required|max:255',
            'message'   => 'required|max:1000',
            'image'     => 'nullable|image|max:3000'
        ]);
    }

    public function broadcast()
    {
        $this->validate([
            'subject'   => 'required|max:255',
            'target'    => 'required|max:255',
            'message'   => 'required|max:1000',
            'image'     => 'nullable|image|max:3000'
        ]);

        //Store the image and get the parameters
        $image = $this->storeFile();

       $composed =  BroadcastMessage::create([
           'subject' =>  $this->subject,
           'target'  => $this->target,
           'message' => $this->message,
           'image'   => $image['name'],
           'user_id' => Auth::user()->id
        ]);

        //Initiate broadcasting process...
        $this->broadcastMessageViaEmail($composed);

        $this->discard(); // Clearing user inputs area
        session()->flash('message', 'Message broadcast done!'); //displays a flash message
    }

    public function broadcastMessageViaEmail($composed)
    {
        $mail_data = [
            'subject' => $composed->subject,
            'message' => $composed->message,
            'image'   => $composed->ImagePath,
            'date'    => $composed->created_at->format('M d, Y'). ', ' .$composed->created_at->format('h:i A')
        ];
        //Mail all target audience...

    }

    public function discard()
    {
        $this->image   = '';
        $this->subject = '';
        $this->message = '';
        $this->target  = '';
    }

    public function storeFile()
    {

        if ($this->image){
            $img = ImageManagerStatic::make($this->image)->encode('jpg');
            $original_filename = $this->image->getClientOriginalName();
            $name = time() .Str::random(50).'_'.$original_filename;
            Storage::disk('public')->put($name, $img);


            $fileData =
                [
                    'name'          => $name,
                ];
        }else{
            $fileData =
                [
                    'name'          => '',
                ];
        }


        return $fileData;
    }

    public function render()
    {
        return view('livewire.admin.new-broadcast');
    }
}
