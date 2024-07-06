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
        // Definisikan $userRole di luar blok try-catch
        $userRole = null;

        try {
            $googleUser = Socialite::driver('google')->user();
            $user = User::where('google_id', $googleUser->getId())->first();

            if (!$user) {
                $newUser = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'role' => 'user', // Sesuaikan role default jika dibutuhkan
                ]);

                Auth::login($newUser);
                $user = $newUser;
                Log::info('New user created and logged in.', ['user' => $newUser]);
            } else {
                Auth::login($user);
                Log::info('Existing user logged in.', ['user' => $user]);
            }

            // Pastikan role pengguna diakses setelah login berhasil
            $userRole = Auth::user()->role;
            Log::info('User role after login.', ['role' => $userRole]);

            // Redirect berdasarkan role pengguna
            if ($userRole === 'admin') {
                return redirect()->route('dashboard_user.index'); // Sesuaikan dengan nama rute untuk dashboard admin
            } else {
                return redirect()->route('user.index');
            }
        } catch (\Throwable $th) {
            Log::error('Error during Google callback.', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(), // Sertakan trace untuk debug lebih lanjut
                'userRole' => $userRole, // Tambahkan userRole ke log untuk membantu debug
            ]);

            // Cek jika kesalahan terjadi karena role admin
            if ($userRole === 'admin') {
                // Redirect sesuai kebutuhan untuk admin
                return redirect()->route('dashboard_user.index')->withErrors('Terjadi kesalahan saat proses callback.');
            } else {
                // Redirect untuk pengguna non-admin
                return redirect()->route('index')->withErrors('Terjadi kesalahan. Silakan coba lagi nanti.');
            }
        }
    }
}
