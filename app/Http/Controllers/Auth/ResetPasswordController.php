<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /**
     * Perbarui password user setelah OTP terverifikasi.
     */
    public function update(Request $request)
    {
        // Pastikan flow OTP sudah dilewati.
        if (! session('otp_verified') || ! session('otp_email')) {
            return redirect()->route('forgot.password')
                ->with('error', 'Sesi tidak valid. Silakan ulangi proses reset password.');
        }

        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::where('email', session('otp_email'))->first();

        if (! $user) {
            return redirect()->route('forgot.password')
                ->with('error', 'User tidak ditemukan.');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // Bersihkan sesi reset password.
        session()->forget([
            'otp',
            'otp_email',
            'otp_expires_at',
            'otp_verified',
        ]);

        return redirect()->route('login')
            ->with('success', 'Password berhasil diperbarui. Silakan login.');
    }
}
