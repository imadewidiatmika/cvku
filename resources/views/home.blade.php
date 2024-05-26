<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Platform Pembuatan CV ATS FRIENDLY | Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  </head>
  <body>
    <x-navbar>
      @if(auth()->user() && auth()->user()->is_admin)
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto mt-2 ">
        <li><a href="/" class="nav-link px-2 link-primary">Beranda</a></li>
        <li><a href="/about" class="nav-link fw-bold px-2 link-secondary">Tentang CV ATS</a></li>
        <li><a href="{{ route('admin.index') }}" class="nav-link fw-bold px-2 link-secondary">Dashboard</a></li>
    </ul>
      @else
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto mt-2 ">
          <li><a href="/" class="nav-link px-2 link-primary">Beranda</a></li>
          <li><a href="{{ route('information.index') }}" class="nav-link px-2 link-secondary">Buat CV</a></li>
          <li><a href="/about" class="nav-link fw-bold px-2 link-secondary">Tentang CV ATS</a></li>
      </ul>
      @endif
    </x-navbar>
  <header class="masthead">
    @if(auth()->user() && auth()->user()->is_admin)
    <div class="container">
      <div class="masthead-heading fw-bold">Platform Pembuatan CV ATS FRIENDLY</div>
      <div class="masthead-subheading ">Yuk miliki CV mu Sekarang Juga</div>
      <p class="text-admin">Harap masuk sebagai pengguna untuk membuat CV</p>
    </div>
      @else
      <div class="container">
        <div class="masthead-heading fw-bold">Platform Pembuatan CV ATS FRIENDLY</div>
        <div class="masthead-subheading ">Yuk miliki CV mu Sekarang Juga</div>
        <a class="btn btn-primary btn-xl text-uppercase px-5 p-3" href="{{ route('information.index') }}">Bikin CV</a>
      </div>
      @endif
  </header>
  <section class="page-section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading fw-bolder">Layanan</h2>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                  <img src="img/gratis.svg">
                </span>
                <h4 class="fw-bold">Gratis</h4>
                <p class="text-muted">CV-KU merupakan platform pembuatan CV ATS yang gratis, jadi kamu bisa buat CV tanpa batas</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                  <img src="img/mudah.svg"class="mt-4" height="175" width="175">
                </span>
                <h4 class="fw-bold">Mudah</h4>
                <p class="text-muted">Membuat CV di CV-KU kamu cukup memasukkan data kamu untuk keperluan CV, dan kamu akan segera mendapatkan CV mu</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                  <img src="img/cepat.svg">
                </span>
                <h4 class="fw-bold">Cepat</h4>
                <p class="text-muted">Di CV-KU kamu tidak perlu waktu lama untuk membuat CV , cukup memasukkan data dan dapatkan CV</p>
            </div>
        </div>
    </div>
  </section>

  <footer class="footer py-4">
            <center>Copyright &copy; CV-KU 2023</center>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>