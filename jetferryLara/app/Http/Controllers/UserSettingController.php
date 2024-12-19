<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class UserSettingController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // dd();
        return view('test.users.setting.index');
    }

    // change
    public function change()
    {
        return view('test.users.setting.change');
    }

    /**
     * Summary of update
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {

        $request->validate([
            "oldPassword" => 'required',
            "password" => ["required", 'confirmed', Password::default()],
            "password_confirmation" => "required|same:password"
        ]);

        if (Hash::check($request->oldPassword, Auth::user()->password) && $request->oldPassword != $request->password) {
            Auth::user()->update([
                "password" => Hash::make($request->password)
            ]);
        } else {
            return back()->withErrors([
                'oldPassword' => 'Old password do not match !',
            ])->onlyInput('oldPassword');
        }

        return to_route('userSetting.index');



    }
}
