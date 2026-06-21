@extends('layouts.admin')

@section('title', 'Detail Jamaah')

@section('content')
    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.jamaah') }}" style="color: #0c8a63; text-decoration: none; font-weight: 600;">&larr; Kembali ke Daftar Jamaah</a>
    </div>

    <div style="background: #fff; border-radius: 20px; padding: 28px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); margin-bottom: 20px;">
        <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px; flex-wrap: wrap;">
            <div style="width: 64px; height: 64px; border-radius: 18px; background: #dff7ec; color: #0c8a63; display: grid; place-items: center; font-size: 1.5rem; font-weight: 700;">{{ $jamaah->inisial }}</div>
            <div style="flex: 1;">
                <h1 style="font-size: 1.5rem; font-weight: 700; margin: 0;">{{ $jamaah->nama }}</h1>
                <p style="color: #7d8d83; margin: 4px 0 0;">{{ $jamaah->email ?? '-' }}</p>
            </div>
            <div>
                @if($jamaah->status_verifikasi === 'terverifikasi')
                    <span class="badge-soft-green" style="font-size: 0.9rem;"><i class="fas fa-check-circle"></i> Terverifikasi</span>
                @elseif($jamaah->status_verifikasi === 'ditolak')
                    <span class="badge-soft-red" style="font-size: 0.9rem;"><i class="fas fa-times-circle"></i> Ditolak</span>
                @else
                    <span class="badge-soft-yellow" style="font-size: 0.9rem;"><i class="fas fa-clock"></i> Belum Verifikasi</span>
                @endif
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <h3 style="font-size: 1.05rem; font-weight: 700; margin-bottom: 16px;">Data Pribadi</h3>
                <form action="{{ route('admin.jamaah.update', $jamaah->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                        <label class="form-label fw-bold small">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $jamaah->nama) }}" required>
                    </div>
                    <div class="row g-2 mb-2">
                        <div class="col-6"><label class="form-label fw-bold small">Email</label><input type="email" name="email" class="form-control" value="{{ old('email', $jamaah->email) }}"></div>
                        <div class="col-6"><label class="form-label fw-bold small">Telepon</label><input type="text" name="telepon" class="form-control" value="{{ old('telepon', $jamaah->telepon) }}"></div>
                    </div>
                    <div class="row g-2 mb-2">
                        <div class="col-6"><label class="form-label fw-bold small">NIK</label><input type="text" name="nik" class="form-control" value="{{ old('nik', $jamaah->nik) }}"></div>
                        <div class="col-6"><label class="form-label fw-bold small">Paspor</label><input type="text" name="pasport" class="form-control" value="{{ old('pasport', $jamaah->pasport) }}"></div>
                    </div>
                    <div class="row g-2 mb-2">
                        <div class="col-6"><label class="form-label fw-bold small">Tempat Lahir</label><input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $jamaah->tempat_lahir) }}"></div>
                        <div class="col-6"><label class="form-label fw-bold small">Tanggal Lahir</label><input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $jamaah->tanggal_lahir?->format('Y-m-d')) }}"></div>
                    </div>
                    <div class="row g-2 mb-2">
                        <div class="col-6">
                            <label class="form-label fw-bold small">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select">
                                <option value="">- Pilih -</option>
                                <option value="laki-laki" {{ old('jenis_kelamin', $jamaah->jenis_kelamin) === 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="perempuan" {{ old('jenis_kelamin', $jamaah->jenis_kelamin) === 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small">Alamat</label>
                        <textarea name="alamat" rows="2" class="form-control">{{ old('alamat', $jamaah->alamat) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-sm-green"><i class="fas fa-save"></i> Simpan Perubahan</button>
                </form>
            </div>

            <div class="col-md-6">
                <h3 style="font-size: 1.05rem; font-weight: 700; margin-bottom: 16px;">Verifikasi & Status</h3>
                <form action="{{ route('admin.jamaah.verify', $jamaah->id) }}" method="POST" style="background: #f7fff8; border-radius: 14px; padding: 16px; margin-bottom: 20px;">
                    @csrf
                    <label class="form-label fw-bold small">Ubah Status Verifikasi</label>
                    <select name="status_verifikasi" class="form-select mb-2">
                        <option value="belum" {{ $jamaah->status_verifikasi === 'belum' ? 'selected' : '' }}>Belum Verifikasi</option>
                        <option value="terverifikasi" {{ $jamaah->status_verifikasi === 'terverifikasi' ? 'selected' : '' }}>Terverifikasi</option>
                        <option value="ditolak" {{ $jamaah->status_verifikasi === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                    <button type="submit" class="btn btn-sm-green w-100"><i class="fas fa-check"></i> Update Status</button>
                </form>

                <h3 style="font-size: 1.05rem; font-weight: 700; margin-bottom: 16px;">Informasi Paket</h3>
                @if($paket)
                    <div style="background: #f7fff8; border: 1px solid #d7eedc; border-radius: 14px; padding: 16px; margin-bottom: 16px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                            <strong>{{ $paket->nama }}</strong>
                            <span class="badge-soft-green">{{ $paket->tipe_label }}</span>
                        </div>
                        <div style="color: #0c8a63; font-weight: 700; margin-bottom: 8px;">Rp {{ number_format($paket->harga, 0, ',', '.') }}</div>
                        <div style="font-size: 0.85rem; color: #7d8d83;">
                            @if($paket->hotel)<div><i class="fas fa-hotel"></i> {{ $paket->hotel }}</div>@endif
                            @if($paket->maskapai)<div><i class="fas fa-plane"></i> {{ $paket->maskapai }}</div>@endif
                            @if($pendaftaran)<div><i class="fas fa-calendar"></i> Daftar: {{ $pendaftaran->tanggal_pendaftaran->format('d M Y') }}</div>@endif
                        </div>
                    </div>
                @else
                    <div style="background: #fff4e6; border-radius: 14px; padding: 16px; color: #b45309; text-align: center;">
                        <i class="fas fa-folder-open" style="font-size: 1.5rem; margin-bottom: 8px;"></i>
                        <p style="margin: 0; font-size: 0.9rem;">Jamaah belum memilih paket.</p>
                    </div>
                @endif

                @if($pembayaran)
                    <h3 style="font-size: 1.05rem; font-weight: 700; margin: 20px 0 16px;">Status Pembayaran</h3>
                    <div style="background: #f7fff8; border-radius: 14px; padding: 16px;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 6px;"><span style="color: #7d8d83; font-size: 0.85rem;">Metode</span><strong style="font-size: 0.85rem;">{{ $pembayaran->metode }}</strong></div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 6px;"><span style="color: #7d8d83; font-size: 0.85rem;">Total</span><strong style="font-size: 0.85rem;">Rp {{ number_format($pembayaran->total, 0, ',', '.') }}</strong></div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 6px;"><span style="color: #7d8d83; font-size: 0.85rem;">Status</span>
                            @if($pembayaran->status === 'terverifikasi')<span class="badge-soft-green">{{ $pembayaran->status_label }}</span>
                            @elseif($pembayaran->status === 'ditolak')<span class="badge-soft-red">{{ $pembayaran->status_label }}</span>
                            @else<span class="badge-soft-yellow">{{ $pembayaran->status_label }}</span>@endif
                        </div>
                        <a href="{{ route('admin.pembayaran') }}" class="btn btn-sm-green mt-2 w-100"><i class="fas fa-arrow-right"></i> Kelola Pembayaran</a>
                    </div>
                @endif
            </div>
        </div>

        <div style="margin-top: 24px; padding-top: 20px; border-top: 1px solid #f0f4ef;">
            <form action="{{ route('admin.jamaah.destroy', $jamaah->id) }}" method="POST" onsubmit="return confirm('Hapus jamaah {{ $jamaah->nama }}? Tindakan ini tidak dapat dibatalkan.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i> Hapus Jamaah</button>
            </form>
        </div>
    </div>
@endsection
