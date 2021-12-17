<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Social;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminNewContactMail;

class LoginController extends Controller
{

    private $social;
    private $setting;

/*
|--------------------------------------------------------------------------
| Login Controller
|--------------------------------------------------------------------------
|
| This controller handles authenticating users for the application and
| redirecting them to your home screen. The controller uses a trait
| to conveniently provide its functionality to your applications.
|
*/

    use AuthenticatesUsers;


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->social = Social::latest()->first(); //fetches the last record
        $this->setting = Setting::latest()->first(); //fetches the last record

    }



    public function login(){
        $data = [
            'title'         => 'Login | Mozisha | The learning community dedicated to building responsible entrepreneurs|',
            'description'   => 'The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners and also get the support you need to achieve your professional goals with an Mozisha apprenticeship',
            'keywords'      => 'mozisha.net, mozisha login,  mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'     => 'Home | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/auth/login' ,['setting' => $this->setting, 'social' => $this->social, 'data' => $data]);
    }

    public function reset(){
        $data = [
            'title'         => 'Reset password | Mozisha | The learning community dedicated to building responsible entrepreneurs|',
            'description'   => 'The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners and also get the support you need to achieve your professional goals with an Mozisha apprenticeship',
            'keywords'      => 'mozisha.net, mozisha login,  mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'     => 'Home | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/auth/reset' ,['setting' => $this->setting, 'social' => $this->social, 'data' => $data]);
    }


    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('homepage');
    }

   public function message(Request $request) {
        try {
            //Mails admin concerning the request
            $data = [
                'email' => $request->email,
                'name'  => $request->name,
                'organisation'  => $request->organisation,
                'phone'  => $request->phone,
                'message'  => $request->message,
            ];
            Mail::to(['bolaji@mozisha.com','kene@mozisha.com', 'info@mozisha.com'])->send(new AdminNewContactMail($data));
        }catch (\Exception $e){
            $this->emit('alert', ['type' => 'info', 'message' => 'mail failed.']);
        }
        session()->flash('message', 'Your request has been received and is being processed.');
        return redirect()->route('homepage');
    }


}
