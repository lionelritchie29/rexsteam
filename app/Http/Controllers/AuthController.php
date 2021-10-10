<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function register() {
        $roles = Role::all();
        return view('auth.register', ['roles' => $roles]);
    }
}
