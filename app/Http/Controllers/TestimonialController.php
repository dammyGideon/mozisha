<?php

namespace App\Http\Controllers;

use App\Models\c;
use App\Models\Setting;
use App\Models\Social;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    private $setting;


    public function __construct()
    {
        // $this->middleware('auth');
        $this->social = Social::latest()->first(); //fetches the last record
        $this->setting = Setting::latest()->first(); //fetches the last record

    }


    public function newTestimonial(){
        return view('admin/new_testimonial');
    }

    public function testimonials(){
        return view('admin/testimonial_list');
    }

    public function edit($id){
        $testimonial =  Testimonial::find($id);
        return view('admin/edit_testimonial', ['testimonial' => $testimonial]);
    }
}
