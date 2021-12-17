<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Setting;
use App\Models\Social;
use App\Models\Team;
use Illuminate\Http\Request;

class UserPageController extends Controller
{

    private $social;
    private $setting;


    public function __construct()
    {
       // $this->middleware('auth');
        $this->social = Social::latest()->first(); //fetches the last record
        $this->setting = Setting::latest()->first(); //fetches the last record

    }

    public function home(){
        $data = [
            'title'         => 'Mozisha | A one-stop platform for personal, career and business development.\'',
            'description'   => 'A one-stop platform for personal, career and business development.',
            'keywords'      => 'mozisha, mozisha.net, mozisha.com, mozisha, mozisha international,A one-stop platform for personal, career and business development., mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building  responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'      => 'Home | Mozisha | The learning community dedicated to building  responsible entrepreneurs',

            'sm_title'         => 'Mozisha | A one-stop platform for personal, career and business development.',
            'sm_description'   => 'A one-stop platform for personal, career and business development.',
            'sm_image'         => 'https://mozisha.com/user/img/moz.jpg',
            'sm_url'           => route('homepage'),
        ];
        return view('user/home' ,['setting' => $this->setting, 'social' => $this->social, 'data' => $data]);
    }

    public function about(){
        $data = [
            'title'            => 'About Mozisha | A one-stop platform for personal, career and business development.',
            'description'      => 'A one-stop platform for personal, career and business development.',
            'keywords'         => 'mozisha.net, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building  responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'         => 'About Mozisha | Mozisha | The learning community dedicated to building responsible entrepreneurs',

            'sm_title'         => 'About Mozisha | A one-stop platform for personal, career and business development.',
            'sm_description'   => 'A one-stop platform for personal, career and business development.',
            'sm_image'         => 'https://mozisha.com/user/img/moz.jpg',
            'sm_url'           => route('about'),

        ];
        return view('user/about' ,['setting' => $this->setting, 'social' => $this->social, 'data' => $data]);
    }



    public function coursesMore(){
        $data = [
            'title'         => 'Courses | A one-stop platform for personal, career and business development.',
            'description'   => 'A one-stop platform for personal, career and business development.',
            'keywords'      => 'mozisha.net, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                                The learning community dedicated to building  responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'      => 'Courses | Mozisha | The learning community dedicated to building responsible entrepreneurs',

            'sm_title'         => 'Mozisha | A one-stop platform for personal, career and business development.',
            'sm_description'   => 'A one-stop platform for personal, career and business development.',
            'sm_image'         => 'https://mozisha.com/user/img/moz.jpg',
            'sm_url'           => route('homepage'),

        ];
        return view('user/elearning_more' ,['setting' => $this->setting, 'social' => $this->social, 'data' => $data]);
    }

    public function appMore(){
        $data = [
            'title'         => 'Apprenticeship platform | A one-stop platform for personal, career and business development.',
            'description'   => 'A one-stop platform for personal, career and business development.',
            'keywords'      => 'Apprenticeship platform, mozisha.net, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                                The learning community dedicated to building responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'      => 'Apprenticeship platform | Mozisha | The learning community dedicated to building responsible entrepreneurs',

            'sm_title'         => 'Mozisha | A one-stop platform for personal, career and business development.',
            'sm_description'   => 'A one-stop platform for personal, career and business development.',
            'sm_image'         => 'https://mozisha.com/user/img/moz.jpg',
            'sm_url'           => route('homepage'),
        ];
        return view('user/app_more' ,['setting' => $this->setting, 'social' => $this->social, 'data' => $data]);
    }
    public function colMore(){
        $data = [
            'title'         => 'Collaboration platform | A one-stop platform for personal, career and business development.',
            'description'   => 'A one-stop platform for personal, career and business development.',
            'keywords'      => 'Collaboration platform, mozisha.net, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                                The learning community dedicated to building responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'      => 'Collaboration platform | Mozisha | The learning community dedicated to building responsible entrepreneurs',

            'sm_title'         => 'Mozisha | A one-stop platform for personal, career and business development.',
            'sm_description'   => 'A one-stop platform for personal, career and business development.',
            'sm_image'         => 'https://mozisha.com/user/img/moz.jpg',
            'sm_url'           => route('homepage'),
        ];
        return view('user/col_more' ,['setting' => $this->setting, 'social' => $this->social, 'data' => $data]);
    }

    public function freeMore(){
        $data = [
            'title'         => 'Freelancing platform | A one-stop platform for personal, career and business development.',
            'description'   => 'A one-stop platform for personal, career and business development.',
            'keywords'      => 'Freelancing platform, mozisha.net, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                                The learning community dedicated to building responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'      => 'Freelancing platform | Mozisha | The learning community dedicated to building  responsible entrepreneurs',


            'sm_title'         => 'Mozisha | The learning community dedicated to building responsible entrepreneurs|',
            'sm_description'   => 'A one-stop platform for personal, career and business development.',
            'sm_image'         => 'https://mozisha.com/user/img/moz.jpg',
            'sm_url'           => route('homepage'),
        ];
        return view('user/freelance_more' ,['setting' => $this->setting, 'social' => $this->social, 'data' => $data]);
    }



    public function blog(){
        $data = [
            'title'            => 'Mozisha Blogs | A one-stop platform for personal, career and business development.',
            'description'      => 'A one-stop platform for personal, career and business development.',
            'keywords'         => 'mozisha.net, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'         => 'Mozisha Blogs',

            'sm_title'         => 'Mozisha Blogs | A one-stop platform for personal, career and business development.',
            'sm_description'   => 'A one-stop platform for personal, career and business development.',
            'sm_image'         => 'https://mozisha.com/user/img/moz.jpg',
            'sm_url'           => route('blog'),
        ];
        return view('user/blog' ,['setting' => $this->setting, 'social' => $this->social, 'data' => $data]);
    }

    public function blogCategory($category){
        $data = [
            'title'            => $category . ' | A one-stop platform for personal, career and business development.',
            'description'      => $category . ' Blogs ',
            'keywords'         => $category. ', mozisha.net, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'         => 'Mozisha Blogs',

            'sm_title'         => $category . ' | A one-stop platform for personal, career and business development.',
            'sm_description'   => $category . ' Blogs',
            'sm_image'         => 'https://mozisha.com/user/img/moz.jpg',
            'sm_url'           => route('blog.category', $category),
        ];
        return view('user/blog_category' ,['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'category' => $category]);
    }


    public function team(){
        $data = [
            'title'         => 'Mozisha Team ',
            'description'   => 'Team working at mozisha international',
            'keywords'      => 'Mozisha Team, mozisha.net, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'        => 'Mozisha Team',

            'sm_title'         => 'Mozisha Team ',
            'sm_description'   => 'Team working at mozisha international',
            'sm_image'         => 'https://mozisha.com/user/img/moz.jpg',
            'sm_url'           => route('team'),
        ];
        return view('user/team' ,['setting' => $this->setting, 'social' => $this->social, 'data' => $data]);
    }


    public function teamView($id){
        $member = Team::findOrFail($id);
        $data = [
            'title'            => $member->first_name . ' ' . $member->last_name,
            'description'      => $member->first_name . ' ' . $member->last_name .'Team working at mozisha international',
            'keywords'         => $member->first_name . ' ' . $member->last_name .'Mozisha Team, mozisha.net, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'         => $member->first_name . ' ' . $member->last_name,

            'sm_title'         => $member->first_name . ' ' . $member->last_name,
            'sm_description'   => $member->first_name . ' ' . $member->last_name.  'Team working at mozisha international',
            'sm_image'         => $member->ImagePath,
            'sm_url'           => route('team.view', $member->id),
        ];
        return view('user/team_view' ,['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'member' => $member]);
    }


    public function mozilearnSoon(){
        $data = [
            'title'         => 'Coming soon on Mozisha | A one-stop platform for personal, career and business development.',
            'description'   => 'A one-stop platform for personal, career and business development.',
            'keywords'      => 'mozisha.net, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'      => 'Home | Mozisha | The learning community dedicated to building responsible entrepreneurs',

            'sm_title'         => 'Coming soon on Mozisha | A one-stop platform for personal, career and business development.',
            'sm_description'   => 'This feature is coming soon on Mozisha ',
            'sm_image'         => 'https://mozisha.com/user/img/moz.jpg',
            'sm_url'           => route('coming_soon'),
        ];
        return view('user/mozilearn_coming_soon' ,['setting' => $this->setting, 'social' => $this->social, 'data' => $data]);
    }

    public function mozilanceSoon(){
        $data = [
            'title'         => 'Coming soon on Mozisha | A one-stop platform for personal, career and business development.',
            'description'   => 'A one-stop platform for personal, career and business development.',
            'keywords'      => 'mozisha.net, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'      => 'Home | Mozisha | The learning community dedicated to building responsible entrepreneurs',

            'sm_title'         => 'Coming soon on Mozisha | A one-stop platform for personal, career and business development.',
            'sm_description'   => 'This feature is coming soon on Mozisha ',
            'sm_image'         => 'https://mozisha.com/user/img/moz.jpg',
            'sm_url'           => route('coming_soon'),
        ];
        return view('user/mozilance_coming_soon' ,['setting' => $this->setting, 'social' => $this->social, 'data' => $data]);
    }



    public function accountType(){
        $data = [
            'title'         => 'Account type',
            'description'   => 'Select the type of account you wish to create on mozisha',
            'keywords'      => 'Account type on mozisha, mozisha.net, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building  responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'      => 'Home | Mozisha | The learning community dedicated to building responsible entrepreneurs',

            'sm_title'         => 'Account type',
            'sm_description'   => 'Select the type of account you wish to create on mozisha',
            'sm_image'         => 'https://mozisha.com/user/img/moz.jpg',
            'sm_url'           => route('user.account'),
        ];
        return view('user/auth/account_type' ,['setting' => $this->setting, 'social' => $this->social, 'data' => $data]);
    }

    public function testimonials(){
        $data = [
            'title'         => 'Testimonials',
            'description'   => 'Testimonials of our trustees',
            'keywords'      => 'Testimonials,Mozisha Team, mozisha.net, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'        => 'Mozisha Testimonials',

            'sm_title'         => 'Mozisha Testimonials ',
            'sm_description'   => 'Testimonials of mozisha international trustees',
            'sm_image'         => 'https://mozisha.com/user/img/moz.jpg',
            'sm_url'           => route('testimonials'),
        ];
        return view('user/testimonials' ,['setting' => $this->setting, 'social' => $this->social, 'data' => $data]);
    }

}
