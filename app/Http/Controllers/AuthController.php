<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function user()
    {
        return view('user.dashboard'); // Pastikan Anda memiliki view untuk user
    }

    public function index()
    {
        return view('index');
    }

    public function forgot_password()
    {
        return view('auth.forgot-password');
    }

    public function forgot_password_act(Request $request)
    {
        $customMessage = [
            'email.required' => ' Peringatan!: Email tidak boleh kosong',
            'email.email' => 'Peringatan!: Email tidak valid',
            'email.exists' => 'Peringatan!: Mohon masukan email anda dengan benar',
        ];

        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], $customMessage);

        $token = \Str::random(60);

        PasswordReset::updateOrCreate(
            [
                'email' => $request->email,
            ],
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => now(),
            ]
        );

        Mail::to($request->email)->send(new ResetPasswordMail($token));

        return redirect()->route('forgot-password')->with('success', 'Kami telah mengirimkan link reset password ke email anda');
    }

    public function validasi_forgot_password_act(Request $request)
    {
        $customMessage = [
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 6 karakter',
        ];

        $request->validate([
            'password' => 'required|min:6',
        ], $customMessage);

        $token = PasswordReset::where('token', $request->token)->first();

        if (!$token) {
            return redirect()->route('login')->with('failed', 'Token tidak valid');
        }

        $user = User::where('email', $token->email)->first();

        if (!$user) {
            return redirect()->route('login')->with('failed', 'Email tidak terdaftar di database');
        }

        dd($user);

        $user->update([
            'password' => Hash::make($request->password),
            'password_changed_at' => now(),
        ]);

        $token->delete();

        // Langsung login user setelah password diresetS
        Auth::login($user);

        // Regenerasi sesi
        $request->session()->regenerate();

        return redirect()->route('user')->with('success', 'Password berhasil direset dan Anda telah login.');
    }

    public function validasi_forgot_password(Request $request, $token)
    {
        $getToken = PasswordReset::where('token', $token)->first();

        if (!$getToken) {
            return redirect()->route('login')->with('failed', 'Token tidak valid');
        }

        return view('auth.validasi-token', compact('token'));
    }

    public function register()
    {
        return view('auth.register'); // Perbaikan penulisan view
    }

    public function registerSave(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('verification.notice');
    }

    public function login()
    {
        return view('auth.login'); // Perbaikan penulisan view
    }

    public function login_auth(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Debugging kredensial
        Log::info('Kredensial: ', ['email' => $credentials['email'], 'password' => $credentials['password']]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Debugging peran pengguna
            $userRole = Auth::user()->role;
            Log::info('Peran Pengguna: ', ['role' => $userRole]);

            if ($userRole == 'admin') {
                return redirect()->route('dash');
            } else {
                return redirect()->route('user');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

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
