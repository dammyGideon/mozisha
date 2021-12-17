<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    //The settings page
    public function settings(){
        return view('admin/settings');
    }
}
