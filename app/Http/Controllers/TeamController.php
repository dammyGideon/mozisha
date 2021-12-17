<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Social;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    private $social;
    private $setting;


    public function __construct()
    {
        // $this->middleware('auth');
        $this->social = Social::latest()->first(); //fetches the last record
        $this->setting = Setting::latest()->first(); //fetches the last record

    }


    public function newMember(){
        return view('admin/new_team_member');
    }

    public function list(){
        return view('admin/team_list');
    }

    public function edit($id){
       $team =  Team::find($id);
        return view('admin/edit_team', ['team' => $team]);
    }
}
