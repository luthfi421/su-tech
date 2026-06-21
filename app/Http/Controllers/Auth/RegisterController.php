<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Jamaah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Tampilkan halaman registrasi.
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Simpan user & data jamaah baru.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
            'role' => 'jamaah',
        ]);

        // Buat record jamaah terkait user baru.
        Jamaah::create([
            'user_id' => $user->id,
            'nama' => $user->name,
            'email' => $user->email,
            'telepon' => $user->phone,
            'status_verifikasi' => 'belum',
        ]);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil. Silakan login dengan akun Anda.');
    }
}
