@extends('layouts.jamaah', ['user' => auth()->user()])

@section('title', 'Pendaftaran - ' . $paket->nama)

@section('content')
    <div style="color: #6b7a70; font-size: .95rem; margin-bottom: 10px;">
        <a href="{{ route('dashboard') }}" style="color: #0c8a63; text-decoration: none;">Dashboard</a> &rsaquo;
        <a href="{{ route('paket.detail', $paket->id) }}" style="color: #0c8a63; text-decoration: none;">Paket</a> &rsaquo;
        <strong>Pendaftaran</strong>
    </div>
    <h1 style="font-size: 1.75rem; font-weight: 700; margin-bottom: 8px;">Isi Data Jamaah</h1>
    <p style="color: #5e6a60; margin-bottom: 26px;">Lengkapi data diri Anda dengan benar sesuai dokumen resmi.</p>

    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 28px;">
        <div style="background: #0c8a63; color: #fff; border-radius: 14px; padding: 14px; text-align: center;">
            <div style="width: 32px; height: 32px; background: rgba(255,255,255,0.3); border-radius: 50%; display: grid; place-items: center; margin: 0 auto 6px;"><i class="fa-solid fa-check"></i></div>
            <strong style="font-size: 0.85rem;">Pilih Paket</strong><br><small style="opacity: 0.9;">Selesai</small>
        </div>
        <div style="background: #fff; border: 2px solid #0c8a63; border-radius: 14px; padding: 14px; text-align: center;">
            <div style="width: 32px; height: 32px; background: #0c8a63; color: #fff; border-radius: 50%; display: grid; place-items: center; margin: 0 auto 6px; font-weight: 700;">2</div>
            <strong style="font-size: 0.85rem;">Data Diri</strong><br><small style="color: #7d8d83;">Sedang Isi</small>
        </div>
        <div style="background: #fff; border: 1px solid #e8eee9; border-radius: 14px; padding: 14px; text-align: center;">
            <div style="width: 32px; height: 32px; background: #f0f5f3; color: #9ca9a2; border-radius: 50%; display: grid; place-items: center; margin: 0 auto 6px; font-weight: 700;">3</div>
            <strong style="font-size: 0.85rem;">Pembayaran</strong><br><small style="color: #7d8d83;">Menunggu</small>
        </div>
        <div style="background: #fff; border: 1px solid #e8eee9; border-radius: 14px; padding: 14px; text-align: center;">
            <div style="width: 32px; height: 32px; background: #f0f5f3; color: #9ca9a2; border-radius: 50%; display: grid; place-items: center; margin: 0 auto 6px; font-weight: 700;">4</div>
            <strong style="font-size: 0.85rem;">Konfirmasi</strong><br><small style="color: #7d8d83;">Menunggu</small>
        </div>
    </div>

    <div style="background: #fff; border-radius: 20px; border: 1px solid #dbe6dc; padding: 28px; margin-bottom: 20px;">
        <div style="background: #f6fff9; border: 1px solid #d4ead5; border-radius: 16px; padding: 16px 20px; display: flex; justify-content: space-between; align-items: center; gap: 16px; margin-bottom: 24px; flex-wrap: wrap;">
            <div>
                <span style="background: #e9f8ed; color: #0c8a63; border-radius: 999px; padding: 6px 12px; font-size: 0.8rem; font-weight: 700;"><i class="fa-solid fa-suitcase-rolling"></i> Paket Dipilih</span>
                <div style="font-weight: 700; margin-top: 8px;">{{ $paket->nama }} - {{ $paket->durasi_text }}</div>
                @if($paket->hotel)<div style="color: #5c7264; font-size: 0.9rem;">Hotel {{ $paket->hotel }}</div>@endif
            </div>
            <div style="text-align: right;">
                <div style="font-size: 0.85rem; color: #0c8a63; font-weight: 700;">Rp {{ number_format($paket->harga / 1000000, 1, ',', '.') }} jt</div>
            </div>
        </div>

        <h2 style="font-size: 1.15rem; font-weight: 700; margin-bottom: 20px;">Informasi Pribadi</h2>

        <form method="POST" action="{{ route('pendaftaran.submit', $paket->id) }}" enctype="multipart/form-data">
            @csrf
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif

            <div class="row g-3 mb-2">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nama Lengkap</label>
                    <input type="text" name="fullName" class="form-control form-control-lg" value="{{ old('fullName', $draft['fullName'] ?? ($jamaah->nama ?? '')) }}" placeholder="Nama sesuai KTP / Paspor" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">NIK (KTP)</label>
                    <input type="text" name="nik" class="form-control form-control-lg" value="{{ old('nik', $draft['nik'] ?? ($jamaah->nik ?? '')) }}" placeholder="NIK KTP" required>
                </div>
            </div>
            <div class="row g-3 mb-2">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Tempat Lahir</label>
                    <input type="text" name="birthPlace" class="form-control form-control-lg" value="{{ old('birthPlace', $draft['birthPlace'] ?? ($jamaah->tempat_lahir ?? '')) }}" placeholder="Tempat lahir" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Tanggal Lahir</label>
                    <input type="date" name="birthDate" class="form-control form-control-lg" value="{{ old('birthDate', $draft['birthDate'] ?? ($jamaah->tanggal_lahir?->format('Y-m-d') ?? '')) }}" required>
                </div>
            </div>
            <div class="row g-3 mb-2">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Jenis Kelamin</label>
                    <select name="gender" class="form-select form-select-lg" required>
                        <option value="L" {{ old('gender', $draft['gender'] ?? ($jamaah->jenis_kelamin === 'laki-laki' ? 'L' : '')) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('gender', $draft['gender'] ?? ($jamaah->jenis_kelamin === 'perempuan' ? 'P' : '')) == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nomor Handphone</label>
                    <input type="tel" name="phone" class="form-control form-control-lg" value="{{ old('phone', $draft['phone'] ?? ($jamaah->telepon ?? '')) }}" placeholder="08xxxxxxxxxx" required>
                </div>
            </div>
            <div class="row g-3 mb-2">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Alamat Email</label>
                    <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email', $draft['email'] ?? ($jamaah->email ?? '')) }}" placeholder="example@mail.com" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nomor Paspor <span class="text-muted fw-normal">(opsional)</span></label>
                    <input type="text" name="passport" class="form-control form-control-lg" value="{{ old('passport', $draft['passport'] ?? ($jamaah->pasport ?? '')) }}" placeholder="Nomor paspor">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Alamat Lengkap</label>
                <textarea name="address" rows="3" class="form-control form-control-lg" placeholder="Alamat sesuai KTP / Paspor" required>{{ old('address', $draft['address'] ?? ($jamaah->alamat ?? '')) }}</textarea>
            </div>

            <h2 style="font-size: 1.15rem; font-weight: 700; margin: 28px 0 16px;">Upload Dokumen <span class="text-muted" style="font-size: 0.85rem; font-weight: 400;">(opsional)</span></h2>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Scan/Foto Paspor</label>
                    <input type="file" name="file_passport" class="form-control form-control-lg" accept="image/jpeg,image/png">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Foto 4x6</label>
                    <input type="file" name="file_photo" class="form-control form-control-lg" accept="image/jpeg,image/png">
                </div>
            </div>

            <div style="background: #fff8e1; border: 1px solid #f3e1a1; border-radius: 14px; padding: 16px 20px; margin: 24px 0; display: flex; gap: 14px; align-items: flex-start;">
                <i class="fa-solid fa-circle-info" style="color: #b78303; font-size: 1.2rem; margin-top: 2px;"></i>
                <p style="font-size: 0.9rem; color: #5f5b33; margin: 0; line-height: 1.6;">Pastikan semua data sesuai dokumen resmi (KTP/Paspor). Data yang salah dapat menunda proses pendaftaran Umrah Anda.</p>
            </div>

            <div style="display: flex; justify-content: space-between; gap: 14px; flex-wrap: wrap;">
                <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                    <a href="{{ route('paket.detail', $paket->id) }}" class="btn btn-outline-secondary">&lsaquo; Kembali</a>
                    <button type="submit" formaction="{{ route('pendaftaran.draft', $paket->id) }}" formmethod="POST" class="btn btn-outline-success">Simpan Draft</button>
                </div>
                <button type="submit" class="btn btn-success btn-lg px-4">Lanjut ke Pembayaran &rarr;</button>
            </div>
        </form>
    </div>
@endsection
