<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Smart Umrah — Wujudkan Perjalanan Ibadah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
      :root { --green: #0c8a63; --green-dark: #087554; --muted: #6b7280; }
      body { font-family: 'Segoe UI', Roboto, system-ui, -apple-system, sans-serif; background: #f7faf7; color: #1b1b18; }
      .hero { background: linear-gradient(180deg, rgba(12,138,99,0.08), transparent 65%); padding: 70px 0; }
      .card-feature { border-radius: 16px; box-shadow: 0 12px 30px rgba(15,23,16,0.08); }
      .package-card { border-radius: 16px; box-shadow: 0 14px 40px rgba(12,138,99,0.08); }
      .btn-cta { background: var(--green); color: #fff; border-radius: 12px; padding: 12px 28px; font-weight: 600; }
      .btn-ghost { color: var(--green); border: 1px solid rgba(12,138,99,0.18); border-radius: 12px; padding: 12px 26px; }
      .nav-brand { color: var(--green); font-weight: 700; font-size: 1.15rem; }
      footer { background: #fff; padding: 48px 0; }
    </style>
  </head>
  <body>

    @include('partials.navbar')

    <section class="hero">
      <div class="container">
        <div class="row align-items-center gy-5">
          <div class="col-lg-6">
            <h1 class="display-6 fw-bold">Wujudkan Perjalanan Ibadah Umrah Anda dengan Mudah &amp; Aman</h1>
            <p class="lead text-muted mt-4">Rencanakan, daftar, dan kelola perjalanan umrah Anda dengan platform terpercaya — paket lengkap, pembayaran aman, dan dukungan terbaik untuk tiap langkah ibadah.</p>

            <div class="d-flex flex-wrap gap-3 mt-5">
              <a href="#paket" class="btn btn-cta">Lihat Paket</a>
              <a href="{{ url('/login') }}" class="btn btn-ghost">Masuk</a>
            </div>

            <div class="row g-3 mt-5">
              <div class="col-6">
                <div class="card card-feature p-4 h-100">
                  <div class="d-flex align-items-start gap-3">
                    <div class="bg-white rounded-circle p-3 shadow-sm" style="width:52px;height:52px;">
                      <i class="fa-solid fa-calendar-check text-success fa-lg"></i>
                    </div>
                    <div>
                      <h6 class="mb-1">Paket Terpercaya</h6>
                      <p class="mb-0 text-muted small">Operator resmi dan mitra terbaik.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="card card-feature p-4 h-100">
                  <div class="d-flex align-items-start gap-3">
                    <div class="bg-white rounded-circle p-3 shadow-sm" style="width:52px;height:52px;">
                      <i class="fa-solid fa-shield-halved text-success fa-lg"></i>
                    </div>
                    <div>
                      <h6 class="mb-1">Pembayaran Aman</h6>
                      <p class="mb-0 text-muted small">Transaksi terlindungi dan transparan.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 text-center">
            <img src="https://via.placeholder.com/520x380.png?text=Smart+Umrah" alt="Smart Umrah" class="img-fluid rounded-4 shadow-sm">
          </div>
        </div>
      </div>
    </section>

    <section class="py-5">
      <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
          <div>
            <h3 id="paket" class="mb-1">Paket Umrah Pilihan</h3>
            <p class="text-muted mb-0">Pilih paket yang paling sesuai untuk perjalanan ibadah Anda.</p>
          </div>
          <a href="#" class="text-success text-decoration-none">Lihat semua paket</a>
        </div>

        <div class="row g-4">
          <div class="col-md-4">
            <div class="card package-card p-4 h-100">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                  <h5 class="mb-1">Paket Reguler</h5>
                  <small class="text-muted">9 hari</small>
                </div>
                <div class="text-end">
                  <div class="text-muted">Rp</div>
                  <div class="fs-4 text-success fw-bold">25.000.000</div>
                </div>
              </div>
              <p class="text-muted">Akomodasi nyaman, transportasi, dan layanan standar untuk perjalanan umrah.</p>
              <div class="mt-auto d-flex gap-2 pt-3">
                <a href="#" class="btn btn-outline-success btn-sm">Lihat</a>
                <a href="{{ url('/register') }}" class="btn btn-success btn-sm">Pesan Sekarang</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card package-card p-4 h-100">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                  <h5 class="mb-1">Paket Plus</h5>
                  <small class="text-muted">11 hari</small>
                </div>
                <div class="text-end">
                  <div class="text-muted">Rp</div>
                  <div class="fs-4 text-success fw-bold">35.000.000</div>
                </div>
              </div>
              <p class="text-muted">Hotel bintang 4, fasilitas tambahan, dan layanan lebih fleksibel.</p>
              <div class="mt-auto d-flex gap-2 pt-3">
                <a href="#" class="btn btn-outline-success btn-sm">Lihat</a>
                <a href="{{ url('/register') }}" class="btn btn-success btn-sm">Pesan Sekarang</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card package-card p-4 h-100">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                  <h5 class="mb-1">Paket VIP</h5>
                  <small class="text-muted">14 hari</small>
                </div>
                <div class="text-end">
                  <div class="text-muted">Rp</div>
                  <div class="fs-4 text-success fw-bold">90.000.000</div>
                </div>
              </div>
              <p class="text-muted">Penginapan premium, layanan eksklusif, dan penanganan VIP.</p>
              <div class="mt-auto d-flex gap-2 pt-3">
                <a href="#" class="btn btn-outline-success btn-sm">Lihat</a>
                <a href="{{ url('/register') }}" class="btn btn-success btn-sm">Pesan Sekarang</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-5 bg-white" id="tentang">
      <div class="container">
        <div class="row align-items-center g-5">
          <div class="col-lg-6">
            <h3>Tentang Smart Umrah</h3>
            <p class="text-muted">Smart Umrah membantu jamaah merencanakan ibadah dengan mudah, aman, dan transparan. Dari pemilihan paket hingga pembayaran, semua bisa dikelola di satu tempat.</p>
            <ul class="list-unstyled text-muted">
              <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i>Rencana perjalanan terstruktur</li>
              <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i>Pembayaran aman dan transparan</li>
              <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i>Dukungan konsumen profesional</li>
            </ul>
          </div>
          <div class="col-lg-6">
            <div class="card package-card p-4">
              <h5 class="mb-3">Kenapa pilih Smart Umrah?</h5>
              <p class="text-muted">Solusi lengkap untuk jamaah yang ingin menunaikan ibadah umrah tanpa ribet, dengan paket terpercaya dan layanan yang mudah diakses.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h5>Smart Umrah</h5>
            <p class="text-muted">Platform pendaftaran umrah yang aman dan terpercaya. Untuk pertanyaan, hubungi support@smartumrah.example</p>
          </div>
          <div class="col-md-4 text-md-end">
            <small class="text-muted">© {{ date('Y') }} Smart Umrah</small>
          </div>
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
