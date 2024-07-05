<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = User::where('google_id', $googleUser->getId())->first();

            if (!$user) {
                $newUser = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'role' => 'user',
                ]);

                Auth::login($newUser);
                $user = $newUser;
                Log::info('New user created and logged in.', ['user' => $newUser]);
            } else {
                Auth::login($user);
                Log::info('Existing user logged in.', ['user' => $user]);
            }

            Log::info('User role after login.', ['role' => Auth::user()->role]);

            if (Auth::user()->role === 'admin') {
                return redirect()->route('dash');
            } else {
                return redirect()->route('user.index');
            }
        } catch (\Throwable $th) {
            Log::error('Error during Google callback.', ['error' => $th->getMessage()]);

            return redirect()->route('index')->withErrors('Terjadi kesalahan. Silakan coba lagi nanti.');
        }
    }
}
