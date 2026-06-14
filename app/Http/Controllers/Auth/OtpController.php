<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function verify(Request $request)
    {
        $otpInput =
            $request->otp1 .
            $request->otp2 .
            $request->otp3 .
            $request->otp4;

        if ($otpInput == session('otp')) {

            session([
                'otp_verified' => true
            ]);

            return redirect('/new-password');
        }

        return back()->with('error', 'Kode OTP salah');
    }
}