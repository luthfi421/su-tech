<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran Paket - Smart Umrah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
      * { margin: 0; padding: 0; box-sizing: border-box; }
      body { background: #eef5ef; color: #1b2d24; font-family: "Inter", "Segoe UI", sans-serif; }
      .page-container { max-width: 1200px; margin: 0 auto; padding: 30px 24px 40px; }
      .breadcrumb-path { color: #6b7a70; font-size: .95rem; margin-bottom: 10px; }
      .breadcrumb-path a { color: #6b7a70; text-decoration: none; }
      .header-title { font-size: 2rem; font-weight: 700; margin-bottom: 8px; }
      .header-subtitle { color: #5e6a60; margin-bottom: 26px; }
      .steps-wrapper { position: relative; margin-bottom: 28px; }
      .steps-line { position: absolute; inset: 50% 0 0; transform: translateY(-50%); height: 2px; background: linear-gradient(90deg, #d7ebd7 0%, #f0f6f1 100%); z-index: 0; }
      .steps { position: relative; display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 16px; z-index: 1; }
      .step-card { background: #fff; border: 1px solid #e5ece5; border-radius: 18px; padding: 18px 16px; display: flex; align-items: center; gap: 14px; box-shadow: 0 10px 30px rgba(15, 76, 45, 0.04); }
      .step-card.active { border-color: #0c8a63; background: #f2fbf5; }
      .step-card.completed { background: #f1faf3; border-color: #0c8a63; }
      .step-circle { width: 44px; height: 44px; border-radius: 50%; display: grid; place-items: center; font-weight: 700; color: #0c8a63; background: #e8f6ea; flex-shrink: 0; }
      .step-circle.completed { background: #0c8a63; color: #fff; }
      .step-info { display: grid; gap: 3px; }
      .step-info strong { font-size: .95rem; color: #1b2d24; }
      .step-info small { font-size: .8rem; color: #728171; }
      .content-card { background: #fff; border-radius: 24px; border: 1px solid #dbe6dc; box-shadow: 0 20px 40px rgba(15, 69, 26, 0.08); padding: 28px; }
      .package-box { background: #f6fff9; border: 1px solid #d4ead5; border-radius: 22px; padding: 20px 24px; display: grid; grid-template-columns: 1fr auto; gap: 16px; align-items: center; margin-bottom: 28px; }
      .package-box .left { display: grid; gap: 8px; }
      .package-label { background: #e9f8ed; color: #0c8a63; border-radius: 999px; padding: 8px 14px; font-size: .84rem; display: inline-flex; align-items: center; gap: 8px; font-weight: 700; }
      .package-name { font-size: 1rem; font-weight: 700; color: #16261f; }
      .package-meta { color: #5c7264; font-size: .9rem; }
      .package-status { display: inline-flex; align-items: center; gap: 10px; border-radius: 999px; background: #ecf8ef; color: #0c8a63; font-size: .85rem; font-weight: 700; padding: 10px 16px; }
      .package-price { font-size: .95rem; color: #0c8a63; font-weight: 700; }
      .form-card { background: #fff; border-radius: 22px; border: 1px solid #dbe6dc; padding: 28px; }
      .section-header { display: flex; justify-content: space-between; align-items: center; gap: 16px; margin-bottom: 24px; }
      .section-header h2 { font-size: 1.2rem; font-weight: 700; margin: 0; }
      .section-badge { display: inline-flex; align-items: center; gap: 8px; background: #fff6d9; border: 1px solid #f4e3ab; color: #a0700c; padding: 10px 16px; border-radius: 999px; font-weight: 700; font-size: .84rem; }
      .row-form { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 20px; }
      .input-card { background: #f8fbf7; border: 1px solid #dbe6dc; border-radius: 18px; padding: 18px 20px; display: grid; gap: 10px; }
      .input-card label { color: #4b6858; font-size: .9rem; font-weight: 600; }
      .input-card input,
      .input-card select,
      .input-card textarea { width: 100%; border: 1px solid #d9e3da; border-radius: 14px; padding: 14px 16px; font-size: .95rem; background: #fff; color: #1b2d24; }
      .input-card textarea { resize: vertical; min-height: 100px; }
      .input-card input:focus,
      .input-card select:focus,
      .input-card textarea:focus { outline: none; border-color: #0c8a63; box-shadow: 0 0 0 4px rgba(12, 138, 99, 0.1); }
      .upload-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px; margin-top: 18px; }
      .upload-card { border: 1px dashed #dce8dc; border-radius: 22px; background: #fff; padding: 28px 22px; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 18px; min-height: 230px; }
      .upload-card .icon-box { width: 56px; height: 56px; border-radius: 18px; display: grid; place-items: center; color: #0c8a63; background: #e9f9ee; font-size: 1.4rem; }
      .upload-card h3 { font-size: 1rem; font-weight: 700; color: #19312a; margin: 0; }
      .upload-card p { color: #5c7264; font-size: .92rem; margin: 0; }
      .upload-card .btn-upload { background: #fff; border: 1px solid #d9e3da; color: #1b2d24; font-weight: 700; border-radius: 14px; padding: 11px 18px; cursor: pointer; }
      .upload-card .btn-upload:hover { background: #f4faf5; }
      .note-box { background: #fff8e1; border: 1px solid #f3e1a1; border-radius: 18px; padding: 18px 20px; display: flex; gap: 16px; align-items: flex-start; margin-top: 28px; }
      .note-box i { color: #b78303; font-size: 1.2rem; margin-top: 4px; }
      .note-box p { font-size: .94rem; color: #5f5b33; margin: 0; line-height: 1.6; }
      .actions { display: flex; justify-content: flex-end; gap: 14px; flex-wrap: wrap; margin-top: 28px; }
      .btn-secondary { background: #fff; border: 1px solid #dbe6dc; color: #3e4a42; border-radius: 16px; padding: 12px 20px; font-weight: 700; }
      .btn-secondary:hover { background: #f4faf5; }
      .btn-draft { background: #fff; border: 1px solid #dbe6dc; color: #3e4a42; border-radius: 16px; padding: 12px 20px; font-weight: 700; }
      .btn-primary { background: #0c8a63; color: #fff; border: none; border-radius: 16px; padding: 12px 20px; font-weight: 700; }
      .btn-primary:hover { background: #087554; }
      @media (max-width: 1024px) { .row-form, .steps { grid-template-columns: 1fr; } .package-box { grid-template-columns: 1fr; } }
      @media (max-width: 768px) { .page-container { padding: 20px 16px 32px; } .actions { justify-content: flex-start; } }
    </style>
  </head>
  <body>
    <div class="page-container">
      <div class="breadcrumb-path"><a href="/dashboard">Dashboard</a> &rsaquo; <a href="/pendaftaran/{{ $package['id'] }}">Pendaftaran</a> &rsaquo; <strong>Data Diri</strong></div>
      <h1 class="header-title">Isi Data Jamaah</h1>
      <p class="header-subtitle">Lengkapi data diri Anda dengan benar sesuai dokumen resmi.</p>

      <div class="steps-wrapper">
        <div class="steps-line"></div>
        <div class="steps">
          <div class="step-card completed">
            <div class="step-circle completed"><i class="fa-solid fa-check"></i></div>
            <div class="step-info">
              <strong>Pilih Paket</strong>
              <small>Selesai</small>
            </div>
          </div>
          <div class="step-card active">
            <div class="step-circle">2</div>
            <div class="step-info">
              <strong>Data Diri</strong>
              <small>Aktif</small>
            </div>
          </div>
          <div class="step-card">
            <div class="step-circle">3</div>
            <div class="step-info">
              <strong>Pembayaran</strong>
              <small>Menunggu</small>
            </div>
          </div>
          <div class="step-card">
            <div class="step-circle">4</div>
            <div class="step-info">
              <strong>Konfirmasi</strong>
              <small>Menunggu</small>
            </div>
          </div>
        </div>
      </div>

      <div class="content-card">
        @if(session('status'))
        <div class="note-box" style="background:#e7f7e7;border-color:#c8e6cb;color:#1d4f2f;">
          <i class="fa-solid fa-circle-check"></i>
          <p>{{ session('status') }}</p>
        </div>
        @endif

        <div class="package-box">
          <div>
            <span class="package-label"><i class="fa-solid fa-suitcase-rolling"></i> Paket Dipilih</span>
            <div class="package-name">{{ $package['name'] }} - {{ $package['duration'] }} - Hotel {{ $package['hotel'] }}</div>
            <div class="package-meta">Mulai: {{ $package['departure_date'] }}</div>
          </div>
          <div class="text-end">
            <span class="package-status"><i class="fa-solid fa-circle-check"></i> Terkonfirmasi</span>
            <div class="package-price">Rp {{ number_format($package['price'] / 1000000, 0, ',', '.') }} jt / orang</div>
          </div>
        </div>

        <div class="form-card">
          <div class="section-header">
            <h2>Informasi Pribadi</h2>
            <span class="section-badge">Semua field wajib diisi</span>
          </div>

          <form method="POST" action="/pendaftaran/{{ $package['id'] }}/draft" enctype="multipart/form-data">
            @csrf
            <div class="row-form">
              <div class="input-card">
                <label for="fullName">Nama Lengkap</label>
                <input type="text" id="fullName" name="fullName" value="{{ old('fullName', $draft['fullName'] ?? 'Ahmad Fauzi') }}" placeholder="Nama sesuai KTP / Paspor">
              </div>
              <div class="input-card">
                <label for="nik">NIK (KTP)</label>
                <input type="text" id="nik" name="nik" value="{{ old('nik', $draft['nik'] ?? '3175012801900001') }}" placeholder="NIK KTP">
              </div>
            </div>

            <div class="row-form">
              <div class="input-card">
                <label for="birthPlace">Tempat Lahir</label>
                <input type="text" id="birthPlace" name="birthPlace" value="{{ old('birthPlace', $draft['birthPlace'] ?? 'Jakarta') }}" placeholder="Tempat lahir">
              </div>
              <div class="input-card">
                <label for="birthDate">Tanggal Lahir</label>
                <input type="date" id="birthDate" name="birthDate" value="{{ old('birthDate', $draft['birthDate'] ?? '1990-01-28') }}">
              </div>
            </div>

            <div class="row-form">
              <div class="input-card">
                <label for="gender">Jenis Kelamin</label>
                <select id="gender" name="gender">
                  <option value="L" {{ old('gender', $draft['gender'] ?? 'L') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                  <option value="P" {{ old('gender', $draft['gender'] ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
              </div>
              <div class="input-card">
                <label for="phone">Nomor Handphone</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone', $draft['phone'] ?? '081234567890') }}" placeholder="08xxxxxxxxxx">
              </div>
            </div>

            <div class="row-form">
              <div class="input-card">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $draft['email'] ?? 'ahmad.fauzi@gmail.com') }}" placeholder="example@mail.com">
              </div>
              <div class="input-card">
                <label for="passport">Nomor Paspor <span style="color:#7a8778;font-weight:500;">(opsional)</span></label>
                <input type="text" id="passport" name="passport" value="{{ old('passport', $draft['passport'] ?? 'B9876543') }}" placeholder="Nomor paspor">
              </div>
            </div>

            <div class="input-card" style="margin-bottom: 0;">
              <label for="address">Alamat Lengkap</label>
              <textarea id="address" name="address" rows="3" placeholder="Alamat sesuai KTP / Paspor">{{ old('address', $draft['address'] ?? 'Jl Merdeka Raya No. 45, Kelapa Gading, Jakarta Utara, DKI Jakarta 14240') }}</textarea>
            </div>

            <div class="section-header" style="margin-top: 32px;">
              <h2>Upload Dokumen</h2>
              <span class="section-badge"><i class="fa-solid fa-upload"></i> Upload Dokumen</span>
            </div>

            <div class="upload-grid">
              <label class="upload-card">
                <div class="icon-box"><i class="fa-solid fa-passport"></i></div>
                <h3>Upload Paspor</h3>
                <p>Halaman data diri paspor (scan/foto)</p>
                <input type="file" name="file_passport" hidden>
                <span class="btn-upload">Pilih File</span>
              </label>
              <label class="upload-card">
                <div class="icon-box"><i class="fa-solid fa-camera"></i></div>
                <h3>Upload Foto 4x6</h3>
                <p>Background putih, wajah tampak jelas</p>
                <input type="file" name="file_photo" hidden>
                <span class="btn-upload">Pilih File</span>
              </label>
            </div>

            <div class="note-box">
              <i class="fa-solid fa-circle-info"></i>
              <p>Pastikan semua data yang Anda isi sesuai dengan dokumen resmi (KTP/Paspor). Data yang salah dapat menyebabkan penundaan proses pendaftaran Umrah Anda. Hubungi admin jika ada kendala.</p>
            </div>

            <div class="actions">
              <a href="/paket/{{ $package['id'] }}" class="btn-secondary">&lsaquo; Kembali</a>
              <button type="submit" class="btn-draft">Simpan Draft</button>
              <a href="/pembayaran/{{ $package['id'] }}" class="btn-primary">Lanjut ke Pembayaran</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>