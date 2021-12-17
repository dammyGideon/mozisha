<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Social;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    private $social;
    private $setting;


    public function __construct()
    {
        $this->social = Social::latest()->first(); //fetches the last record
        $this->setting = Setting::latest()->first(); //fetches the last record

    }



    use AuthenticatesUsers;


    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $googleUser = User::where('google_id', $user->id)->first(); //Check for google users

            if ($googleUser)
            {
                        Auth::login($googleUser);

                    if(Auth::user()->hasRole('mentor')){
                        return redirect()->route('mentor.dashboard');
                    }

                    if(Auth::user()->hasRole('mentee')){
                        return redirect()->route('mentee.dashboard');
                    }

                    if(Auth::user()->hasRole('administrator')){
                        return redirect()->route('admin.home');
                    }

                    if(Auth::user()->hasRole('superadministrator')){
                        return redirect()->route('admin.home');
                    }

                    if(Auth::user()->hasRole('developer')){
                        return redirect()->route('admin.home');
                    }

                    if(Auth::user()->hasRole('writer')){
                        return redirect()->route('admin.home');
                    }

                    if(Auth::user()->hasRole('editor')){
                        return redirect()->route('admin.home');
                    }

            } else {

                //check if the user is registered without google, the create google_id
                $localUserCount = User::where('email', $user->email)->count();

                if($localUserCount > 0)
                {
                    //Updates the user's google_id
                    User::where('email', $user->email)->update([
                        'google_id' => $user->id,
                    ]);

                  //Fetch the user with the updated google_id
                  $googleUser = User::where('google_id', $user->id)->first();

                  Auth::login($googleUser);
                    if(Auth::user()->hasRole('mentor')){
                        return redirect()->route('mentor.dashboard');
                    }
                    if(Auth::user()->hasRole('mentee')){
                        return redirect()->route('mentee.dashboard');
                    }
                    if(Auth::user()->hasRole('administrator')){
                        return redirect()->route('admin.home');
                    }

                    if(Auth::user()->hasRole('superadministrator')){
                        return redirect()->route('admin.home');
                    }

                    if(Auth::user()->hasRole('developer')){
                        return redirect()->route('admin.home');
                    }

                    if(Auth::user()->hasRole('writer')){
                        return redirect()->route('admin.home');
                    }

                    if(Auth::user()->hasRole('editor')){
                        return redirect()->route('admin.home');
                    }


                }else{

                    /* If the user does not exist in the database
                     | We try to check if he's actually trying
                     | to register by checking the role session coming from
                     | from the google sign up page
                    */


                     //Checks if there is role session set
                    if (Session::has('role')){return $this->newAccount($user);}

                        //If session is not set i.e if not trying to register
                        session()->flash('error', 'Account not found, Please create an Account!.');
                        return redirect()->route('user.account');



                }


            }
        } catch (Exception $e) {
//            dd($e->getMessage());
        }
    }


    public function newAccount($user)
    {
        //If not found the register
        $newUser = User::create([
            'name'      => $user->name,
            'email'     => $user->email,
            'google_id' => $user->id,
            'password'  => bcrypt('12345dummy')
        ]);

        //Updating user details
        $newAccount =  User::where('google_id', $user->id)->first();
        UserDetail::create([
            'user_id' => $newAccount->id,
            'firstname'     => '',
            'lastname'      => '',
            'age'           => '',
            'phone'         => '',
            'address'       => '',
            'city'          => '',
            'state'         => '',
            'zipcode'       => '',
            'country'       => '',
            'about'         => '',
        ]);

        return redirect('/auth/google/user/'.$user->id.'/password');//redirect to change password page
    }


    public function redirectMenteeToGoogle(){
        Session::put('role', 'mentee'); //sets account type
        return Socialite::driver('google')->redirect();
    }

    public function redirectMentorToGoogle(){
        Session::put('role', 'mentor'); //sets account type
        return Socialite::driver('google')->redirect();
    }

    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function selectGooglePassword($google_id){
        $data = [
            'title'         => 'Login | Mozisha | The learning community dedicated to building responsible entrepreneurs|',
            'description'   => 'The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners and also get the support you need to achieve your professional goals with an Mozisha apprenticeship',
            'keywords'      => 'mozisha.net, mozisha login,  mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building respectful and responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'     => 'Home | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',
        ];
        return view('user/auth/select_password', ['google_id' => $google_id, 'setting' => $this->setting, 'social' => $this->social, 'data' => $data]);
    }


    //User Validation Through an API Request
    public function validateUser(Request $request)
    {

            //if some of d require data is empty
            if(empty($request->email) || empty($request->password)){
                return response()->json([
                    'responseType'    => 'error',
                    'message'         => 'Required parameter missing',
                ], 400);
            }

            //else if none of d field is empty
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'Active']))
            {
                // If Authentication is passed...
                $user = User::where('email', $request->email)->first();
                return response()->json([
                    'responseType'    => 'success',
                    'message'         => 'Validation Successful',
                    'data'            => $user,
                ], 200);
            }
            // If Authentication failed...
            return response()->json([
                'responseType'    => 'error',
                'message'         => 'Unknown user',
            ],400);

         }
}
