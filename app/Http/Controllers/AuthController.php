<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function showRegisterForm() {
        $roles = Role::all();
        return view('auth.register', ['roles' => $roles]);
    }

    public function register(RegisterRequest $request) {
        $request->validated();

        User::create([
            'fullname' => $request->input('fullname'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'level' => 1,
            'role_id' => $request->input('role'),
            'picture_path' => 'null'
        ]);

        return redirect()->route('home')->with('success', 'You have been registered succesfully!');
    }
}
