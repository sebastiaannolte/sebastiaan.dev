<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('admin.pages.profile', [
            'user' => $user
        ]);
    }

    public function showChangePassword()
    {
        $user = Auth::user();
        return view('auth.passwords.change', [
            'user' => $user
        ]);
    }

    public function changePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'new_password' => 'required|min:5|passwordNotSame',
            'confirm_password' => 'required|min:5|max:20|same:new_password',
        ]);
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect('/profile');
    }

    public function saveProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
        ]);

        $user->password = bcrypt($request->password);

        $user->save();

        return back()->with('success', 'Updated Succesfully!');
    }
}
