<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $remember_me = $request->has('remember_me');
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials, $remember_me)) {
            return redirect()->route('home')->with('success', 'Succesfully logged in');
        }

        return redirect()->back()->with('failed', 'Wrong combination of username and password');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
