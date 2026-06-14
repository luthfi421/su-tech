<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Paket - Smart Umrah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
      * { margin: 0; padding: 0; box-sizing: border-box; }
      body { background: #f5f5f5; color: #1b1b18; font-family: "Segoe UI", sans-serif; }
      .container-detail { max-width: 480px; margin: 0 auto; background: #fff; min-height: 100vh; display: flex; flex-direction: column; }
      .header-detail { padding: 16px; display: flex; align-items: center; gap: 12px; border-bottom: 1px solid #e8eee9; }
      .back-btn { background: none; border: none; color: #0c8a63; font-size: 1.25rem; cursor: pointer; display: flex; align-items: center; gap: 6px; text-decoration: none; font-weight: 600; }
      .back-btn:hover { color: #087554; }
      .back-btn.vip { color: #7c3aed; }
      .back-btn.vip:hover { color: #6d28d9; }
      .package-image { width: 100%; height: 200px; background: linear-gradient(135deg, #0c8a63, #087554); display: flex; align-items: center; justify-content: center; color: #fff; font-size: 3rem; background-size: cover; background-position: center; }
      .package-image.vip { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
      .package-image.vip-mosque { background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300"><defs><linearGradient id="sky" x1="0" y1="0" x2="0" y2="1"><stop offset="0%25" style="stop-color:%23667eea;stop-opacity:1" /><stop offset="100%25" style="stop-color:%23764ba2;stop-opacity:1" /></linearGradient></defs><rect width="400" height="300" fill="url(%23sky)"/><circle cx="200" cy="80" r="40" fill="%23fbbf24" opacity="0.8"/></svg>'); background-attachment: fixed; }
      .content-detail { flex: 1; padding: 20px; overflow-y: auto; }
      .package-title { font-size: 1.25rem; font-weight: 700; margin-bottom: 12px; }
      .package-badge { display: inline-block; background: #fbbf24; color: #78350f; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 700; margin-bottom: 8px; }
      .package-badge.vip { background: #a78bfa; color: #fff; }
      .package-price-section { margin-bottom: 20px; }
      .price-label { color: #7d8d83; font-size: 0.8rem; margin-bottom: 4px; }
      .price-value { font-size: 1.5rem; font-weight: 700; color: #0c8a63; margin-bottom: 4px; }
      .price-value.vip { color: #a78bfa; }
      .duration-text { color: #7d8d83; font-size: 0.9rem; }
      .info-section { margin-bottom: 24px; background: #f9fafb; border-radius: 12px; padding: 16px; }
      .info-section.vip { background: linear-gradient(135deg, #f3e8ff 0%, #f0e7ff 100%); }
      .info-title { font-size: 0.95rem; font-weight: 700; margin-bottom: 12px; color: #1b1b18; }
      .info-row { display: flex; align-items: flex-start; gap: 12px; margin-bottom: 12px; }
      .info-row:last-child { margin-bottom: 0; }
      .info-icon { width: 32px; height: 32px; background: #e8f5f0; border-radius: 8px; display: grid; place-items: center; color: #0c8a63; font-size: 0.95rem; flex-shrink: 0; }
      .info-icon.vip { background: #ddd6fe; color: #7c3aed; }
      .info-content { flex: 1; }
      .info-label { font-size: 0.85rem; color: #7d8d83; margin-bottom: 2px; }
      .info-value { font-size: 0.9rem; font-weight: 600; }
      .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
      .info-grid-item { padding: 12px; background: #fff; border-radius: 8px; }
      .info-grid-item.vip { background: #fff; border: 1px solid #e9d5ff; }
      .info-grid-label { font-size: 0.75rem; color: #7d8d83; margin-bottom: 4px; font-weight: 600; }
      .info-grid-value { font-size: 0.9rem; font-weight: 700; color: #1b1b18; }
      .itinerary-section h3 { font-size: 0.95rem; font-weight: 700; margin-bottom: 12px; }
      .itinerary-item { display: flex; gap: 12px; margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid #e8eee9; }
      .itinerary-item:last-child { border-bottom: none; }
      .itinerary-day { width: 40px; height: 40px; background: #e8f5f0; border-radius: 8px; display: grid; place-items: center; color: #0c8a63; font-weight: 700; font-size: 0.9rem; flex-shrink: 0; }
      .itinerary-day.vip { background: #ddd6fe; color: #7c3aed; }
      .itinerary-content h5 { margin: 0 0 4px; font-size: 0.9rem; font-weight: 600; }
      .itinerary-content p { margin: 0; font-size: 0.8rem; color: #7d8d83; }
      .footer-btn { padding: 16px; border-top: 1px solid #e8eee9; margin-top: auto; }
      .btn-daftar { width: 100%; background: #0c8a63; color: #fff; border: none; border-radius: 12px; padding: 14px; font-weight: 600; font-size: 1rem; cursor: pointer; transition: all .2s; }
      .btn-daftar:hover { background: #087554; }
      .btn-daftar.vip { background: #a78bfa; }
      .btn-daftar.vip:hover { background: #9370db; }
      @media (min-width: 768px) { .container-detail { max-width: 100%; border-right: 1px solid #e8eee9; } }
    </style>
  </head>
  <body>
    <div class="container-detail">
      <div class="header-detail">
        <a href="/dashboard" class="back-btn {{ $package['id'] == 3 ? 'vip' : '' }}">
          <i class="fa-solid fa-chevron-left"></i> Detail Paket
        </a>
      </div>

      <div class="package-image {{ $package['id'] == 3 ? 'vip vip-mosque' : '' }}">
        <i class="fa-solid fa-mosque"></i>
      </div>

      <div class="content-detail">
        @if($package['id'] == 3)
        <div class="package-badge vip">PREMIUM</div>
        @endif
        <h1 class="package-title">{{ $package['name'] }}</h1>

        <div class="package-price-section">
          <p class="price-label">Harga</p>
          <p class="price-value {{ $package['id'] == 3 ? 'vip' : '' }}">Rp {{ number_format($package['price'], 0, ',', '.') }}</p>
          <p class="duration-text">{{ $package['duration'] }}</p>
        </div>

        @if($package['id'] == 3)
        <div class="info-section vip">
          <h3 class="info-title">Informasi Paket</h3>
          <div class="info-grid">
            <div class="info-grid-item vip">
              <div class="info-grid-label">Tanggal Berangkat</div>
              <div class="info-grid-value">{{ $package['departure_date'] }}</div>
            </div>
            <div class="info-grid-item vip">
              <div class="info-grid-label">Keberangkatan</div>
              <div class="info-grid-value">{{ $package['departure_airline'] ?? 'Jakarta' }}</div>
            </div>
            <div class="info-grid-item vip">
              <div class="info-grid-label">Lokasi</div>
              <div class="info-grid-value">Makkah & Madinah</div>
            </div>
            <div class="info-grid-item vip">
              <div class="info-grid-label">Hotel</div>
              <div class="info-grid-value">{{ $package['hotel'] }}</div>
            </div>
          </div>
        </div>
        @else
        <div class="info-section">
          <h3 class="info-title">Informasi Paket</h3>
          
          <div class="info-row">
            <div class="info-icon"><i class="fa-solid fa-calendar"></i></div>
            <div class="info-content">
              <p class="info-label">Tanggal Berangkat</p>
              <p class="info-value">{{ $package['departure_date'] }}</p>
            </div>
          </div>

          <div class="info-row">
            <div class="info-icon"><i class="fa-solid fa-map-location-dot"></i></div>
            <div class="info-content">
              <p class="info-label">Keberangkatan</p>
              <p class="info-value">Jakarta</p>
            </div>
          </div>

          <div class="info-row">
            <div class="info-icon"><i class="fa-solid fa-person-hiking"></i></div>
            <div class="info-content">
              <p class="info-label">Lokasi</p>
              <p class="info-value">Makkah dan Madinah</p>
            </div>
          </div>

          <div class="info-row">
            <div class="info-icon"><i class="fa-solid fa-building"></i></div>
            <div class="info-content">
              <p class="info-label">Hotel</p>
              <p class="info-value">{{ $package['hotel'] }}</p>
            </div>
          </div>
        </div>
        @endif

        @if(!empty($package['additional_facilities']))
        <div class="info-section {{ $package['id'] == 3 ? 'vip' : '' }}">
          <h3 class="info-title">{{ $package['id'] == 3 ? 'Fasilitas Eksklusif' : 'Fasilitas Tambahan' }}</h3>
          
          @foreach($package['additional_facilities'] as $facility)
          <div class="info-row">
            <div class="info-icon {{ $package['id'] == 3 ? 'vip' : '' }}"><i class="fa-solid fa-star"></i></div>
            <div class="info-content">
              <p class="info-value">{{ $facility }}</p>
            </div>
          </div>
          @endforeach
        </div>
        @endif

        <div class="info-section {{ $package['id'] == 3 ? 'vip' : '' }}">
          <h3 class="info-title">{{ !empty($package['additional_facilities']) ? 'Fasilitas Utama' : 'Fasilitas' }}</h3>
          
          @foreach($package['main_facilities'] ?? $package['facilities'] as $facility)
          <div class="info-row">
            <div class="info-icon {{ $package['id'] == 3 ? 'vip' : '' }}"><i class="fa-solid fa-check"></i></div>
            <div class="info-content">
              <p class="info-value">{{ $facility }}</p>
            </div>
          </div>
          @endforeach
        </div>

        <div class="info-section {{ $package['id'] == 3 ? 'vip' : '' }}">
          <h3 class="info-title">Itinerary</h3>
          
          @foreach($package['itinerary'] as $item)
          <div class="itinerary-item">
            <div class="itinerary-day {{ $package['id'] == 3 ? 'vip' : '' }}">{{ $item['day'] }}</div>
            <div class="itinerary-content">
              <h5>{{ $item['title'] }}</h5>
              <p>{{ $item['desc'] }}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      <div class="footer-btn">
        <button class="btn-daftar {{ $package['id'] == 3 ? 'vip' : '' }}" onclick="registerPackage({{ $package['id'] }})">Daftar Paket Ini</button>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      function registerPackage(packageId) {
        window.location.href = '/pendaftaran/' + packageId;
      }
    </script>
  </body>
</html>
