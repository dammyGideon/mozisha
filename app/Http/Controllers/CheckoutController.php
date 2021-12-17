<?php

namespace App\Http\Controllers;

use App\Models\Connect;
use App\Models\Setting;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    private $social;
    private $setting;


    public function __construct()
    {
        // $this->middleware('auth');
        $this->social = Social::latest()->first(); //fetches the last record
        $this->setting = Setting::latest()->first(); //fetches the last record

    }

    public function checkout($connect_id_string){
        $user = User::find(Auth::user()->id);
        $connect = Connect::where('connect_id_string', $connect_id_string)->first();
        $data = [
            'title'         => Auth::user()->name. ' | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'mozisha.net, Mozisha.com, Registration as a mentee, register as a mentee, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'     => 'Mentee profile | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentee/checkout', ['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'user' => $user, 'connect' => $connect]);
    }


    public function invoices()
    {
        $data = [
            'title'         => Auth::user()->name. ' | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
            'description'   => 'Mozisha, providing students with free, hands-on marketing experience to help businesses grow. Students - take courses online and gain practical experience with an apprenticeship. Businesses - search our talent pool and start saving time and money on your marketing efforts. Sign up today!',
            'keywords'      => 'mozisha.net, Mozisha.com, Registration as a mentee, register as a mentee, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'     => 'Mentee profile | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/mentee/invoices', ['setting' => $this->setting, 'social' => $this->social, 'user' => Auth::user(), 'data' => $data,]);

    }
}
