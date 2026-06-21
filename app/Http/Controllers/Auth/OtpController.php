<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    /**
     * Verifikasi kode OTP yang dimasukkan user.
     */
    public function verify(Request $request)
    {
        $request->validate([
            'otp1' => ['required', 'string', 'size:1'],
            'otp2' => ['required', 'string', 'size:1'],
            'otp3' => ['required', 'string', 'size:1'],
            'otp4' => ['required', 'string', 'size:1'],
        ]);

        // Cek session OTP masih ada dan belum kedaluwarsa.
        $otpSession = session('otp');
        $expiresAt = session('otp_expires_at');

        if (! $otpSession || ! $expiresAt || now()->timestamp > $expiresAt) {
            return back()->with('error', 'Kode OTP telah kedaluwarsa. Silakan minta kode baru.');
        }

        $otpInput = $request->otp1 . $request->otp2 . $request->otp3 . $request->otp4;

        // Gunakan perbandingan ketat tipe string.
        if (hash_equals((string) $otpSession, (string) $otpInput)) {
            session(['otp_verified' => true]);

            return redirect()->route('new-password');
        }

        return back()->with('error', 'Kode OTP salah. Silakan coba lagi.');
    }
}
