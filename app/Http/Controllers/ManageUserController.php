<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    public function profile() {
        return view('manage.user.profile');
    }
}
