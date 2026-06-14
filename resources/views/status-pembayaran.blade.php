<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Status Pembayaran - Smart Umrah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
      * { margin: 0; padding: 0; box-sizing: border-box; }
      body { background: #eef5ef; color: #1b2d24; font-family: "Inter", "Segoe UI", sans-serif; }
      .page-container { max-width: 540px; margin: 0 auto; padding: 30px 18px 40px; }
      .back-link { display: inline-flex; align-items: center; gap: 10px; color: #1f4d2d; text-decoration: none; font-weight: 700; margin-bottom: 26px; }
      .back-link:hover { color: #0c8a63; }
      .status-card { background: #fff; border-radius: 30px; padding: 32px 28px; box-shadow: 0 20px 40px rgba(15, 76, 45, 0.07); margin-bottom: 28px; text-align: center; }
      .status-icon { width: 94px; height: 94px; border-radius: 50%; background: #ecf9f1; display: grid; place-items: center; margin: 0 auto 18px; color: #0c8a63; font-size: 2.4rem; }
      .status-title { font-size: 1.75rem; font-weight: 700; margin-bottom: 10px; }
      .status-subtitle { color: #5c7264; line-height: 1.8; font-size: .98rem; }
      .flow-card { border-radius: 24px; background: #fff; padding: 22px; border: 1px solid #dbe6dc; margin-bottom: 26px; }
      .flow-step { display: grid; grid-template-columns: 36px 1fr; gap: 14px; align-items: center; margin-bottom: 18px; }
      .flow-step:last-child { margin-bottom: 0; }
      .flow-badge { width: 36px; height: 36px; border-radius: 50%; display: grid; place-items: center; font-weight: 700; }
      .flow-badge.done { background: #0c8a63; color: #fff; }
      .flow-badge.active { background: #f1f9f1; color: #0c8a63; }
      .flow-text strong { display: block; font-size: .95rem; color: #1b2d24; }
      .flow-text small { color: #6b7a70; }
      .detail-card { background: #fff; border-radius: 24px; padding: 28px; border: 1px solid #dbe6dc; margin-bottom: 24px; }
      .detail-title { font-size: 1rem; font-weight: 700; margin-bottom: 18px; }
      .detail-row { display: flex; justify-content: space-between; gap: 14px; margin-bottom: 14px; }
      .detail-row:last-child { margin-bottom: 0; }
      .detail-label { color: #6b7a70; font-size: .92rem; }
      .detail-value { font-size: .95rem; font-weight: 700; color: #1b2d24; text-align: right; }
      .detail-badge { display: inline-flex; align-items: center; gap: 8px; background: #ecf9f1; color: #0c8a63; border-radius: 999px; padding: 10px 14px; font-size: .88rem; font-weight: 700; }
      .note-card { background: #f4fbf7; border: 1px solid #d4ebd9; border-radius: 22px; padding: 18px 20px; display: grid; gap: 12px; margin-bottom: 24px; }
      .note-card strong { display: block; color: #1d4f29; font-size: .95rem; }
      .note-card p { margin: 0; color: #5c7264; font-size: .92rem; line-height: 1.6; }
      .footer-actions { display: grid; gap: 14px; }
      .btn-secondary { background: #fff; border: 1px solid #dbe6dc; color: #3e4a42; border-radius: 16px; padding: 14px 20px; font-weight: 700; text-align: center; text-decoration: none; }
      .btn-secondary:hover { background: #f4faf5; }
      .btn-primary { background: #0c8a63; color: #fff; border: none; border-radius: 16px; padding: 14px 20px; font-weight: 700; text-align: center; text-decoration: none; }
      .btn-primary:hover { background: #087554; }
      @media (max-width: 576px) { .page-container { padding: 24px 16px 32px; } .detail-row { flex-direction: column; align-items: flex-start; } .detail-value { text-align: left; } }
    </style>
  </head>
  <body>
    <div class="page-container">
      <a href="/pembayaran/{{ $package['id'] }}" class="back-link"><i class="fa-solid fa-chevron-left"></i> Kembali</a>
      <div class="status-card">
        <div class="status-icon"><i class="fa-solid fa-circle-check"></i></div>
        <h1 class="status-title">Bukti Pembayaran Berhasil Dikirim</h1>
        <p class="status-subtitle">Terima kasih. Bukti pembayaran Anda telah kami terima dan sedang menunggu proses verifikasi dari Smart Umrah.</p>
      </div>

      <div class="flow-card">
        <div class="flow-step">
          <div class="flow-badge done"><i class="fa-solid fa-check"></i></div>
          <div class="flow-text"><strong>Pilih Paket</strong><small>Selesai</small></div>
        </div>
        <div class="flow-step">
          <div class="flow-badge done"><i class="fa-solid fa-check"></i></div>
          <div class="flow-text"><strong>Data</strong><small>Selesai</small></div>
        </div>
        <div class="flow-step">
          <div class="flow-badge done"><i class="fa-solid fa-check"></i></div>
          <div class="flow-text"><strong>Pembayaran</strong><small>Selesai</small></div>
        </div>
        <div class="flow-step">
          <div class="flow-badge active">4</div>
          <div class="flow-text"><strong>Verifikasi Admin</strong><small>Menunggu</small></div>
        </div>
      </div>

      <div class="detail-card">
        <div class="detail-title">Detail Pembayaran</div>
        <div class="detail-row"><span class="detail-label">Paket Umrah</span><span class="detail-value">{{ $package['name'] }} - {{ $package['duration'] }}</span></div>
        <div class="detail-row"><span class="detail-label">Nama Jamaah</span><span class="detail-value">Ahmad Fauzi</span></div>
        <div class="detail-row"><span class="detail-label">Metode Bayar</span><span class="detail-value">Transfer Bank BCA</span></div>
        <div class="detail-row"><span class="detail-label">Tgl Upload</span><span class="detail-value">15 Januari 2027</span></div>
        <div class="detail-row"><span class="detail-label">Nominal Pembayaran</span><strong class="detail-value">Rp {{ number_format($package['price'], 0, ',', '.') }}</strong></div>
        <div style="margin-top: 18px;">
          <span class="detail-badge"><i class="fa-solid fa-clock"></i> Menunggu Verifikasi</span>
        </div>
      </div>

      <div class="note-card">
        <strong>Admin Smart Umrah akan memvalidasi verifikasi pembayaran dalam waktu maksimal 1 x 24 jam.</strong>
        <p>Pastikan Anda menyimpan bukti pembayaran dan menunggu notifikasi selanjutnya. Pembayaran akan dikonfirmasi setelah dokumen diverifikasi.</p>
      </div>

      <div class="footer-actions">
        <a href="/dashboard" class="btn-secondary">Kembali ke Dashboard</a>
        <a href="/pendaftaran/{{ $package['id'] }}" class="btn-primary">Lihat Status Pendaftaran</a>
      </div>
    </div>
  </body>
</html>
