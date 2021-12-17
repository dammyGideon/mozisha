<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
   public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
   }

   public function handleGoogleCallback()
   {
       try {

           $user = Socialite::driver('google')->user();
           $findUser = User::where('google_id', $user->id)->first();

           if ($findUser) {
               Auth::login($findUser);
               return redirect()->intended('dashboard');
           } else {
               //If not found the register
               $newUser = User::create([
                   'name'       => $user->name,
                   'email'     => $user->email,
                   'google_id' => $user->id,
                   'password'  => bcrypt('12345dummy')
               ]);

               Auth::login($newUser);
               return redirect()->intended('dashboard');
           }
       } catch (Exception $e) {
           dd($e->getMessage());
       }
   }

}
