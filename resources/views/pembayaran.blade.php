<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembayaran Paket - Smart Umrah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
      * { margin: 0; padding: 0; box-sizing: border-box; }
      body { background: #eef5ef; color: #1b2d24; font-family: "Inter", "Segoe UI", sans-serif; }
      .page-container { max-width: 1100px; margin: 0 auto; padding: 30px 24px 40px; }
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
      .content-grid { display: grid; grid-template-columns: 1.05fr .95fr; gap: 24px; }
      .content-card { background: #fff; border-radius: 24px; border: 1px solid #dbe6dc; box-shadow: 0 20px 40px rgba(15, 69, 26, 0.08); padding: 28px; }
      .alert-card { display: flex; gap: 14px; align-items: flex-start; background: #fff8e1; border: 1px solid #f3e1a1; border-radius: 22px; padding: 20px 22px; margin-bottom: 26px; }
      .alert-card .icon-box { width: 44px; height: 44px; border-radius: 50%; display: grid; place-items: center; background: #fff1c7; color: #a47208; font-size: 1.2rem; flex-shrink: 0; }
      .alert-card h3 { margin: 0 0 6px; font-size: 1rem; font-weight: 700; color: #3d3407; }
      .alert-card p { margin: 0; color: #5f5b33; line-height: 1.6; font-size: .95rem; }
      .summary-card { border: 1px solid #d4ead5; border-radius: 24px; background: #f6fff9; padding: 26px; margin-bottom: 24px; }
      .summary-header { display: flex; justify-content: space-between; align-items: flex-start; gap: 18px; margin-bottom: 18px; }
      .summary-label { display: inline-flex; align-items: center; gap: 10px; background: #e9f8ed; border-radius: 999px; color: #0c8a63; padding: 10px 16px; font-weight: 700; font-size: .85rem; }
      .summary-title { font-size: 1.1rem; font-weight: 700; margin: 0; color: #16261f; }
      .summary-items { display: grid; gap: 14px; margin-bottom: 18px; }
      .summary-item { display: flex; justify-content: space-between; gap: 14px; align-items: center; color: #4b6858; font-size: .95rem; }
      .summary-item strong { color: #1b2d24; }
      .summary-total { display: grid; gap: 6px; margin-top: 14px; }
      .summary-total span { color: #7d8f81; font-size: .9rem; }
      .summary-total strong { font-size: 1.6rem; color: #0c8a63; }
      .payment-card { background: #fff; border: 1px solid #dbe6dc; border-radius: 24px; padding: 24px; }
      .section-title { font-size: 1.1rem; font-weight: 700; margin-bottom: 16px; }
      .method-list { display: grid; gap: 14px; }
      .method-item { border: 1px solid #dbe6dc; border-radius: 18px; padding: 18px; display: grid; grid-template-columns: auto 1fr auto; gap: 16px; align-items: center; cursor: pointer; transition: border-color .2s, box-shadow .2s; }
      .method-item input { accent-color: #0c8a63; }
      .method-item.active { border-color: #0c8a63; box-shadow: 0 10px 30px rgba(12, 138, 99, 0.12); }
      .method-avatar { width: 54px; height: 54px; border-radius: 16px; display: grid; place-items: center; background: #f3faf4; color: #0c8a63; font-size: 1.2rem; flex-shrink: 0; }
      .method-content { display: grid; gap: 4px; }
      .method-name { font-weight: 700; color: #16261f; }
      .method-subtitle { font-size: .9rem; color: #5f6a61; }
      .method-action { text-align: right; font-size: .85rem; color: #0c8a63; font-weight: 700; }
      .upload-section { border: 1px solid #dbe6dc; border-radius: 22px; background: #f8fbf7; padding: 22px; display: grid; gap: 14px; margin-top: 22px; }
      .upload-section h3 { margin: 0; font-size: 1rem; font-weight: 700; }
      .upload-note { color: #5c7264; font-size: .92rem; line-height: 1.6; }
      .upload-card { border: 1px dashed #d4dad3; border-radius: 18px; background: #fff; padding: 24px; display: grid; place-items: center; gap: 14px; text-align: center; min-height: 190px; }
      .upload-card .icon-box { width: 56px; height: 56px; border-radius: 16px; display: grid; place-items: center; color: #0c8a63; background: #e9f9ee; font-size: 1.5rem; }
      .upload-card p { margin: 0; color: #5c7264; font-size: .93rem; }
      .upload-card .btn-upload { background: #fff; border: 1px solid #d9e3da; color: #1b2d24; font-weight: 700; border-radius: 14px; padding: 12px 18px; cursor: pointer; }
      .upload-card .btn-upload:hover { background: #f4faf5; }
      .actions { display: flex; justify-content: space-between; gap: 16px; flex-wrap: wrap; margin-top: 24px; }
      .btn-secondary { background: #fff; border: 1px solid #dbe6dc; color: #3e4a42; border-radius: 16px; padding: 14px 22px; font-weight: 700; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; }
      .btn-secondary:hover { background: #f4faf5; }
      .btn-primary { background: #0c8a63; color: #fff; border: none; border-radius: 16px; padding: 14px 22px; font-weight: 700; cursor: pointer; transition: background .2s; }
      .btn-primary:hover { background: #087554; }
      @media (max-width: 1024px) { .content-grid { grid-template-columns: 1fr; } }
      @media (max-width: 768px) { .page-container { padding: 20px 16px 32px; } .actions { flex-direction: column; align-items: stretch; } }
    </style>
  </head>
  <body>
    <div class="page-container">
      <div class="breadcrumb-path"><a href="/dashboard">Dashboard</a> &rsaquo; <a href="/pembayaran/{{ $package['id'] }}">Pembayaran</a> &rsaquo; <strong>Bayar Sekarang</strong></div>
      <h1 class="header-title">Pembayaran</h1>
      <p class="header-subtitle">Selesaikan pembayaran untuk mengamankan paket umrah Anda.</p>

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
          <div class="step-card completed">
            <div class="step-circle completed"><i class="fa-solid fa-check"></i></div>
            <div class="step-info">
              <strong>Data Diri</strong>
              <small>Selesai</small>
            </div>
          </div>
          <div class="step-card active">
            <div class="step-circle">3</div>
            <div class="step-info">
              <strong>Pembayaran</strong>
              <small>Sekarang</small>
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

      <div class="content-grid">
        <div class="content-card">
          <form method="POST" action="{{ route('pembayaran.confirm', $package['id']) }}" enctype="multipart/form-data">
            @csrf
            <div class="alert-card">
              <div class="icon-box"><i class="fa-solid fa-hourglass-half"></i></div>
              <div>
                <h3>Batas Waktu Pembayaran</h3>
                <p>Selesaikan pembayaran dalam waktu 24 jam untuk menghindari pemblokiran otomatis.</p>
              </div>
            </div>

          <div class="summary-card">
            <div class="summary-header">
              <div>
                <div class="summary-label">Ringkasan Pesanan</div>
                <h2 class="summary-title">Paket Umrah {{ $package['id'] == 1 ? 'Reguler' : ($package['id'] == 2 ? 'Plus' : 'VIP') }}</h2>
              </div>
              <span class="summary-label">{{ $package['id'] == 1 ? 'Reguler' : ($package['id'] == 2 ? 'Plus' : 'VIP') }}</span>
            </div>
            <div class="summary-items">
              <div class="summary-item"><span><i class="fa-solid fa-calendar-days"></i> {{ $package['departure_date'] }}</span><strong>{{ $package['duration'] }}</strong></div>
              <div class="summary-item"><span><i class="fa-solid fa-hotel"></i> Hotel {{ $package['hotel'] }}</span><strong>{{ $package['id'] == 3 ? 'Qatar Airways' : 'Garuda Indonesia' }}</strong></div>
            </div>
            <div class="summary-total">
              <span>Harga Paket</span>
              <strong>Rp {{ number_format($package['price'], 0, ',', '.') }}</strong>
            </div>
            <div class="summary-total" style="margin-top: 10px; gap: 2px;">
              <span>Biaya Admin</span>
              <strong style="font-size: 1rem; color: #5e6d5f;">Rp 250.000</strong>
            </div>
            <div class="summary-total" style="margin-top: 18px;">
              <span>Total Pembayaran</span>
              <strong>Rp {{ number_format($package['price'] + 250000, 0, ',', '.') }}</strong>
            </div>
          </div>

          <div class="payment-card">
            <div class="section-title">Metode Pembayaran</div>
            <div class="method-list">
              <label class="method-item active">
                <div class="method-avatar"><i class="fa-solid fa-university"></i></div>
                <div class="method-content">
                  <div class="method-name">Transfer Bank BCA</div>
                  <div class="method-subtitle">No. Rekening 123 456 7890 - a/n Smart Umrah Travel</div>
                </div>
                <div class="method-action">Dipilih</div>
              </label>
              <label class="method-item">
                <div class="method-avatar"><i class="fa-solid fa-credit-card"></i></div>
                <div class="method-content">
                  <div class="method-name">Virtual Account BNI</div>
                  <div class="method-subtitle">Bayar otomatis menggunakan Virtual Account</div>
                </div>
                <div><input type="radio" name="payment_method"></div>
              </label>
              <label class="method-item">
                <div class="method-avatar"><i class="fa-solid fa-wallet"></i></div>
                <div class="method-content">
                  <div class="method-name">E-Wallet</div>
                  <div class="method-subtitle">OVO / Dana / GoPay</div>
                </div>
                <div><input type="radio" name="payment_method"></div>
              </label>
            </div>

            <div class="upload-section">
              <h3>Upload Bukti Pembayaran</h3>
              <p class="upload-note">Upload screenshot atau foto bukti transfer (JPG, PNG, max 5MB).</p>
              <label class="upload-card">
                <div class="icon-box"><i class="fa-solid fa-file-upload"></i></div>
                <p>Pilih File</p>
                <input type="file" name="proof" hidden>
              </label>
            </div>
          </div>

          <div class="actions">
              <a href="{{ route('pendaftaran.show', $package['id']) }}" class="btn-secondary"><i class="fa-solid fa-arrow-left"></i>&nbsp; Kembali</a>
              <button type="submit" class="btn-primary">Konfirmasi Pembayaran</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
