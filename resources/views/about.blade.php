<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Platform Pembuatan CV ATS FRIENDLY | Tentang CV ATS</title>
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
        <li><a href="/" class="nav-link px-2 link-secondary">Beranda</a></li>
        <li><a href="/about" class="nav-link fw-bold px-2 link-primary">Tentang CV ATS</a></li>
        <li><a href="{{ route('admin.index') }}" class="nav-link fw-bold px-2 link-secondary">Dashboard</a></li>
    </ul>
      @else
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto mt-2 ">
          <li><a href="/" class="nav-link px-2 link-secondary">Beranda</a></li>
          <li><a href="{{ route('information.index') }}" class="nav-link px-2 link-secondary">Buat CV</a></li>
          <li><a href="/about" class="nav-link fw-bold px-2 link-primary">Tentang CV ATS</a></li>
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
      @endauth
  </header>
  <div class="container">
    <div class="accordion mt-5" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
              Apa itu CV ATS ?
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            CV ATS adalah Curriculum Vitae yang dioptimalkan untuk Sistem Pelacakan Pelamar. ATS adalah perangkat lunak yang membantu perusahaan mengelola dan menyaring aplikasi perekrutan. CV ATS dirancang untuk melewati filter ATS dengan menggunakan format sederhana, kata kunci yang relevan, dan menghindari elemen desain yang tidak bisa dipahami oleh ATS. Dengan mengoptimalkan CV Anda untuk ATS, Anda meningkatkan peluang untuk dilihat oleh perekrut manusia. Tetaplah menjaga kualitas dan kejelasan CV Anda setelah melewati filter ATS.
          </div>
        </div>
      </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Apa saja keuntungan menggunakan CV ATS friendly dalam mencari pekerjaan?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Keuntungan menggunakan CV ATS friendly adalah meningkatkan peluang CV Anda dilihat oleh perekrut manusia, menghindari penolakan otomatis oleh sistem ATS, meningkatkan efisiensi dalam pengelolaan aplikasi oleh perusahaan, dan memperoleh keunggulan kompetitif dalam proses seleksi.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Bagaimana CV ATS bekerja dalam proses seleksi kandidat?
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              CV ATS bekerja dengan mengumpulkan, menyimpan, dan memindai informasi dari CV yang dikirimkan oleh kandidat. Sistem ini menggunakan algoritma untuk mencocokkan kata kunci, pengalaman, dan kualifikasi dengan persyaratan pekerjaan yang ditentukan oleh perusahaan.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingFive">
            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
              Apakah ada kata kunci umum yang sering dicari oleh sistem ATS dalam CV?
            </button>
          </h2>
          <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Beberapa kata kunci umum yang sering dicari oleh sistem ATS dalam CV meliputi keterampilan spesifik yang relevan dengan pekerjaan yang dilamar, nama perangkat lunak atau alat yang dikuasai, dan istilah industri atau profesi yang terkait.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingSix">
            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
              Apakah penting untuk menyesuaikan CV ATS friendly dengan kata kunci dalam iklan pekerjaan?
            </button>
          </h2>
          <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Ya, sangat penting untuk menyesuaikan CV ATS friendly dengan kata kunci dalam iklan pekerjaan. Kata kunci ini mencerminkan kualifikasi dan persyaratan yang diinginkan oleh perusahaan, dan membuat CV Anda lebih relevan dan terlihat oleh sistem ATS.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingSeven">
            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
              Bagaimana menulis CV ATS friendly jika saya belum memiliki pengalaman kerja?
            </button>
          </h2>
          <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Jika Anda belum memiliki pengalaman kerja, fokuslah pada pendidikan, pelatihan, proyek akademik, kegiatan sukarela, atau prestasi lain yang relevan dengan pekerjaan yang Anda lamar. Sertakan juga keterampilan yang Anda kuasai dan bagaimana Anda dapat mengaplikasikannya dalam konteks pekerjaan yang diinginkan.
            </div>
          </div>
        </div> <div class="accordion-item">
          <h2 class="accordion-header" id="headingEight">
            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
              Apakah ada saran lain untuk meningkatkan efektivitas CV ATS friendly?
            </button>
          </h2>
          <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Selain mengoptimalkan CV Anda untuk ATS, pastikan juga untuk memeriksa ejaan dan tata bahasa, sertakan informasi kontak yang jelas, dan berikan penekanan pada prestasi dan hasil yang relevan dalam pengalaman kerja Anda.
            </div>
          </div>
        </div> <div class="accordion-item">
          <h2 class="accordion-header" id="headingNine">
            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
              Bagaimana cara memastikan CV ATS friendly saya terbaca dengan baik oleh sistem?
            </button>
          </h2>
          <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Untuk memastikan CV ATS friendly terbaca dengan baik oleh sistem, gunakan format teks yang jelas dan terstruktur. Hindari penggunaan gambar, tabel, atau grafik yang kompleks. Verifikasi juga bahwa kata kunci dan informasi penting tercantum dengan jelas dalam teks CV Anda.
            </div>
          </div>
        </div> <div class="accordion-item">
          <h2 class="accordion-header" id="headingTen">
            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
            Apakah perlu mencantumkan semua pengalaman kerja sebelumnya dalam CV ATS friendly?
            </button>
          </h2>
          <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Tidak perlu mencantumkan semua pengalaman kerja sebelumnya dalam CV ATS friendly. Fokuslah pada pengalaman kerja yang relevan dengan pekerjaan yang dilamar. Jika pengalaman sebelumnya tidak relevan, sertakan yang terkait atau soroti keterampilan yang diperoleh.
            </div>
          </div>
        </div>
      </div>
  </div>
  <footer class="footer py-4 mt-5">
            <center>Copyright &copy; CV-KU 2023</center>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>