<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Auth\Entities\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function login()
    {
        return view('auth::login');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('auth::admin.profile', [
            'user' => $user
        ]);
    }

    public function showChangePassword()
    {
        $user = Auth::user();
        return view('auth::admin.password.change', [
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

        return redirect('/admin/profile');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return back()->with('success', 'Updated Succesfully!');
    }
}
