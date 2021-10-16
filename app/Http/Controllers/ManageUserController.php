<?php

namespace App\Http\Controllers;

use App\Http\Requests\PutProfileRequest;
use App\Models\FriendRequest;
use App\Models\TransactionHeader;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function friends() {
        $user_id = Auth::user()->id;
        $incoming_requests = FriendRequest::where('target_user_id', $user_id)->where('status', 'pending')->get();
        $pending_requests = FriendRequest::where('sender_user_id', $user_id)->where('status', 'pending')->get();
        $friends = FriendRequest::where(function ($query) {
            $query->where('target_user_id', Auth::user()->id)->orWhere('sender_user_id', Auth::user()->id);
        })->where('status', 'accepted')->get();

        return view('manage.user.friends')
            ->with('incoming_requests', $incoming_requests)
            ->with('pending_requests', $pending_requests)
            ->with('friends', $friends);
    }

    public function addFriend(Request $request) {
        $request->validate([
            'username' => 'required',
        ]);

        $sender_id = $request->input('sender_user_id');
        $target_user = User::where('username', $request->input('username'))->first();

        if ($target_user == null) {
            return redirect()->back()
                ->with('failed', 'Username ' . $request->input('username') . ' does not exist!');
        }

        $friend_list = FriendRequest::where(function ($query) use ($sender_id, $target_user) {
            $query->where('sender_user_id', $sender_id)->where('target_user_id', $target_user->id);
        })->orWhere(function ($query) use ($sender_id, $target_user) {
            $query->where('sender_user_id', $target_user->id)->where('target_user_id', $sender_id);
        })->get();

        if (count($friend_list) > 0) {
            return redirect()->back()
                ->with('failed', $target_user->fullname . ' is already in incoming friend requests, pending friend requests, or is already your friend!');
        }

        FriendRequest::create([
            'sender_user_id' => $sender_id,
            'target_user_id' => $target_user->id,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Successfully sent friend request to ' . $target_user->fullname . ' (' . $target_user->username . ')');
    }

    public function acceptFriendRequest(Request $request) {
        FriendRequest::where('sender_user_id', $request->input('sender_user_id'))
            ->where('target_user_id', $request->input('target_user_id'))
            ->update(['status' => 'accepted']);

        return redirect()->back()->with('success', 'Successfully accepted friend request!');
    }

    public function rejectFriendRequest(Request $request) {
        FriendRequest::where('sender_user_id', $request->input('sender_user_id'))
            ->where('target_user_id', $request->input('target_user_id'))
            ->delete();

        return redirect()->back()->with('success', 'Successfully rejected friend request!');
    }

    public function cancelFriendRequest(Request $request) {
        FriendRequest::where('sender_user_id', $request->input('sender_user_id'))
            ->where('target_user_id', $request->input('target_user_id'))
            ->delete();

        return redirect()->back()->with('success', 'Successfully canceled friend request!');
    }

    public function transactionHistory() {
        $transactions = TransactionHeader::where('user_id', Auth::user()->id)->get();
        return view('manage.user.transaction-history')->with('transactions', $transactions);
    }
}
