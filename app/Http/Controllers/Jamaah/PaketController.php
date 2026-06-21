<?php

namespace App\Http\Controllers\Jamaah;

use App\Http\Controllers\Controller;
use App\Models\PaketUmrah;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Tampilkan detail paket umrah.
     */
    public function show($id)
    {
        $paket = PaketUmrah::where('status', 'aktif')->findOrFail($id);
        $pakets = PaketUmrah::where('status', 'aktif')->orderBy('harga')->get();

        return view('paket-detail', [
            'paket' => $paket,
            'pakets' => $pakets,
        ]);
    }
}
