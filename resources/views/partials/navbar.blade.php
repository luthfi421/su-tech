<nav class="navbar navbar-expand-lg bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand nav-brand" href="/">Smart Umrah</a>

    <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon d-inline-block" style="width:24px;height:18px;">
        <i class="fa-solid fa-bars text-success" style="font-size:20px"></i>
      </span>
    </button>

    <div class="collapse navbar-collapse justify-content-end d-none d-lg-flex">
      <ul class="navbar-nav me-3 mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link text-dark" href="#">Beranda</a></li>
        <li class="nav-item"><a class="nav-link text-dark" href="#paket">Paket</a></li>
        <li class="nav-item"><a class="nav-link text-dark" href="#tentang">Tentang Kami</a></li>
      </ul>

      <div class="d-flex align-items-center gap-2">
        <a href="{{ url('/login') }}" class="btn btn-outline-success btn-sm">Login</a>
        <a href="{{ url('/register') }}" class="btn btn-success btn-sm">Daftar Sekarang</a>
      </div>
    </div>
  </div>

  <!-- Offcanvas Mobile Menu -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title nav-brand" id="mobileMenuLabel">Smart Umrah</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column justify-content-between">
      <div>
        <ul class="list-unstyled">
          <li class="py-2"><a href="#" class="text-dark text-decoration-none"><i class="fa-solid fa-house me-2"></i>Beranda</a></li>
          <li class="py-2"><a href="#paket" class="text-dark text-decoration-none"><i class="fa-solid fa-suitcase-rolling me-2"></i>Paket</a></li>
          <li class="py-2"><a href="#tentang" class="text-dark text-decoration-none"><i class="fa-solid fa-circle-info me-2"></i>Tentang Kami</a></li>
        </ul>

        <div class="mt-4">
          <a href="{{ url('/login') }}" class="btn btn-outline-success w-100 mb-3">Login</a>
          <a href="{{ url('/register') }}" class="btn btn-success w-100">Daftar Sekarang</a>
        </div>
      </div>

      <div class="mt-4 text-center">
        <a href="#" class="text-muted me-3"><i class="fa-brands fa-facebook fa-lg"></i></a>
        <a href="#" class="text-muted me-3"><i class="fa-brands fa-instagram fa-lg"></i></a>
        <a href="#" class="text-muted"><i class="fa-brands fa-whatsapp fa-lg"></i></a>
      </div>
    </div>
  </div>
</nav>
