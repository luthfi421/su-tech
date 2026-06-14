<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Jamaah - Smart Umrah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
      * { margin: 0; padding: 0; box-sizing: border-box; }
      body { background: #f5f5f5; color: #1b1b18; font-family: "Segoe UI", sans-serif; }
      .top-navbar { background: #fff; padding: 16px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 2px 8px rgba(0,0,0,0.08); position: sticky; top: 0; z-index: 100; }
      .navbar-left { display: flex; align-items: center; gap: 16px; flex: 1; }
      .navbar-toggle { background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #333; display: none; }
      .navbar-brand { display: flex; align-items: center; gap: 8px; text-decoration: none; color: #0c8a63; font-weight: 700; font-size: 1rem; }
      .navbar-brand i { font-size: 1.25rem; }
      .navbar-right { display: flex; align-items: center; gap: 12px; }
      .profile-btn { background: #0c8a63; border: none; width: 40px; height: 40px; border-radius: 50%; color: #fff; cursor: pointer; display: grid; place-items: center; font-size: 1.1rem; transition: all .2s; }
      .profile-btn:hover { background: #087554; }
      .sidebar { width: 280px; background: #fff; padding: 20px; border-right: 1px solid #e8eee9; max-height: calc(100vh - 64px); overflow-y: auto; position: sticky; top: 64px; display: flex; flex-direction: column; }
      .sidebar.show { display: flex; }
      .sidebar-image { display: none; }
      .brand { display: flex; align-items: center; gap: 10px; margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #e8eee9; }
      .brand-icon { width: 40px; height: 40px; border-radius: 10px; background: #0c8a63; display: grid; place-items: center; color: #fff; font-size: 1.25rem; flex-shrink: 0; }
      .brand-text h3 { margin: 0; font-size: 0.95rem; font-weight: 700; color: #0c8a63; }
      .brand-text p { margin: 0; font-size: 0.75rem; color: #7d8d83; }
      .menu-section { margin-bottom: 18px; }
      .menu-section:last-of-type { margin-bottom: 0; }
      .menu-title { font-size: 0.7rem; font-weight: 700; text-transform: uppercase; color: #9ca9a2; margin-bottom: 10px; letter-spacing: .06em; }
      .menu-list { list-style: none; }
      .menu-list li { margin-bottom: 6px; }
      .menu-list a { display: flex; align-items: center; gap: 12px; padding: 10px 14px; border-radius: 8px; color: #6b7570; text-decoration: none; transition: all .2s; font-weight: 500; font-size: 0.9rem; }
      .menu-list a:hover { background: #f0f5f3; color: #0c8a63; }
      .menu-list a.active { background: #0c8a63; color: #fff; }
      .menu-list i { width: 18px; text-align: center; }
      .sidebar-footer { margin-top: auto; padding-top: 16px; border-top: 1px solid #e8eee9; }
      .profile-card { background: #f7fff8; border-radius: 12px; padding: 12px; display: flex; align-items: center; gap: 10px; }
      .profile-avatar { width: 40px; height: 40px; border-radius: 10px; background: #0c8a63; display: grid; place-items: center; color: #fff; font-weight: 700; font-size: 0.85rem; flex-shrink: 0; }
      .profile-info h5 { margin: 0; font-size: 0.85rem; font-weight: 700; color: #1b1b18; }
      .profile-info p { margin: 0; font-size: 0.7rem; color: #9ca9a2; }
      .profile-status { width: 8px; height: 8px; border-radius: 50%; background: #0c8a63; margin-left: auto; }
      .main-content { flex: 1; padding: 20px; overflow-y: auto; }
      .dashboard-header { margin-bottom: 20px; }
      .dashboard-title { font-size: 1.5rem; font-weight: 700; margin-bottom: 4px; }
      .dashboard-greeting { color: #7d8d83; font-size: 0.95rem; }
      .package-selected-card { background: #fff; border-radius: 16px; padding: 20px; margin-bottom: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); display: flex; gap: 16px; align-items: flex-start; }
      .package-selected-icon { width: 50px; height: 50px; background: #e8f5f0; border-radius: 12px; display: grid; place-items: center; color: #0c8a63; font-size: 1.5rem; flex-shrink: 0; }
      .package-selected-content { flex: 1; }
      .package-selected-label { color: #7d8d83; font-size: 0.8rem; margin-bottom: 4px; }
      .package-selected-title { font-size: 1.1rem; font-weight: 700; margin-bottom: 4px; }
      .package-selected-desc { color: #7d8d83; font-size: 0.85rem; }
      .stats-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px; }
      .stat-card { background: #fff; border-radius: 16px; padding: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); }
      .stat-label { color: #7d8d83; font-size: 0.8rem; margin-bottom: 8px; }
      .stat-value { font-size: 1rem; font-weight: 700; margin-bottom: 8px; }
      .stat-footer { color: #7d8d83; font-size: 0.75rem; }
      .packages-section h3 { margin: 20px 0; font-size: 1.1rem; font-weight: 700; }
      .packages-grid { display: grid; grid-template-columns: 1fr; gap: 16px; }
      .package-card { border-radius: 16px; padding: 16px; color: #fff; box-shadow: 0 4px 16px rgba(0,0,0,0.1); }
      .package-card.silver { background: linear-gradient(135deg, #0c8a63, #087554); }
      .package-card.gold { background: linear-gradient(135deg, #d4a137, #b8860b); }
      .package-card.platinum { background: linear-gradient(135deg, #9370db, #8b5fbf); }
      .package-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px; }
      .package-name h5 { margin: 0 0 4px; font-size: 0.95rem; font-weight: 700; }
      .package-name p { margin: 0; font-size: 0.75rem; opacity: 0.9; }
      .package-price { text-align: right; }
      .package-price p { margin: 0; font-size: 0.75rem; opacity: 0.9; }
      .package-price h4 { margin: 0; font-size: 1.1rem; font-weight: 700; }
      .package-details { font-size: 0.8rem; opacity: 0.95; margin-bottom: 12px; line-height: 1.5; }
      .package-details li { list-style: none; margin-bottom: 6px; }
      .package-details li:before { content: "✓ "; margin-right: 6px; }
      .package-btn { background: rgba(255, 255, 255, 0.3); color: #fff; border: 1px solid rgba(255, 255, 255, 0.5); border-radius: 10px; padding: 8px 16px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; transition: all .2s; font-size: 0.85rem; }
      .package-btn:hover { background: rgba(255, 255, 255, 0.5); }
      @media (max-width: 768px) { .navbar-toggle { display: block; } .sidebar { position: fixed; left: 0; top: 64px; width: 100%; height: calc(100vh - 64px); background: #fff; z-index: 50; transform: translateX(-100%); transition: transform .3s; } .sidebar.show { transform: translateX(0); } .stats-row { grid-template-columns: 1fr; } .main-content { padding: 16px; } .package-details li { margin-bottom: 4px; } .packages-grid { gap: 12px; } }
      @media (min-width: 769px) { .navbar-toggle { display: none; } .sidebar { position: relative; display: flex !important; transform: none !important; width: 280px; } }
    </style>
  </head>
  <body>
    <nav class="top-navbar">
      <div class="navbar-left">
        <button class="navbar-toggle" id="sidebarToggle" onclick="toggleSidebar()">
          <i class="fa-solid fa-bars"></i>
        </button>
        <a href="/" class="navbar-brand">
          <i class="fa-solid fa-compass"></i>
          Smart Umrah
        </a>
      </div>
      <div class="navbar-right">
        <button class="profile-btn" onclick="openProfile()">
          <i class="fa-solid fa-user"></i>
        </button>
      </div>
    </nav>

    <div style="display: flex;">
      <aside class="sidebar" id="sidebar">
        <div class="sidebar-image"><i class="fa-solid fa-compass"></i></div>
        
        <div class="brand">
          <div class="brand-icon"><i class="fa-solid fa-compass"></i></div>
          <div class="brand-text">
            <h3>Smart Umrah</h3>
            <p>Portal Jamaah</p>
          </div>
        </div>

        <div class="menu-section">
          <p class="menu-title">Menu Utama</p>
          <ul class="menu-list">
            <li><a href="#"><i class="fa-solid fa-home"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa-solid fa-briefcase"></i> Pilih Paket</a></li>
            <li><a href="#" class="active"><i class="fa-solid fa-id-card"></i> Data Diri</a></li>
            <li><a href="#"><i class="fa-solid fa-credit-card"></i> Pembayaran</a></li>
            <li><a href="#"><i class="fa-solid fa-file-lines"></i> Status Pendaftaran</a></li>
          </ul>
        </div>

        <div class="menu-section">
          <p class="menu-title">Bantuan</p>
          <ul class="menu-list">
            <li><a href="#"><i class="fa-brands fa-whatsapp"></i> Hubungi Admin</a></li>
            <li><a href="#"><i class="fa-solid fa-circle-question"></i> Bantuan & FAQ</a></li>
          </ul>
        </div>

        <div class="sidebar-footer">
          <div class="profile-card">
            <div class="profile-avatar">AF</div>
            <div class="profile-info">
              <h5>Ahmad Fauzi</h5>
              <p>Jamaah Terdaftar</p>
            </div>
            <div class="profile-status"></div>
          </div>
        </div>
      </aside>

      <main class="main-content">
        <div class="dashboard-header">
          <h1 class="dashboard-title">Dashboard</h1>
          <p class="dashboard-greeting">Selamat datang kembali, Ahmad Fauzi</p>
        </div>

        <div class="package-selected-card">
          <div class="package-selected-icon">
            <i class="fa-solid fa-briefcase"></i>
          </div>
          <div class="package-selected-content">
            <p class="package-selected-label">Paket</p>
            <h3 class="package-selected-title">Belum Ada</h3>
            <p class="package-selected-desc">Silakan pilih paket umrah</p>
          </div>
        </div>

        <div class="stats-row">
          <div class="stat-card">
            <p class="stat-label">Status Pembayaran</p>
            <h4 class="stat-value" style="color:#0c8a63">Menunggu</h4>
            <p class="stat-footer">Pembayaran belum dilakukan</p>
          </div>
          <div class="stat-card">
            <p class="stat-label">Status Verifikasi</p>
            <h4 class="stat-value" style="color:#0099ff">Belum Diverifikasi</h4>
            <p class="stat-footer">Ajukan verifikasi untuk melanjutkan</p>
          </div>
        </div>

        <div class="packages-section">
          <h3>Pilih Paket Umrah</h3>
          <div class="packages-grid">
            <div class="package-card silver">
              <div class="package-header">
                <div class="package-name">
                  <h5>Paket Silver</h5>
                  <p>Durasi: 9 hari</p>
                </div>
                <div class="package-price">
                  <p>Rp</p>
                  <h4>25.000.000</h4>
                </div>
              </div>
              <div class="package-details">
                <p style="margin-bottom:12px;"><strong>Fasilitas Paket:</strong></p>
                <ul>
                  <li>Hotel Bintang 2 Makkah (3 Malam)</li>
                  <li>Hotel Bintang 2 Madinah (3 Malam)</li>
                  <li>Penerbangan PP Jakarta</li>
                  <li>Asuransi Perjalanan</li>
                </ul>
              </div>
              <a href="/paket/1" class="package-btn"><i class="fa-solid fa-arrow-right"></i> Lihat Paket</a>
            </div>

            <div class="package-card gold">
              <div class="package-header">
                <div class="package-name">
                  <h5>Paket Gold</h5>
                  <p>Durasi: 11 hari</p>
                </div>
                <div class="package-price">
                  <p>Rp</p>
                  <h4>35.000.000</h4>
                </div>
              </div>
              <div class="package-details">
                <p style="margin-bottom:12px;"><strong>Fasilitas Paket:</strong></p>
                <ul>
                  <li>Hotel Bintang 3 Makkah (4 Malam)</li>
                  <li>Hotel Bintang 3 Madinah (4 Malam)</li>
                  <li>Penerbangan PP Jakarta</li>
                  <li>Asuransi Perjalanan + Visa</li>
                  <li>Free Umroh + Shopping</li>
                </ul>
              </div>
              <a href="/paket/2" class="package-btn"><i class="fa-solid fa-arrow-right"></i> Lihat Paket</a>
            </div>

            <div class="package-card platinum">
              <div class="package-header">
                <div class="package-name">
                  <h5>Paket Platinum</h5>
                  <p>Durasi: 14 hari</p>
                </div>
                <div class="package-price">
                  <p>Rp</p>
                  <h4>50.000.000</h4>
                </div>
              </div>
              <div class="package-details">
                <p style="margin-bottom:12px;"><strong>Fasilitas Paket Premium:</strong></p>
                <ul>
                  <li>Hotel Bintang 4 Makkah (5 Malam)</li>
                  <li>Hotel Bintang 4 Madinah (5 Malam)</li>
                  <li>Penerbangan PP Jakarta (Bussiness Class)</li>
                  <li>Asuransi Perjalanan + Visa Premium</li>
                  <li>Free Umroh + Shopping + Tour Guide Pribadi</li>
                </ul>
              </div>
              <a href="/paket/3" class="package-btn"><i class="fa-solid fa-arrow-right"></i> Lihat Paket</a>
            </div>
          </div>
        </div>
      </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('show');
      }
      
      function openProfile() {
        alert('Profile menu - Coming soon');
      }
      
      // Close sidebar when clicking on a menu item
      document.querySelectorAll('.menu-list a').forEach(link => {
        link.addEventListener('click', function() {
          const sidebar = document.getElementById('sidebar');
          if (window.innerWidth <= 768) {
            sidebar.classList.remove('show');
          }
        });
      });
    </script>
  </body>
</html>
