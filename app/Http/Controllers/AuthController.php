<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Perbaikan penulisan fasad Auth
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function register()
    {
        return view('auth.register'); // Perbaikan penulisan view
    }

    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ])->validate();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'Admin',
        ]);

        return redirect()->route('login');
    }

    public function login()
    {
        return view('auth.login'); // Perbaikan penulisan view
    }

    public function login_auth(Request $request) // Perbaikan penamaan metode
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ])->validate();

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages(['email' => trans('auth.failed')]);
        }

        $request->session()->regenerate();

        return redirect()->route('dash');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Perbaikan pemanggilan metode logout

        $request->session()->invalidate();

        return redirect('/');
    }

    public function profile()
    {
        return view('profile');
    }

    public function dash()
    {
        return view('auth.dash');
    }
}
