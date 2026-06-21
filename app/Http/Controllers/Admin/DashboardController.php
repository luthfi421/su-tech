<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jamaah;
use App\Models\PaketUmrah;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Halaman dashboard utama admin.
     */
    public function index()
    {
        $totalJamaah = Jamaah::count();
        $paketAktif = PaketUmrah::where('status', 'aktif')->count();
        $belumVerifikasi = Jamaah::where('status_verifikasi', 'belum')->count();
        $sudahVerifikasi = Jamaah::where('status_verifikasi', 'terverifikasi')->count();
        $pendapatan = Pembayaran::where('status', 'terverifikasi')->sum('total');
        $pendaftaranPending = Pendaftaran::where('status', 'pending')->count();

        $recentJamaah = Jamaah::with('pendaftarans.paketUmrah', 'user')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('admin.dashboard', [
            'totalJamaah' => $totalJamaah,
            'paketAktif' => $paketAktif,
            'belumVerifikasi' => $belumVerifikasi,
            'sudahVerifikasi' => $sudahVerifikasi,
            'pendapatan' => $pendapatan,
            'pendaftaranPending' => $pendaftaranPending,
            'recentJamaah' => $recentJamaah,
        ]);
    }

    /**
     * Pencarian jamaah dari dashboard.
     */
    public function search(Request $request)
    {
        $search = $request->query('q', '');

        $query = Jamaah::with('pendaftarans.paketUmrah', 'user');

        if ($search) {
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('telepon', 'like', "%{$search}%");
        }

        $recentJamaah = $query->orderByDesc('created_at')->paginate(10);

        return view('admin.dashboard', [
            'totalJamaah' => Jamaah::count(),
            'paketAktif' => PaketUmrah::where('status', 'aktif')->count(),
            'belumVerifikasi' => Jamaah::where('status_verifikasi', 'belum')->count(),
            'sudahVerifikasi' => Jamaah::where('status_verifikasi', 'terverifikasi')->count(),
            'pendapatan' => Pembayaran::where('status', 'terverifikasi')->sum('total'),
            'pendaftaranPending' => Pendaftaran::where('status', 'pending')->count(),
            'recentJamaah' => $recentJamaah,
            'search' => $search,
        ]);
    }
}
