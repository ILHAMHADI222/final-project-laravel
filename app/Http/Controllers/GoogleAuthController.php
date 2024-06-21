<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
                ]);

                Auth::login($newUser);
            } else {
                Auth::login($user);
            }

            return redirect()->route('dash'); // Redirect to the dashboard
        } catch (\Throwable $th) {
            return redirect()->route('login')->withErrors('Something went wrong! '.$th->getMessage());
        }
    }
}
