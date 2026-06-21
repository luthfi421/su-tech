<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Daftar seluruh pembayaran.
     */
    public function index(Request $request)
    {
        $search = $request->query('q', '');
        $status = $request->query('status', '');

        $query = Pembayaran::with(['pendaftaran.jamaah', 'pendaftaran.paketUmrah']);

        if ($status && in_array($status, ['menunggu', 'terverifikasi', 'ditolak'])) {
            $query->where('status', $status);
        }

        if ($search) {
            $query->whereHas('pendaftaran.jamaah', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $pembayarans = $query->orderByDesc('created_at')->paginate(12);

        $totalVerified = Pembayaran::where('status', 'terverifikasi')->sum('total');
        $totalPending = Pembayaran::where('status', 'menunggu')->count();

        return view('admin.pembayaran', [
            'pembayarans' => $pembayarans,
            'totalVerified' => $totalVerified,
            'totalPending' => $totalPending,
            'search' => $search,
            'status' => $status,
        ]);
    }

    /**
     * Ubah status verifikasi pembayaran.
     */
    public function updateStatus(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $request->validate([
            'status' => ['required', 'in:menunggu,terverifikasi,ditolak'],
        ]);

        $pembayaran->update(['status' => $request->status]);

        // Sinkronisasi: jika pembayaran terverifikasi, update status pendaftaran.
        if ($request->status === 'terverifikasi' && $pembayaran->pendaftaran) {
            $pembayaran->pendaftaran->update(['status' => 'aktif']);

            // Update status verifikasi jamaah juga.
            if ($pembayaran->pendaftaran->jamaah) {
                $pembayaran->pendaftaran->jamaah->update(['status_verifikasi' => 'terverifikasi']);
            }
        }

        return back()->with('success', 'Status pembayaran berhasil diperbarui.');
    }
}
