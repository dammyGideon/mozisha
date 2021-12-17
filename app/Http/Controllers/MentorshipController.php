<?php

namespace App\Http\Controllers;

use App\Models\Connect;
use App\Models\NewSchedule;
use App\Models\Setting;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MentorshipController extends Controller
{
    private $social;
    private $setting;


    public function __construct()
    {
        // $this->middleware('auth');
        $this->social = Social::latest()->first(); //fetches the last record
        $this->setting = Setting::latest()->first(); //fetches the last record

    }

    public function mentorAppDashboard($id){
            $conn = Connect::find($id);
            $user = User::find($conn->mentee_id);
            Session::put('chat_id', $conn->connect_id_string);
        $data = [
            'title'         => $user->name . ' Apprenticeship dashboard | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'mozisha.net, Registration as a mentor, register as a mentor, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                                The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'      => 'Home | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentor/app/dashboard' ,['setting' => $this->setting, 'user' => Auth::user(), 'social' => $this->social, 'data' => $data, 'conn' => $conn]);
    }


    public function appGoal($id){
        $conn = Connect::find($id);
        $data = [
            'title'         => 'User dashboard | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'mozisha.net, Registration as a mentor, register as a mentor, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                                The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'      => 'Home | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentor/app/goal' ,['setting' => $this->setting, 'user' => Auth::user(), 'social' => $this->social, 'data' => $data, 'conn' => $conn]);
    }

    public function menteeAppDashboard($id){
        $conn = Connect::find($id);
        $user = User::find($conn->mentor_id);
        $data = [
            'title'         => $user->name . ' Apprenticeship dashboard | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'mozisha.net, Registration as a mentor, register as a mentor, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                                The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'      => 'Home | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentee/app/dashboard' ,['setting' => $this->setting, 'user' => Auth::user(), 'social' => $this->social, 'data' => $data, 'conn' => $conn]);
    }

    public function menteeAppGoal($id){
        $conn = Connect::find($id);
        $data = [
            'title'         => 'User dashboard | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'mozisha.net, Registration as a mentor, register as a mentor, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                                The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'      => 'Home | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentee/app/goal' ,['setting' => $this->setting, 'user' => Auth::user(), 'social' => $this->social, 'data' => $data, 'conn' => $conn]);
    }

}
