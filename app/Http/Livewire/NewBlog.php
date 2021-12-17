<?php

namespace App\Http\Livewire;

use App\Mail\NewBlogPostMail;
use App\Models\MozishaSubscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use App\Models\Blog;
use Livewire\WithFileUploads;

class NewBlog extends Component
{
        use WithFileUploads;

    public $title;
    public $image;
    public $caption;
    public $category;
    public $content;
    public $continue_1;
    public $continue_image_1;
    public $caption_1;
    public $continue_2;
    public $continue_image_2;
    public $caption_2;
    public $continue_3;
    public $continue_image_3;
    public $caption_3;
    public $continue_4;
    public $continue_image_4;
    public $caption_4;
    public $continue_5;
    public $continue_image_5;
    public $caption_5;
    public $continue_6;
    public $continue_image_6;
    public $caption_6;
    public $continue_7;
    public $continue_image_7;
    public $caption_7;
    public $continue_8;
    public $continue_image_8;
    public $caption_8;
    public $continue_9;
    public $continue_image_9;
    public $caption_9;
    public $quote;
    public $quote_by;
    public $status;

    //Toggle properties
    public $continue_1_input;
    public $continue_1_image;
    public $continue_2_input;
    public $continue_2_image;
    public $continue_3_input;
    public $continue_3_image;
    public $continue_4_input;
    public $continue_4_image;
    public $continue_5_input;
    public $continue_5_image;
    public $continue_6_input;
    public $continue_6_image;
    public $continue_7_input;
    public $continue_7_image;
    public $continue_8_input;
    public $continue_8_image;
    public $continue_9_input;
    public $continue_9_image;

    public $quote_input;
    public $quote_by_input;

    public function showContinue_1(){$this->continue_1_input = true;}

    public function showContinueImage_1(){$this->continue_1_image = true;}

    public function showContinue_2(){$this->continue_2_input = true;}

    public function showContinueImage_2(){$this->continue_2_image = true;}

    public function showContinue_3(){$this->continue_3_input = true;}

    public function showContinueImage_3(){$this->continue_3_image = true;}

    public function showContinue_4(){$this->continue_4_input = true;}

    public function showContinueImage_4(){$this->continue_4_image = true;}

    public function showContinue_5(){$this->continue_5_input = true;}

    public function showContinueImage_5(){$this->continue_5_image = true;}

    public function showContinue_6(){$this->continue_6_input = true;}

    public function showContinueImage_6(){$this->continue_6_image = true;}

    public function showContinue_7(){$this->continue_7_input = true;}

    public function showContinueImage_7(){$this->continue_7_image = true;}

    public function showContinue_8(){$this->continue_8_input = true;}

    public function showContinueImage_8(){$this->continue_8_image = true;}

    public function showContinue_9(){$this->continue_9_input = true;}

    public function showContinueImage_9(){$this->continue_9_image = true;}




    public function showQuote(){$this->quote_input = true; $this->quote_by_input = true;}


    public function updated($field){
        $this->validateOnly($field,[
           'title'               => 'required|max:255|unique:blogs,title',
           'image'               => 'required|image|max:3000',
           'caption'             => 'nullable|max:255',
           'category'            => 'required|max:255',
           'content'             => 'required|max:6000',
           'continue_1'          => 'nullable|max:4000',
           'continue_image_1'    => 'nullable|image|max:3000',
            'caption_1'          => 'nullable|max:255',
           'continue_2'          => 'nullable|max:4000',
           'continue_image_2'    => 'nullable|image|max:3000',
            'caption_2'          => 'nullable|max:255',
           'continue_3'          => 'nullable|max:4000',
           'continue_image_3'    => 'nullable|image|max:3000',
            'caption_3'          => 'nullable|max:255',
            'continue_4'         => 'nullable|max:4000',
            'continue_image_4'   => 'nullable|image|max:3000',
            'caption_4'          => 'nullable|max:255',
            'continue_5'         => 'nullable|max:4000',
            'continue_image_5'   => 'nullable|image|max:3000',
            'caption_5'          => 'nullable|max:255',
            'continue_6'         => 'nullable|max:4000',
            'continue_image_6'   => 'nullable|image|max:3000',
            'caption_6'          => 'nullable|max:255',
            'continue_7'         => 'nullable|max:4000',
            'continue_image_7'   => 'nullable|image|max:3000',
            'caption_7'          => 'nullable|max:255',
            'continue_8'         => 'nullable|max:4000',
            'continue_image_8'   => 'nullable|image|max:3000',
            'caption_8'          => 'nullable|max:255',
            'continue_9'         => 'nullable|max:4000',
            'continue_image_9'   => 'nullable|image|max:3000',
            'caption_9'          => 'nullable|max:255',
           'quote'               => 'nullable|max:1000',
           'quote_by'            => 'nullable|max:255',
           'status'              => 'required|max:255',
        ]);
    }

    public function newBlog(){
        $this->validate([
            'title'              => 'required|max:255|unique:blogs,title',
            'image'              => 'required|image|max:3000',
            'caption'            => 'nullable|max:255',
            'category'            => 'required|max:255',
            'content'             => 'required|max:6000',
            'continue_1'          => 'nullable|max:4000',
            'continue_image_1'    => 'nullable|image|max:3000',
            'caption_1'          => 'nullable|max:255',
            'continue_2'          => 'nullable|max:4000',
            'continue_image_2'    => 'nullable|image|max:3000',
            'caption_2'          => 'nullable|max:255',
            'continue_3'          => 'nullable|max:4000',
            'continue_image_3'    => 'nullable|image|max:3000',
            'caption_3'          => 'nullable|max:255',
            'continue_4'         => 'nullable|max:4000',
            'continue_image_4'   => 'nullable|image|max:3000',
            'caption_4'          => 'nullable|max:255',
            'continue_5'         => 'nullable|max:4000',
            'continue_image_5'   => 'nullable|image|max:3000',
            'caption_5'          => 'nullable|max:255',
            'continue_6'         => 'nullable|max:4000',
            'continue_image_6'   => 'nullable|image|max:3000',
            'caption_6'          => 'nullable|max:255',
            'continue_7'         => 'nullable|max:4000',
            'continue_image_7'   => 'nullable|image|max:3000',
            'caption_7'          => 'nullable|max:255',
            'continue_8'         => 'nullable|max:4000',
            'continue_image_8'   => 'nullable|image|max:3000',
            'caption_8'          => 'nullable|max:255',
            'continue_9'         => 'nullable|max:4000',
            'continue_image_9'   => 'nullable|image|max:3000',
            'caption_9'          => 'nullable|max:255',
            'quote'               => 'nullable|max:1000',
            'quote_by'            => 'nullable|max:255',
            'status'              => 'required|max:255',
        ]);

        if (!$this->status){
            session()->flash('error', 'Please select an active status at the bottom of the form when posting a new Blog!.'); //displays a flash message
        }
        //Store the image and get the parameters
        $image = $this->formatImage($this->image);

        //Store other image and get the parameters if supplied
        $continue_image_1 = $this->formatImage($this->continue_image_1);

        $continue_image_2 = $this->formatImage($this->continue_image_2);

        $continue_image_3 = $this->formatImage($this->continue_image_3);

        $continue_image_4 = $this->formatImage($this->continue_image_4);

        $continue_image_5 = $this->formatImage($this->continue_image_5);

        $continue_image_6 = $this->formatImage($this->continue_image_6);

        $continue_image_7 = $this->formatImage($this->continue_image_7);

        $continue_image_8 = $this->formatImage($this->continue_image_8);

        $continue_image_9 = $this->formatImage($this->continue_image_9);

        Blog::create([
            'title'             => $this->title,
            'slug'              => Str::slug($this->title),
            'image'             => $image['name'],
            'category'          => $this->category,
            'content'           => $this->content,
            'continue_1'        => $this->continue_1,
            'continue_image_1'  => $continue_image_1['name'],
            'continue_2'        => $this->continue_2,
            'continue_image_2'  => $continue_image_2['name'],
            'continue_3'        => $this->continue_3,
            'continue_image_3'  => $continue_image_3['name'],
            'continue_4'        => $this->continue_4,
            'continue_image_4'  => $continue_image_4['name'],
            'continue_5'        => $this->continue_5,
            'continue_image_5'  => $continue_image_5['name'],
            'continue_6'        => $this->continue_6,
            'continue_image_6'  => $continue_image_6['name'],
            'continue_7'        => $this->continue_7,
            'continue_image_7'  => $continue_image_7['name'],
            'continue_8'        => $this->continue_8,
            'continue_image_8'  => $continue_image_8['name'],
            'continue_9'        => $this->continue_9,
            'continue_image_9'  => $continue_image_9['name'],
            'quote'             => $this->quote,
            'quote_by'          => $this->quote_by,
            'status'            => $this->status,
            'user_id'           => Auth::user()->id,
        ]);

//        //Mail subscribers
//        $this->mailSubscribers($post);

        $this->discard(); // Clearing user inputs area
        session()->flash('message', 'Post uploaded successfully!.'); //displays a flash message

    }

    public function mailSubscribers($post)
    {
        //Mail the user concerning the event as a reminder.
        $subs = MozishaSubscription::all();
        if ($subs){
            foreach ($subs as $sub){
                $data = [
                    'name' => $sub->name,
                    'id'   => $post->slug,
                    'title'  => $post->title,
                    'details' => Str::limit($post->content, 250, $end='...'),
                    'email' => $sub->email,
                    'date' => $post->created_at->format('d M Y').',' . $post->created_at->format('h:iA'),
                ];
                try {
                    Mail::to($sub->email)->send(new NewBlogPostMail($data));
                }catch (\Exception $e){
                    $this->emit('alert', ['type' => 'info', 'message' => 'Notification failed.']);
                }
            }


        }

    }

    public function formatImage($image)
    {
        if ($image) {return $this->storeFile($image);}
        return  [
                'name'          => '',
                'original_name' => '',
            ];
    }

    public function storeFile($image)
    {

        $img = ImageManagerStatic::make($image)->encode('jpg');
        $original_filename = $this->image->getClientOriginalName();
        $name = time() .Str::random(50).'_'.$original_filename;
        Storage::disk('public')->put($name, $img);

//
//        $file =  $this->image;
//        $original_filename = $file->getClientOriginalName();
//        $filename = time() .Str::random(50).'_'.$original_filename;
//
//        $file->storeAs('public', $filename); //stores the file in the public directory

        return
            [
                'name'          => $name,
                'original_name' => $original_filename,
            ];

    }

    public function discard(){
        $this->title                = '';
        $this->image                = '';
        $this->category             = '';
        $this->content              = '';
        $this->status               = '';
        $this->continue_1           = '';
        $this->continue_1_image     = '';
        $this->continue_2           = '';
        $this->continue_image_2     = '';
        $this->quote                = '';
        $this->quote_by             = '';
    }

    public function render()
    {
        return view('livewire.admin.new-blog');
    }
}
