<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
    $request->validate([
        'email' => 'required|email'
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->with('error', 'Email tidak ditemukan');
    }

    // OTP sementara
    $otp = rand(1000, 9999);

    // Simpan ke session
    session([
        'otp' => $otp,
        'email' => $request->email
    ]);

    // Untuk testing
    return redirect()->route('verify.otp')
                     ->with('success', 'Kode OTP: ' . $otp);
    }
}