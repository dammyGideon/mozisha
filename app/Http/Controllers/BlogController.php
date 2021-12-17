<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use App\Models\Setting;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic;

class BlogController extends Controller
{
    private $social;
    private $setting;


    public function __construct()
    {
        // $this->middleware('auth');
        $this->social = Social::latest()->first(); //fetches the last record
        $this->setting = Setting::latest()->first(); //fetches the last record

    }


    public function newBlog(){
        return view('admin/new_blog');
    }

    public function store(BlogRequest $request)
    {
//        dd($request->all());
        //Store the image and get the parameters
        $image = $this->formatImage($request->image);

        //Store other image and get the parameters if supplied
        $continue_image_1 = $this->formatImage($request->continue_image_1);

        $continue_image_2 = $this->formatImage($request->continue_image_2);

        $continue_image_3 = $this->formatImage($request->continue_image_3);

        $continue_image_4 = $this->formatImage($request->continue_image_4);

        $continue_image_5 = $this->formatImage($request->continue_image_5);

        $continue_image_6 = $this->formatImage($request->continue_image_6);

        $continue_image_7 = $this->formatImage($request->continue_image_7);

        $continue_image_8 = $this->formatImage($request->continue_image_8);

        $continue_image_9 = $this->formatImage($request->continue_image_9);


        Blog::create([
            'title'             => $request->title,
            'slug'              => Str::slug($request->title),
            'image'             => $image['name'],
            'caption'           => $request->caption,
            'category'          => $request->category,
            'content'           => $request->main_content,
            'continue_1'        => $request->continue_1,
            'continue_image_1'  => $continue_image_1['name'],
            'caption_1'         => $request->caption_1,
            'continue_2'        => $request->continue_2,
            'continue_image_2'  => $continue_image_2['name'],
            'caption_2'         => $request->caption_2,
            'continue_3'        => $request->continue_3,
            'continue_image_3'  => $continue_image_3['name'],
            'caption_3'         => $request->caption_3,
            'continue_4'        => $request->continue_4,
            'continue_image_4'  => $continue_image_4['name'],
            'caption_4'         => $request->caption_4,
            'continue_5'        => $request->continue_5,
            'continue_image_5'  => $continue_image_5['name'],
            'caption_5'         => $request->caption_5,
            'continue_6'        => $request->continue_6,
            'continue_image_6'  => $continue_image_6['name'],
            'caption_6'         => $request->caption_6,
            'continue_7'        => $request->continue_7,
            'continue_image_7'  => $continue_image_7['name'],
            'caption_7'         => $request->caption_7,
            'continue_8'        => $request->continue_8,
            'continue_image_8'  => $continue_image_8['name'],
            'caption_8'         => $request->caption_8,
            'continue_9'        => $request->continue_9,
            'continue_image_9'  => $continue_image_9['name'],
            'caption_9'         => $request->caption_9,
            'quote'             => $request->quote,
            'quote_by'          => $request->quote_by,
            'status'            => $request->status,
            'user_id'           => Auth::user()->id,
        ]);


        return redirect()->back()->with('message', 'Post uploaded successfully');
    }

    public function update(Request $request, Blog $blog)
    {
        //Check if the title exists apart from this
        if(!$this->checkForExistingBlog($blog->id, $request->title))
        {
            return redirect()->back()->with('error', 'Post already exist');
        }

        $image = $this->formatUpdatedImage($request->image, $blog->image);

        $continue_image_1 = $this->formatUpdatedImage($request->continue_image_1, $blog->continue_image_1);

        $continue_image_2 = $this->formatUpdatedImage($request->continue_image_2, $blog->continue_image_2);

        $continue_image_3 = $this->formatUpdatedImage($request->continue_image_3, $blog->continue_image_3);

        $continue_image_4 = $this->formatUpdatedImage($request->continue_image_4, $blog->continue_image_4);

        $continue_image_5 = $this->formatUpdatedImage($request->continue_image_5, $blog->continue_image_5);

        $continue_image_6 = $this->formatUpdatedImage($request->continue_image_6, $blog->continue_image_6);

        $continue_image_7 = $this->formatUpdatedImage($request->continue_image_7, $blog->continue_image_7);

        $continue_image_8 = $this->formatUpdatedImage($request->continue_image_8, $blog->continue_image_8);

        $continue_image_9 = $this->formatUpdatedImage($request->continue_image_9, $blog->continue_image_9);

        $blog->update([
            'title'             => $request->title,
            'slug'              => Str::slug($request->title),
            'image'             => $image['name'],
            'caption'           => $request->caption,
            'category'          => $request->category,
            'content'           => $request->main_content,
            'continue_1'        => $request->continue_1,
            'continue_image_1'  => $continue_image_1['name'],
            'caption_1'         => $request->caption_1,
            'continue_2'        => $request->continue_2,
            'continue_image_2'  => $continue_image_2['name'],
            'caption_2'         => $request->caption_2,
            'continue_3'        => $request->continue_3,
            'continue_image_3'  => $continue_image_3['name'],
            'caption_3'         => $request->caption_3,
            'continue_4'        => $request->continue_4,
            'continue_image_4'  => $continue_image_4['name'],
            'caption_4'         => $request->caption_4,
            'continue_5'        => $request->continue_5,
            'continue_image_5'  => $continue_image_5['name'],
            'caption_5'         => $request->caption_5,
            'continue_6'        => $request->continue_6,
            'continue_image_6'  => $continue_image_6['name'],
            'caption_6'         => $request->caption_6,
            'continue_7'        => $request->continue_7,
            'continue_image_7'  => $continue_image_7['name'],
            'caption_7'         => $request->caption_7,
            'continue_8'        => $request->continue_8,
            'continue_image_8'  => $continue_image_8['name'],
            'caption_8'         => $request->caption_8,
            'continue_9'        => $request->continue_9,
            'continue_image_9'  => $continue_image_9['name'],
            'caption_9'         => $request->caption_9,
            'quote'             => $request->quote,
            'quote_by'          => $request->quote_by,
            'status'            => $request->status,
        ]);

        return redirect()->back()->with('message', 'Post updated successfully');
    }


    public function formatUpdatedImage($new_image, $old_image)
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

    protected function deleteOldFile($filename)
    {
        Storage::delete('/public/'.$filename);
    }

    public function checkForExistingBlog($id, $title)
    {
        $checkBlog = Blog::where([
            ['id', '!=', $id],
            ['title', '=', $title]
        ])->first();

        if ($checkBlog){
            return false;
        }
        return true;
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
                'original_name' => $original_filename,
            ];

    }


    public function blogs(){
        return view('admin/blog_list');
    }

    public function edit($id){
        $blog = Blog::find($id);
        return view('admin/edit_blog', ['blog' => $blog]);
    }

    public function userView($slug){
        $blog = Blog::where('slug', $slug)->first();
        $data = [
            'title'         => $blog->title,
            'description'   =>  Str::limit($blog->content, $limit = 300, $end = '...'),
            'keywords'      => $blog->title . ', mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'      => $blog->title,

            //Social media metadatas
            'sm_title'       => $blog->title,
            'sm_description' => Str::limit($blog->content, $limit = 300, $end = '...'),
            'sm_image'       => $blog->ImagePath,
            'sm_url'         => 'https://mozisha.com/blog/'.$blog->slug,
        ];
        return view('user/user_blog_view' ,['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'blog' => $blog]);

    }
}
