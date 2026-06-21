<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Daftar seluruh pendaftaran.
     */
    public function index(Request $request)
    {
        $search = $request->query('q', '');
        $status = $request->query('status', '');

        $query = Pendaftaran::with(['jamaah', 'paketUmrah', 'pembayaranTerakhir']);

        if ($search) {
            $query->whereHas('jamaah', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($status && in_array($status, ['draft', 'pending', 'aktif', 'selesai', 'batal'])) {
            $query->where('status', $status);
        }

        $pendaftarans = $query->orderByDesc('tanggal_pendaftaran')->paginate(12);

        return view('admin.pendaftaran', [
            'pendaftarans' => $pendaftarans,
            'search' => $search,
            'status' => $status,
        ]);
    }

    /**
     * Ubah status pendaftaran.
     */
    public function updateStatus(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        $request->validate([
            'status' => ['required', 'in:draft,pending,aktif,selesai,batal'],
        ]);

        $pendaftaran->update(['status' => $request->status]);

        return back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }
}
