<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditBlog extends Component
{
    use WithFileUploads;

    public $blog;

    public $title;
    public $image;
    public $new_image;
    public $caption;
    public $category;
    public $content;
    public $continue_1;
    public $continue_image_1;
    public $new_continue_image_1;
    public $caption_1;
    public $continue_2;
    public $continue_image_2;
    public $new_continue_image_2;
    public $caption_2;
    public $continue_3;
    public $continue_image_3;
    public $new_continue_image_3;
    public $caption_3;
    public $continue_4;
    public $continue_image_4;
    public $new_continue_image_4;
    public $caption_4;
    public $continue_5;
    public $continue_image_5;
    public $new_continue_image_5;
    public $caption_5;
    public $continue_6;
    public $continue_image_6;
    public $new_continue_image_6;
    public $caption_6;
    public $continue_7;
    public $continue_image_7;
    public $new_continue_image_7;
    public $caption_7;
    public $continue_8;
    public $continue_image_8;
    public $new_continue_image_8;
    public $caption_8;
    public $continue_9;
    public $continue_image_9;
    public $new_continue_image_9;
    public $caption_9;
    public $quote;
    public $quote_by;
    public $status;

    public function mount($blog){
        $this->blog = $blog;
        $this->refresh();
    }

    public function updated($field){
        $this->validateOnly($field,[
            'title'               => 'required|max:255',
            'image'               => 'nullable|image|max:3000',
            'caption'             => 'nullable|max:255',
            'category'            => 'required|max:255',
            'content'             => 'required|max:6000',
            'continue_1'          => 'nullable|max:4000',
            'continue_image_1'    => 'nullable|image|max:3000',
            'caption_1'           => 'nullable|max:255',
            'continue_2'          => 'nullable|max:4000',
            'continue_image_2'    => 'nullable|image|max:3000',
            'caption_2'           => 'nullable|max:255',
            'continue_3'          => 'nullable|max:4000',
            'continue_image_3'    => 'nullable|image|max:3000',
            'caption_3'           => 'nullable|max:255',
            'continue_4'          => 'nullable|max:4000',
            'continue_image_4'    => 'nullable|image|max:3000',
            'caption_4'           => 'nullable|max:255',
            'continue_5'          => 'nullable|max:4000',
            'continue_image_5'    => 'nullable|image|max:3000',
            'caption_5'           => 'nullable|max:255',
            'continue_6'          => 'nullable|max:4000',
            'continue_image_6'    => 'nullable|image|max:3000',
            'caption_6'           => 'nullable|max:255',
            'continue_7'          => 'nullable|max:4000',
            'continue_image_7'    => 'nullable|image|max:3000',
            'caption_7'           => 'nullable|max:255',
            'continue_8'          => 'nullable|max:4000',
            'continue_image_8'    => 'nullable|image|max:3000',
            'caption_8'           => 'nullable|max:255',
            'continue_9'          => 'nullable|max:4000',
            'continue_image_9'    => 'nullable|image|max:3000',
            'caption_9'           => 'nullable|max:255',
            'quote'               => 'nullable|max:1000',
            'quote_by'            => 'nullable|max:255',
            'status'              => 'required|max:255',
        ]);
    }

    public function updateBlog(){
        $this->validate([
            'title'               => 'required|max:255',
            'image'               => 'nullable|image|max:3000',
            'caption'             => 'nullable|max:255',
            'category'            => 'required|max:255',
            'content'             => 'required|max:6000',
            'continue_1'          => 'nullable|max:4000',
            'continue_image_1'    => 'nullable|image|max:3000',
            'caption_1'           => 'nullable|max:255',
            'continue_2'          => 'nullable|max:4000',
            'continue_image_2'    => 'nullable|image|max:3000',
            'caption_2'           => 'nullable|max:255',
            'continue_3'          => 'nullable|max:4000',
            'continue_image_3'    => 'nullable|image|max:3000',
            'caption_3'           => 'nullable|max:255',
            'continue_4'          => 'nullable|max:4000',
            'continue_image_4'    => 'nullable|image|max:3000',
            'caption_4'           => 'nullable|max:255',
            'continue_5'          => 'nullable|max:4000',
            'continue_image_5'    => 'nullable|image|max:3000',
            'caption_5'           => 'nullable|max:255',
            'continue_6'          => 'nullable|max:4000',
            'continue_image_6'    => 'nullable|image|max:3000',
            'caption_6'           => 'nullable|max:255',
            'continue_7'          => 'nullable|max:4000',
            'continue_image_7'    => 'nullable|image|max:3000',
            'caption_7'           => 'nullable|max:255',
            'continue_8'          => 'nullable|max:4000',
            'continue_image_8'    => 'nullable|image|max:3000',
            'caption_8'           => 'nullable|max:255',
            'continue_9'          => 'nullable|max:4000',
            'continue_image_9'    => 'nullable|image|max:3000',
            'caption_9'           => 'nullable|max:255',
            'quote'               => 'nullable|max:1000',
            'quote_by'            => 'nullable|max:255',
            'status'              => 'required|max:255',
        ]);

        //Check if the title exists apart from this
        if(!$this->checkForExistingBlog())
        {
            session()->flash('error', 'The title exists, please modify it!.'); //displays a flash message
            return;
        }

        //Delete old image before storing the image and get the parameters



       $image = $this->formatImage($this->image, $this->blog->image);

       $continue_image_1 = $this->formatImage($this->continue_image_1, $this->blog->continue_image_1);

       $continue_image_2 = $this->formatImage($this->continue_image_2, $this->blog->continue_image_2);

        Blog::where('id', $this->blog->id)->update([
            'title'             => $this->title,
            'slug'              => Str::slug($this->title),
            'image'             => $image['name'],
            'category'          => $this->category,
            'content'           => $this->content,
            'continue_1'        => $this->continue_1,
            'continue_image_1'  => $continue_image_1['name'],
            'continue_2'        => $this->continue_2,
            'continue_image_2'  => $continue_image_2['name'],
            'quote'             => $this->quote,
            'quote_by'          => $this->quote_by,
            'status'            => $this->status,

        ]);

        $this->refresh(); // Updating user inputs area
        session()->flash('message', 'Post updated successfully!.'); //displays a flash message

    }

    public function removeContinue1Image()
    {
        $this->deleteOldFile($this->blog->continue_image_1);
        Blog::where('id', $this->blog->id)->update([
           'continue_image_1' => '',
           'caption_1'        => ''
        ]);
        $this->refresh();
    }

    public function removeContinue2Image()
    {
        $this->deleteOldFile($this->blog->continue_image_2);
        Blog::where('id', $this->blog->id)->update([
            'continue_image_2' => '',
            'caption_2'        => ''
        ]);
        $this->refresh();
    }

    public function removeContinue3Image()
    {
        $this->deleteOldFile($this->blog->continue_image_3);
        Blog::where('id', $this->blog->id)->update([
            'continue_image_3' => '',
            'caption_3'        => ''
        ]);
        $this->refresh();
    }

    public function removeContinue4Image()
    {
        $this->deleteOldFile($this->blog->continue_image_4);
        Blog::where('id', $this->blog->id)->update([
            'continue_image_4' => '',
            'caption_4'        => ''
        ]);
        $this->refresh();
    }

    public function removeContinue5Image()
    {
        $this->deleteOldFile($this->blog->continue_image_5);
        Blog::where('id', $this->blog->id)->update([
            'continue_image_5' => '',
            'caption_5'        => ''
        ]);
        $this->refresh();
    }

    public function removeContinue6Image()
    {
        $this->deleteOldFile($this->blog->continue_image_6);
        Blog::where('id', $this->blog->id)->update([
            'continue_image_6' => '',
            'caption_6'        => ''
        ]);
        $this->refresh();
    }

    public function removeContinue7Image()
    {
        $this->deleteOldFile($this->blog->continue_image_7);
        Blog::where('id', $this->blog->id)->update([
            'continue_image_7' => '',
            'caption_7'        => ''
        ]);
        $this->refresh();
    }

    public function removeContinue8Image()
    {
        $this->deleteOldFile($this->blog->continue_image_8);
        Blog::where('id', $this->blog->id)->update([
            'continue_image_8' => '',
            'caption_8'        => ''
        ]);
        $this->refresh();
    }

    public function removeContinue9Image()
    {
        $this->deleteOldFile($this->blog->continue_image_9);
        Blog::where('id', $this->blog->id)->update([
            'continue_image_9' => '',
            'caption_9'        => ''
        ]);
        $this->refresh();
    }



    public function checkForExistingBlog()
    {
        $checkBlog = Blog::where([
            ['id', '!=', $this->blog->id],
            ['title', '=', $this->title]
        ])->first();

        if ($checkBlog){
            return false;
        }
        return true;
    }

    public function refresh(){
        $blog = Blog::find($this->blog->id);
        $this->title                    = $blog->title;
        $this->new_image                = $blog->image;
        $this->caption                  = $blog->caption;
        $this->category                 = $blog->category;
        $this->content                  = $blog->content;
        $this->status                   = $blog->status;
        $this->continue_1               = $blog->continue_1;
        $this->new_continue_image_1     = $blog->continue_image_1;
        $this->caption_1                = $blog->caption_1;
        $this->continue_2               = $blog->continue_2;
        $this->new_continue_image_2     = $blog->continue_image_2;
        $this->caption_2                = $blog->caption_2;
        $this->continue_3               = $blog->continue_3;
        $this->new_continue_image_3     = $blog->continue_image_3;
        $this->caption_3                = $blog->caption_3;
        $this->continue_4               = $blog->continue_4;
        $this->new_continue_image_4     = $blog->continue_image_4;
        $this->caption_4                = $blog->caption_4;
        $this->continue_5               = $blog->continue_5;
        $this->new_continue_image_5     = $blog->continue_image_5;
        $this->caption_5                = $blog->caption_5;
        $this->continue_6               = $blog->continue_6;
        $this->new_continue_image_6     = $blog->continue_image_6;
        $this->caption_6                = $blog->caption_6;
        $this->continue_7               = $blog->continue_7;
        $this->new_continue_image_7     = $blog->continue_image_7;
        $this->caption_7                = $blog->caption_7;
        $this->continue_8               = $blog->continue_8;
        $this->new_continue_image_8     = $blog->continue_image_8;
        $this->caption_8                = $blog->caption_8;
        $this->continue_9               = $blog->continue_9;
        $this->new_continue_image_9     = $blog->continue_image_9;
        $this->caption_9                = $blog->caption_9;

        $this->quote                    = $blog->quote;
        $this->quote_by                 = $blog->quote_by;
        $this->blog                     = $blog;
    }

    public function formatImage($new_image, $old_image)
    {

        //Save the new file
        if ($new_image) {

            //Deletes old image first
            if(!empty($old_image)){$this->deleteOldFile($old_image);}

            return $this->storeFile($new_image);
        }
        return  [
            'name'          => $old_image,
        ];
    }

    public function storeFile($image)
    {

        $img = ImageManagerStatic::make($image)->encode('jpg');
        $original_filename = $image->getClientOriginalName();
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
            ];

    }

    protected function deleteOldFile($filename){
        Storage::delete('/public/'.$filename);
    }

    public function render()
    {
        return view('livewire.admin.edit-blog');
    }
}
