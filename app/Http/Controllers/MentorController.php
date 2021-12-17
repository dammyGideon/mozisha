<?php

namespace App\Http\Controllers;

use App\Models\Apprenticeship;
use App\Models\Connect;
use App\Models\NewSchedule;
use App\Models\Setting;
use App\Models\Social;
use App\Models\User;
use App\Models\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use MongoDB\Driver\Session;

class MentorController extends Controller
{

    private $social;
    private $setting;


    public function __construct()
    {
        // $this->middleware('auth');
        $this->social = Social::latest()->first(); //fetches the last record
        $this->setting = Setting::latest()->first(); //fetches the last record

    }


    public function mentorRegister(){
        $data = [
            'title'         => 'Mentor registeration | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'mozisha.net, Registration as a mentor, register as a mentor, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'     => 'Home | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/auth/mentor_register' ,['setting' => $this->setting, 'social' => $this->social,  'data' => $data]);
    }

    public function mentorDashboard(){
        $data = [
            'title'         => 'User dashboard | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'mozisha.net, Registration as a mentor, register as a mentor, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                                The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'      => 'Home | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentor/dashboard' ,['setting' => $this->setting, 'user' => Auth::user(), 'social' => $this->social, 'data' => $data]);
    }


    public function mentorProfileSettings(){
        $user = User::find(Auth::user()->id);
        $data = [
            'title'         => Auth::user()->name. ' | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'mozisha.net, Registration as a mentor, register as a mentor, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'     => 'Home | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentor/profile_settings', ['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'user' => $user]);
    }

    public function apprenticeships(){
        $data = [
            'title'         => Auth::user()->name. ' | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'mozisha.net, Registration as a mentor, register as a mentor, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'     => 'Home | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentor/mentor_apprenticeships', ['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'user' => Auth::user()]);
    }

    public function mentorProfile(){
        $user = User::find(Auth::user()->id);
        $data = [
            'title'         => Auth::user()->name. ' | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'mozisha.net, Mozisaha.com,mentor profile on mozisha, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'     => 'Mentee profile | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentor/profile', ['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'user' => $user]);
    }


    public function updateProfile(){
        $user = User::find(Auth::user()->id);
        $data = [
            'title'         => Auth::user()->name. ' | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'mozisha.net, Update your profile as a mentor, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'     => 'Update Profile | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentor/profile_update', ['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'user' => $user]);
    }

    public function newApprenticeship(){
        $user = User::find(Auth::user()->id);
        $data = [
            'title'         => 'New Apprenticeship | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'New Apprenticeship on Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'New Apprenticeship, mozisha.com, mozisha.net,Find Apprenticeship, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'     => 'New Apprenticeship | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentor/new_apprenticeship', ['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'user' => $user]);
    }

    public function viewMentee($id, $req){
        $user   = User::find(Auth::user()->id);
        $req    = Request::find($req);
        $mentee = User::find($id);

        $data = [
            'title'         => $mentee->name . ' | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => $mentee->name . ' Apprenticeship on Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => $mentee->name. ', mozisha.com, mozisha.net,Find Apprenticeship, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'     => 'New Apprenticeship | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentor/view_mentee_profile', ['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'user' => $user, 'mentee' => $mentee, 'req' => $req]);
    }

    public function acceptanceSuccess($id){
        $conn  = Connect::find($id);
        $user = User::find(Auth::user()->id);
        $data = [
            'title'         => 'Acceptance successful | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'mozisha.net, mozisha.com, Registration as a mentor, register as a mentor, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'      => 'Home | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentor/acceptance_success', ['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'user' => $user, 'conn' => $conn]);
    }

    public function viewApprenticeship($id){
        $app  = Apprenticeship::find($id);
        \Illuminate\Support\Facades\Session::put('update_app', $app);
        $user = User::find(Auth::user()->id);
        $data = [
            'title'         => $app->title . ' | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   =>  $app->title . ' providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      =>  $app->title . 'Find Apprenticeship, mozisha.com, mozisha.net,Find Apprenticeship, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'     =>  $app->title . 'Find Apprenticeship | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentor/mentor_apprenticeship_view', ['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'user' => $user, 'app' => $app]);
    }


    public function newTask(){
        $user = User::find(Auth::user()->id);
        $data = [
            'title'         => 'New Task | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'New Task, Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'mozisha.net, Mozisaha.com,mentor profile on mozisha, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'     => 'New Task | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentor/new_task', ['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'user' => Auth::user()]);
    }


    public function viewMeeting($id){
        $meeting = NewSchedule::find($id);
        $data = [
            'title'         => $meeting->topic .' | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => $meeting->topic . 'Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => $meeting->topic .'mozisha.net, Registration as a mentor, register as a mentor, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                                The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'      => $meeting->topic . ' | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentor/view_meeting' ,['setting' => $this->setting, 'social' => $this->social, 'user' => Auth::user(), 'data' => $data, 'meeting' => $meeting]);
    }

    //The mentor_list for admin page
    public function mentors(){
        return view('admin/mentor_list');
    }
}

