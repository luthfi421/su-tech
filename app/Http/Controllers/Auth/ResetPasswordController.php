<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class ResetPasswordController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed'
        ]);

        $user = User::where(
            'email',
            session('email')
        )->first();

        $user->password = Hash::make(
            $request->password
        );

        $user->save();

        session()->forget([
            'otp',
            'email',
            'otp_verified'
        ]);

        return redirect('/login')
            ->with(
                'success',
                'Password berhasil diperbarui'
            );
    }
}