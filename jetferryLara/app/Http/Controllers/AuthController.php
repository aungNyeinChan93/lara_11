<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Summary of registerPage
     * @return \Illuminate\Contracts\View\View
     */
    public function registerPage()
    {
        return view('auth.register');
    }

    /**
     * Summary of register
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $fields = $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed",
            "password_confirmation" => "required",
        ]);

        $user = User::create($fields);

        return to_route("login");
    }

    /**
     * Summary of loginPage
     * @return \Illuminate\Contracts\View\View
     */
    public function loginPage()
    {
        return view("auth.login");
    }

    /**
     * Summary of login
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // dd($request->all());
        $fields = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($fields)) {
            $request->session()->regenerate();
            return to_route('customers.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    //
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('login');
    }
}
