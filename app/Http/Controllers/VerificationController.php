<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /**
     * Show the email verification notice.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('auth.verify-email');
    }

    /**
     * Handle the email verification.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        $user = $request->user();

        // Redirect based on user role after email verification
        if ($user->role === 'admin') {
            return redirect()->route('dash')->with('success', 'Email berhasil diverifikasi!');
        } else {
            return redirect()->route('user.index')->with('success', 'Email berhasil diverifikasi!');
        }
    }

    /**
     * Resend the email verification notification.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'Link verifikasi email telah dikirim ulang.');
    }
}
