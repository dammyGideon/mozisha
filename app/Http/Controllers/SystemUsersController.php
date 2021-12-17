<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SystemUsersController extends Controller
{
    /*
     * Generates the list of all apprentices
     */
    public function apprentices()
    {
        return view('admin/apprentices_list');
    }

    /*
     * Generates the list of all mentors
     */
    public function mentors()
    {
        return view('admin/mentors_list');
    }

    /*
     * Generates the list of all admins
     */
    public function admins()
    {
        return view('admin/admins_list');
    }

    public function membersView($id)
    {
        $user = User::findOrFail($id);
        return view('admin/members_view', ['user' => $user]);
    }

    public function mentorsView($id)
    {
        $user = User::findOrFail($id);
        return view('admin/mentors_view', ['user' => $user]);
    }

    public function adminsView($id)
    {
        $user = User::findOrFail($id);
        return view('admin/admins_view', ['user' => $user]);
    }
}
