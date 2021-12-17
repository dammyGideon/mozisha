<?php

namespace App\Http\Controllers;

use App\Models\Apprenticeship;
use App\Models\Setting;
use App\Models\Social;
use App\Models\User;
use App\Models\Request;
use Illuminate\Support\Facades\Auth;

class MenteeController extends Controller
{

    private $social;
    private $setting;


    public function __construct()
    {
        // $this->middleware('auth');
        $this->social = Social::latest()->first(); //fetches the last record
        $this->setting = Setting::latest()->first(); //fetches the last record

    }

    public function menteeRegister(){
        $data = [
            'title'         => 'Mentee registeration | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'mozisha.net, Registration as a mentor, register as a mentor, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'     => 'Home | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/auth/mentee_register', ['setting' => $this->setting, 'social' => $this->social, 'data' => $data]);
    }

    public function menteeDashboard(){
        $user = User::find(Auth::user()->id);
        $data = [
            'title'         => Auth::user()->name.' | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'mozisha.net, Registration as a mentor, register as a mentor, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'     => 'Home | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentee/dashboard', ['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'user' => $user]);
    }

    public function menteeProfileSettings(){
        $user = User::find(Auth::user()->id);
        $data = [
            'title'         => Auth::user()->name. ' | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'mozisha.net, Registration as a mentor, register as a mentor, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'     => 'Home | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentee/profile_settings', ['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'user' => $user]);
    }

    public function menteeProfile(){
        $user = User::find(Auth::user()->id);
        $data = [
            'title'         => Auth::user()->name. ' | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'mozisha.net, Mozisha.com, Registration as a mentee, register as a mentee, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'     => 'Mentee profile | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentee/profile', ['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'user' => $user]);
    }

    public function updateProfile(){
        $user = User::find(Auth::user()->id);
        $data = [
            'title'         => Auth::user()->name. ' | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'mozisha.net, Registration as a mentee, register as a mentee, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'     => 'Update Profile | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentee/profile_update', ['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'user' => $user]);
    }

    public function findApprenticeship(){
        $user = User::find(Auth::user()->id);
        $data = [
            'title'         => 'Find Apprenticeship | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'Find Apprenticeship on Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'Find Apprenticeship, mozisha.com, mozisha.net,Find Apprenticeship, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'     => 'Find Apprenticeship | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentee/find_apprenticeship', ['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'user' => $user]);
    }

    public function viewBusinessProfile($mentor_id){
        $user = User::find($mentor_id);
        $data = [
            'title'         => 'Business Profile | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'Business Profile on Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'Business Profile, mozisha.com, mozisha.net,Find Apprenticeship, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'     => 'Business Profile | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentee/view_mentors_profile', ['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'user' => $user]);
    }


    public function viewApprenticeship($id){
        $app  = Apprenticeship::find($id);
        $user = User::find(Auth::user()->id);
        $data = [
            'title'         => 'Find Apprenticeship | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'Find Apprenticeship on Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'Find Apprenticeship, mozisha.com, mozisha.net,Find Apprenticeship, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'     => 'Find Apprenticeship | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentee/view_apprenticeship', ['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'user' => $user, 'app' => $app]);
    }



    public function applicationSuccess($request_id){

        $request = Request::findOrFail($request_id);
        $app  = Apprenticeship::find($request->apprenticeship_id);
        $user = User::find(Auth::user()->id);
        $data = [
            'title'         => 'Application successful | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'mozisha.net, mozisha.com, Registration as a mentor, register as a mentor, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'      => 'Home | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentee/application_success', ['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'user' => $user, 'app' => $app, 'request' => $request]);
    }

}
