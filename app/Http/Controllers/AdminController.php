<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use MongoDB\Driver\Exception\Exception;

class AdminController extends Controller
{


    //The admin profile page
    public function profile(){
        return view('admin/profile');
    }

    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function selectGooglePassword($google_id){
        return view('admin/select_google_password', ['google_id' => $google_id]);
    }


    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $googleUser = User::where('google_id', $user->id)->first(); //Check for google users
            $existingUser = User::where('email', $user->email)->first(); //Check for existing users

            if ($googleUser || $existingUser) {
                session()->flash('message', 'You already have an with us.');
                return redirect()->intended('dashboard');
            } else {

                //If not found the register
                $newUser = User::create([
                    'name'      => $user->name,
                    'email'     => $user->email,
                    'google_id' => $user->id,
                    'password'  => bcrypt('12345dummy')
                ]);
                $newUser->attachRole('administrator');
                $newAccount =  User::where('google_id', $user->id)->first();


                UserDetail::create([
                    'user_id' => $newAccount->id,
                    'firstname'     => 'Yet to be supplied',
                    'lastname'      => 'Yet to be supplied',
                    'date_of_birth' => 'Yet to be supplied',
                    'email'         => 'Yet to be supplied',
                    'phone'         => 'Yet to be supplied',
                    'address'       => 'Yet to be supplied',
                    'city'          => 'Yet to be supplied',
                    'state'         => 'Yet to be supplied',
                    'zipcode'       => 'Yet to be supplied',
                    'country'       => 'Yet to be supplied',
                    'about'         => 'Yet to be supplied',
                ]);

                return redirect('/auth/google/'.$user->id.'/password');//redirect to chnge pssword page
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


    public function selectFacebookPassword($facebook_id){
        return view('admin/select_facebook_password', ['facebook_id' => $facebook_id]);
    }


    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $googleUser = User::where('facebook_id', $user->id)->first(); //Check for google users
            $existingUser = User::where('email', $user->email)->first(); //Check for existing users

            if ($googleUser || $existingUser) {
                session()->flash('message', 'You already have an with us.');
                return redirect()->intended('dashboard');
            } else {

                //If not found the register
                $newUser = User::create([
                    'name'        => $user->name,
                    'email'       => $user->email,
                    'facebook_id' => $user->id,
                    'password'    => bcrypt('12345dummy')
                ]);
                $newUser->attachRole('administrator');
                $newAccount =  User::where('facebook_id', $user->id)->first();


                UserDetail::create([
                    'user_id'       => $newAccount->id,
                    'firstname'     => 'Yet to be supplied',
                    'lastname'      => 'Yet to be supplied',
                    'date_of_birth' => 'Yet to be supplied',
                    'email'         => 'Yet to be supplied',
                    'phone'         => 'Yet to be supplied',
                    'address'       => 'Yet to be supplied',
                    'city'          => 'Yet to be supplied',
                    'state'         => 'Yet to be supplied',
                    'zipcode'       => 'Yet to be supplied',
                    'country'       => 'Yet to be supplied',
                    'about'         => 'Yet to be supplied',
                ]);

                return redirect('/auth/facebook/'.$user->id.'/password');//redirect to chnge pssword page
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function register(){
        return view('admin/register');
    }

}
