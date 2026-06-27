<nav class="navbar navbar-expand-lg navbar-public fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
      <span class="brand-logo"><i class="fa-solid fa-mosque"></i></span>
      <span class="brand-text">Smart <span class="text-success">Umrah</span></span>
    </a>

    <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-label="Menu">
      <i class="fa-solid fa-bars text-success" style="font-size:22px"></i>
    </button>

    <div class="collapse navbar-collapse justify-content-end d-none d-lg-flex align-items-center">
      <ul class="navbar-nav me-3 mb-2 mb-lg-0 gap-1">
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#paket">Paket</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#fitur">Fitur</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#testimoni">Testimoni</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#kontak">Kontak</a></li>
      </ul>

      @guest
        <div class="d-flex align-items-center gap-2 ms-2">
          <a href="{{ route('login') }}" class="btn btn-outline-success btn-sm px-3">Masuk</a>
          <a href="{{ route('register') }}" class="btn btn-success btn-sm px-3">Daftar</a>
        </div>
      @else
        <div class="dropdown ms-2">
          <button class="btn btn-light btn-sm dropdown-toggle d-flex align-items-center gap-2 px-2 py-1" data-bs-toggle="dropdown">
            <span class="avatar-sm">{{ strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</span>
            <span class="d-none d-xl-inline">{{ \Illuminate\Support\Str::limit(auth()->user()->name, 14) }}</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end shadow border-0">
            @if(auth()->user()->isAdmin())
              <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-gauge me-2 text-success"></i> Dashboard Admin</a></li>
            @else
              <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="fa-solid fa-gauge me-2 text-success"></i> Dashboard</a></li>
            @endif
            <li><hr class="dropdown-divider"></li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item text-danger"><i class="fa-solid fa-right-from-bracket me-2"></i> Keluar</button>
              </form>
            </li>
          </ul>
        </div>
      @endguest
    </div>
  </div>

  <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">
    <div class="offcanvas-header border-bottom">
      <h5 class="offcanvas-title text-success fw-bold"><i class="fa-solid fa-mosque me-2"></i>Smart Umrah</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="list-unstyled">
        <li class="py-2"><a href="{{ route('home') }}" class="text-dark text-decoration-none fw-medium"><i class="fa-solid fa-house me-2 text-success"></i>Beranda</a></li>
        <li class="py-2"><a href="{{ route('home') }}#paket" class="text-dark text-decoration-none fw-medium"><i class="fa-solid fa-suitcase-rolling me-2 text-success"></i>Paket Umrah</a></li>
        <li class="py-2"><a href="{{ route('home') }}#fitur" class="text-dark text-decoration-none fw-medium"><i class="fa-solid fa-star me-2 text-success"></i>Fitur</a></li>
        <li class="py-2"><a href="{{ route('home') }}#testimoni" class="text-dark text-decoration-none fw-medium"><i class="fa-solid fa-comment-dots me-2 text-success"></i>Testimoni</a></li>
        <li class="py-2"><a href="{{ route('home') }}#kontak" class="text-dark text-decoration-none fw-medium"><i class="fa-solid fa-envelope me-2 text-success"></i>Kontak</a></li>
      </ul>
      @guest
        <div class="mt-4 d-grid gap-2">
          <a href="{{ route('login') }}" class="btn btn-outline-success">Masuk</a>
          <a href="{{ route('register') }}" class="btn btn-success">Daftar Sekarang</a>
        </div>
      @else
        <div class="mt-4 d-grid gap-2">
          @if(auth()->user()->isAdmin())
            <a href="{{ route('admin.dashboard') }}" class="btn btn-success"><i class="fa-solid fa-gauge me-2"></i> Dashboard Admin</a>
          @else
            <a href="{{ route('dashboard') }}" class="btn btn-success"><i class="fa-solid fa-gauge me-2"></i> Dashboard</a>
          @endif
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-right-from-bracket me-2"></i> Keluar</button>
          </form>
        </div>
      @endguest
    </div>
  </div>
</nav>

<style>
  /* Override Bootstrap default agar navbar ramping */
  #mainNav.navbar { padding: 6px 0 !important; min-height: 56px; }
  #mainNav .container { max-width: 1200px; }
  #mainNav .navbar-brand { padding: 0 !important; margin: 0 !important; }
  .navbar-public { transition: all .3s ease; background: rgba(255,255,255,0.96); backdrop-filter: blur(10px); box-shadow: 0 1px 0 rgba(0,0,0,0.04); }
  .navbar-public.scrolled { box-shadow: 0 2px 16px rgba(0,0,0,0.06); }
  .navbar-public .brand-logo { width: 32px; height: 32px; border-radius: 9px; background: linear-gradient(135deg, #0c8a63, #087554); color: #fff; display: grid; place-items: center; font-size: .9rem; box-shadow: 0 4px 12px rgba(12,138,99,0.28); }
  .navbar-public .brand-text { font-weight: 800; font-size: 1rem; color: #1b1b18; }
  .navbar-public .navbar-nav { gap: 2px !important; }
  .navbar-public .nav-link { font-weight: 600; color: #4b5563 !important; border-radius: 8px; padding: 5px 11px !important; transition: all .2s; font-size: .9rem; }
  .navbar-public .nav-link:hover { color: #0c8a63 !important; background: #f0f5f3; }
  .navbar-public .btn-sm { font-size: .83rem; padding: 5px 14px !important; border-radius: 9px; }
  .avatar-sm { width: 30px; height: 30px; border-radius: 50%; background: linear-gradient(135deg, #0c8a63, #087554); color: #fff; display: grid; place-items: center; font-weight: 700; font-size: .75rem; }
  .navbar-public .dropdown-toggle::after { font-size: .7rem; margin-left: 4px; }
</style>
