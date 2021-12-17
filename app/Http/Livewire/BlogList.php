<?php

namespace App\Http\Livewire;

use Livewire\Component;
use  \App\Models\Blog;
use Livewire\WithPagination;

class BlogList extends Component
{
    use WithPagination;

//    public $blogs;
//
//    public function mount(){
//        $this->blogs = Blog::all();
//    }

    public function updateStatus($id){
        $blog = Blog::find($id);
        if($blog->status == "Active"){
            Blog::where('id', $id)->update([
               'status' => 'Inactive',
            ]);
        }
        if($blog->status == "Inactive"){
            Blog::where('id', $id)->update([
                'status' => 'Active',
            ]);
        }

        session()->flash('message', 'Post updated successfully!.'); //displays a flash message
    }

    public function render()
    {
        return view('livewire.admin.blog-list', [
            'blogs' => Blog::latest()->paginate(15),
        ]);
    }
}
