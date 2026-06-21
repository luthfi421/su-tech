<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jamaah;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class JamaahController extends Controller
{
    /**
     * Daftar seluruh jamaah.
     */
    public function index(Request $request)
    {
        $search = $request->query('q', '');

        $query = Jamaah::with('pendaftarans.paketUmrah');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('telepon', 'like', "%{$search}%")
                    ->orWhere('nik', 'like', "%{$search}%");
            });
        }

        $jamaah = $query->orderByDesc('created_at')->paginate(12);

        return view('admin.jamaah', [
            'jamaah' => $jamaah,
            'totalJamaah' => Jamaah::count(),
            'belumVerifikasi' => Jamaah::where('status_verifikasi', 'belum')->count(),
            'search' => $search,
        ]);
    }

    /**
     * Detail satu jamaah.
     */
    public function show($id)
    {
        $jamaah = Jamaah::with(['pendaftarans.paketUmrah', 'pendaftarans.pembayaranTerakhir', 'user'])
            ->findOrFail($id);

        $pendaftaran = $jamaah->pendaftarans->last();
        $paket = $pendaftaran?->paketUmrah;
        $pembayaran = $pendaftaran?->pembayaranTerakhir;

        return view('admin.jamaah-detail', [
            'jamaah' => $jamaah,
            'pendaftaran' => $pendaftaran,
            'paket' => $paket,
            'pembayaran' => $pembayaran,
        ]);
    }

    /**
     * Toggle status verifikasi jamaah.
     */
    public function verify(Request $request, $id)
    {
        $jamaah = Jamaah::findOrFail($id);

        $request->validate([
            'status_verifikasi' => ['required', 'in:belum,terverifikasi,ditolak'],
        ]);

        $jamaah->update(['status_verifikasi' => $request->status_verifikasi]);

        return back()->with('success', 'Status verifikasi jamaah berhasil diperbarui.');
    }

    /**
     * Update data jamaah.
     */
    public function update(Request $request, $id)
    {
        $jamaah = Jamaah::findOrFail($id);

        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email'],
            'telepon' => ['nullable', 'string', 'max:20'],
            'nik' => ['nullable', 'string', 'max:32'],
            'tempat_lahir' => ['nullable', 'string', 'max:100'],
            'tanggal_lahir' => ['nullable', 'date'],
            'jenis_kelamin' => ['nullable', 'in:laki-laki,perempuan'],
            'pasport' => ['nullable', 'string', 'max:50'],
            'alamat' => ['nullable', 'string'],
        ]);

        $jamaah->update($validated);

        return back()->with('success', 'Data jamaah berhasil diperbarui.');
    }

    /**
     * Halaman daftar jamaah yang belum terverifikasi.
     */
    public function belumVerifikasi(Request $request)
    {
        $search = $request->query('q', '');

        $query = Jamaah::with('pendaftarans.paketUmrah')
            ->where('status_verifikasi', 'belum');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('telepon', 'like', "%{$search}%");
            });
        }

        $jamaah = $query->orderByDesc('created_at')->paginate(12);

        return view('admin.belum-verifikasi', [
            'jamaah' => $jamaah,
            'totalJamaah' => Jamaah::count(),
            'belumVerifikasi' => Jamaah::where('status_verifikasi', 'belum')->count(),
            'search' => $search,
        ]);
    }

    /**
     * Hapus jamaah.
     */
    public function destroy($id)
    {
        $jamaah = Jamaah::findOrFail($id);
        $jamaah->delete();

        return redirect()->route('admin.jamaah')
            ->with('success', 'Jamaah berhasil dihapus.');
    }
}
