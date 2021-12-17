<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BroadcastController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //To create a new broadcast mail.
    public function create()
    {
        return view('admin/new_broadcast');
    }

}
