@extends('layouts.admin')

@section('title', 'Kelola Paket Umrah')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; flex-wrap: wrap; gap: 16px;">
        <div>
            <h1 style="font-size: 1.5rem; font-weight: 700; margin: 0;">Kelola Paket Umrah</h1>
            <p style="color: #7d8d83; margin: 4px 0 0;">Tambah, ubah, atau hapus paket umrah</p>
        </div>
        <button type="button" class="btn btn-sm-green" data-bs-toggle="modal" data-bs-target="#tambahPaketModal"><i class="fas fa-plus"></i> Tambah Paket</button>
    </div>

    <div class="data-card">
        <form method="GET" action="{{ route('admin.paket') }}" class="d-flex gap-2 mb-3" style="max-width: 400px;">
            <input type="text" name="q" class="form-control" placeholder="Cari nama atau tipe paket..." value="{{ $search ?? '' }}">
            <button type="submit" class="btn btn-sm-green"><i class="fas fa-search"></i></button>
            @if($search)<a href="{{ route('admin.paket') }}" class="btn btn-outline-secondary">Reset</a>@endif
        </form>

        <div class="row g-4">
            @forelse($pakets as $paket)
                <div class="col-md-6 col-lg-4">
                    <div style="background: #fff; border: 1px solid #e8eee9; border-radius: 16px; overflow: hidden; height: 100%; display: flex; flex-direction: column;">
                        <div style="background: linear-gradient(135deg, #0c8a63, #087554); padding: 20px; color: #fff;">
                            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                <div>
                                    <strong style="font-size: 1.05rem;">{{ $paket->nama }}</strong>
                                    <div style="font-size: 0.8rem; opacity: 0.9;">{{ $paket->tipe_label }} &middot; {{ $paket->durasi_text }}</div>
                                </div>
                                <span style="background: rgba(255,255,255,0.25); padding: 3px 10px; border-radius: 999px; font-size: 0.75rem;">{{ ucfirst($paket->status) }}</span>
                            </div>
                            <div style="font-size: 1.4rem; font-weight: 700; margin-top: 8px;">Rp {{ number_format($paket->harga, 0, ',', '.') }}</div>
                        </div>
                        <div style="padding: 16px; flex: 1; display: flex; flex-direction: column;">
                            @if($paket->deskripsi)<p style="font-size: 0.85rem; color: #7d8d83; margin-bottom: 12px; flex: 1;">{{ \Illuminate\Support\Str::limit($paket->deskripsi, 100) }}</p>@endif
                            <div style="font-size: 0.8rem; color: #5c7264; margin-bottom: 12px;">
                                @if($paket->hotel)<div><i class="fas fa-hotel text-success"></i> {{ $paket->hotel }}</div>@endif
                                @if($paket->maskapai)<div><i class="fas fa-plane text-success"></i> {{ $paket->maskapai }}</div>@endif
                            </div>
                            <div style="display: flex; gap: 8px; margin-top: auto;">
                                <button type="button" class="btn btn-outline-success btn-sm flex-fill" data-bs-toggle="modal" data-bs-target="#editPaketModal-{{ $paket->id }}"><i class="fas fa-edit"></i> Edit</button>
                                <form action="{{ route('admin.paket.destroy', $paket->id) }}" method="POST" onsubmit="return confirm('Hapus paket {{ $paket->nama }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editPaketModal-{{ $paket->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Paket: {{ $paket->nama }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ route('admin.paket.update', $paket->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="row g-3">
                                        <div class="col-md-6"><label class="form-label fw-bold">Nama Paket</label><input type="text" name="nama" class="form-control" value="{{ $paket->nama }}" required></div>
                                        <div class="col-md-3"><label class="form-label fw-bold">Tipe</label><select name="tipe" class="form-select"><option value="reguler" {{ $paket->tipe === 'reguler' ? 'selected' : '' }}>Reguler</option><option value="plus" {{ $paket->tipe === 'plus' ? 'selected' : '' }}>Plus</option><option value="vip" {{ $paket->tipe === 'vip' ? 'selected' : '' }}>VIP</option></select></div>
                                        <div class="col-md-3"><label class="form-label fw-bold">Status</label><select name="status" class="form-select"><option value="aktif" {{ $paket->status === 'aktif' ? 'selected' : '' }}>Aktif</option><option value="nonaktif" {{ $paket->status === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option></select></div>
                                        <div class="col-md-4"><label class="form-label fw-bold">Harga (Rp)</label><input type="number" name="harga" class="form-control" value="{{ $paket->harga }}" required></div>
                                        <div class="col-md-4"><label class="form-label fw-bold">Durasi (hari)</label><input type="number" name="durasi" class="form-control" value="{{ $paket->durasi }}" required></div>
                                        <div class="col-md-4"><label class="form-label fw-bold">Tanggal Berangkat</label><input type="text" name="tanggal_berangkat" class="form-control" value="{{ $paket->tanggal_berangkat }}"></div>
                                        <div class="col-md-6"><label class="form-label fw-bold">Hotel</label><input type="text" name="hotel" class="form-control" value="{{ $paket->hotel }}"></div>
                                        <div class="col-md-6"><label class="form-label fw-bold">Maskapai</label><input type="text" name="maskapai" class="form-control" value="{{ $paket->maskapai }}"></div>
                                        <div class="col-md-6"><label class="form-label fw-bold">Lokasi Keberangkatan</label><input type="text" name="lokasi_keberangkatan" class="form-control" value="{{ $paket->lokasi_keberangkatan }}"></div>
                                        <div class="col-12"><label class="form-label fw-bold">Deskripsi</label><textarea name="deskripsi" rows="2" class="form-control">{{ $paket->deskripsi }}</textarea></div>
                                        <div class="col-12"><label class="form-label fw-bold">Fasilitas <small class="text-muted">(1 per baris)</small></label><textarea name="fasilitas" rows="4" class="form-control">@foreach(($paket->fasilitas ?? []) as $f){{ $f }}&#10;@endforeach</textarea></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-sm-green"><i class="fas fa-save"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12" style="text-align: center; padding: 60px; color: #7d8d83;">
                    <i class="fas fa-box-open" style="font-size: 2.5rem; opacity: 0.4; margin-bottom: 12px;"></i>
                    <p>Belum ada paket umrah. Klik "Tambah Paket" untuk membuat.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $pakets->links() }}
        </div>
    </div>

    <!-- Tambah Modal -->
    <div class="modal fade" id="tambahPaketModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Paket Umrah Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.paket.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6"><label class="form-label fw-bold">Nama Paket</label><input type="text" name="nama" class="form-control" required></div>
                            <div class="col-md-3"><label class="form-label fw-bold">Tipe</label><select name="tipe" class="form-select"><option value="reguler">Reguler</option><option value="plus">Plus</option><option value="vip">VIP</option></select></div>
                            <div class="col-md-3"><label class="form-label fw-bold">Status</label><select name="status" class="form-select"><option value="aktif">Aktif</option><option value="nonaktif">Nonaktif</option></select></div>
                            <div class="col-md-4"><label class="form-label fw-bold">Harga (Rp)</label><input type="number" name="harga" class="form-control" required></div>
                            <div class="col-md-4"><label class="form-label fw-bold">Durasi (hari)</label><input type="number" name="durasi" class="form-control" value="9" required></div>
                            <div class="col-md-4"><label class="form-label fw-bold">Tanggal Berangkat</label><input type="text" name="tanggal_berangkat" class="form-control" placeholder="contoh: 15 Juni 2027"></div>
                            <div class="col-md-6"><label class="form-label fw-bold">Hotel</label><input type="text" name="hotel" class="form-control" placeholder="contoh: Bintang 4"></div>
                            <div class="col-md-6"><label class="form-label fw-bold">Maskapai</label><input type="text" name="maskapai" class="form-control" placeholder="contoh: Garuda Indonesia"></div>
                            <div class="col-md-6"><label class="form-label fw-bold">Lokasi Keberangkatan</label><input type="text" name="lokasi_keberangkatan" class="form-control" value="Jakarta"></div>
                            <div class="col-12"><label class="form-label fw-bold">Deskripsi</label><textarea name="deskripsi" rows="2" class="form-control"></textarea></div>
                            <div class="col-12"><label class="form-label fw-bold">Fasilitas <small class="text-muted">(1 per baris)</small></label><textarea name="fasilitas" rows="4" class="form-control" placeholder="Visa Umrah&#10;Makan &amp; Minum&#10;Transportasi"></textarea></div>
                            <div class="col-12"><label class="form-label fw-bold">Itinerary <small class="text-muted">(format: Hari|Judul|Deskripsi, 1 per baris)</small></label><textarea name="itinerary" rows="4" class="form-control" placeholder="Hari 1|Berangkat|Kumpul di bandara&#10;Hari 2|Tiba di Jeddah|Perjalanan ke Makkah"></textarea></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm-green"><i class="fas fa-plus"></i> Tambah Paket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
