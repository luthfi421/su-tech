<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaketUmrah;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Daftar seluruh paket umrah.
     */
    public function index(Request $request)
    {
        $search = $request->query('q', '');

        $query = PaketUmrah::query();

        if ($search) {
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('tipe', 'like', "%{$search}%");
        }

        $pakets = $query->orderByDesc('created_at')->paginate(12);

        return view('admin.paket', [
            'pakets' => $pakets,
            'search' => $search,
        ]);
    }

    /**
     * Simpan paket baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tipe' => ['required', 'in:reguler,plus,vip'],
            'deskripsi' => ['nullable', 'string'],
            'harga' => ['required', 'numeric', 'min:0'],
            'durasi' => ['required', 'integer', 'min:1'],
            'hotel' => ['nullable', 'string', 'max:255'],
            'maskapai' => ['nullable', 'string', 'max:255'],
            'tanggal_berangkat' => ['nullable', 'string'],
            'lokasi_keberangkatan' => ['nullable', 'string'],
            'status' => ['required', 'in:aktif,nonaktif'],
            'fasilitas' => ['nullable', 'string'],
            'itinerary' => ['nullable', 'string'],
        ]);

        // Parse fasilitas & itinerary dari textarea (baris baru) ke array.
        if (! empty($validated['fasilitas'])) {
            $validated['fasilitas'] = array_values(array_filter(
                array_map('trim', explode("\n", $validated['fasilitas']))
            ));
        }
        if (! empty($validated['itinerary'])) {
            $lines = array_filter(array_map('trim', explode("\n", $validated['itinerary'])));
            $itinerary = [];
            foreach ($lines as $i => $line) {
                $parts = array_pad(explode('|', $line, 3), 3, '');
                $itinerary[] = [
                    'day' => trim($parts[0]) ?: ('Hari ' . ($i + 1)),
                    'title' => trim($parts[1]),
                    'desc' => trim($parts[2]),
                ];
            }
            $validated['itinerary'] = $itinerary;
        }

        PaketUmrah::create($validated);

        return redirect()->route('admin.paket')
            ->with('success', 'Paket umrah berhasil ditambahkan.');
    }

    /**
     * Update paket.
     */
    public function update(Request $request, $id)
    {
        $paket = PaketUmrah::findOrFail($id);

        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tipe' => ['required', 'in:reguler,plus,vip'],
            'deskripsi' => ['nullable', 'string'],
            'harga' => ['required', 'numeric', 'min:0'],
            'durasi' => ['required', 'integer', 'min:1'],
            'hotel' => ['nullable', 'string', 'max:255'],
            'maskapai' => ['nullable', 'string', 'max:255'],
            'tanggal_berangkat' => ['nullable', 'string'],
            'lokasi_keberangkatan' => ['nullable', 'string'],
            'status' => ['required', 'in:aktif,nonaktif'],
            'fasilitas' => ['nullable', 'string'],
        ]);

        if (! empty($validated['fasilitas'])) {
            $validated['fasilitas'] = array_values(array_filter(
                array_map('trim', explode("\n", $validated['fasilitas']))
            ));
        } else {
            $validated['fasilitas'] = null;
        }

        $paket->update($validated);

        return back()->with('success', 'Paket umrah berhasil diperbarui.');
    }

    /**
     * Hapus paket.
     */
    public function destroy($id)
    {
        $paket = PaketUmrah::findOrFail($id);
        $paket->delete();

        return redirect()->route('admin.paket')
            ->with('success', 'Paket umrah berhasil dihapus.');
    }
}
