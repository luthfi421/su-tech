<?php

namespace App\Http\Controllers\Jamaah;

use App\Http\Controllers\Controller;
use App\Models\Jamaah;
use App\Models\PaketUmrah;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Dashboard utama jamaah.
     */
    public function index()
    {
        $user = Auth::user();
        $jamaah = $user->jamaah;

        // Ambil pendaftaran aktif jamaah (jika ada).
        $pendaftaranAktif = $jamaah
            ? $jamaah->pendaftarans()->with('paketUmrah', 'pembayaranTerakhir')->latest()->first()
            : null;

        // Paket tersedia untuk dipilih.
        $pakets = PaketUmrah::where('status', 'aktif')->orderBy('harga')->get();

        // Riwayat pendaftaran.
        $riwayat = $jamaah
            ? $jamaah->pendaftarans()->with('paketUmrah', 'pembayaranTerakhir')->latest()->take(5)->get()
            : collect();

        return view('dashboard', [
            'user' => $user,
            'jamaah' => $jamaah,
            'pendaftaranAktif' => $pendaftaranAktif,
            'pakets' => $pakets,
            'riwayat' => $riwayat,
        ]);
    }
}
