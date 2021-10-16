<?php

namespace App\Http\Controllers;

use App\Http\Requests\PutProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    public function profile() {
        return view('manage.user.profile');
    }

    public function updateProfile(PutProfileRequest $request) {
        $user = User::find($request->input('user_id'));

        if (!Hash::check($request->input('confirm_password'), $user->password)) {
            return redirect()->back()->with('failed', 'Wrong password!');
        }

        $user->fullname = $request->input('full_name');

        if ($request->input('new_password') != null) {
            if ($request->input('new_password') != $request->input('confirm_new_password')) {
                return redirect()->back()->with('failed', 'Confirm new password is not the same as your new password');
            }

            $user->password = Hash::make($request->input('new_password'));
        }

        if ($request->has('profile_picture')) {
            $image_path = $request->file('profile_picture')->store('public/images/users');
            $user->picture_path = str_replace('public/', "", $image_path);
        }

        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
