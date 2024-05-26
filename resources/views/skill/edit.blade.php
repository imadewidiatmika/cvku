<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Platform Pembuatan CV ATS FRIENDLY | Informasi Pribadi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="../../css/form.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  </head>
  <body>
    <div class="container">
          <div class="row">
            <x-navbar>
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto mt-2 ">
                  <li><a href="/" class="nav-link px-2 link-secondary">Beranda</a></li>
                  <li><a href="/makecv" class="nav-link px-2 link-primary">Buat CV</a></li>
                  <li><a href="/about" class="nav-link fw-bold px-2 link-secondary">Tentang CV ATS</a></li>
              </ul>
            </x-navbar>
            @include('components.skillbread')
            <form action="{{ route('skill.update', $skill) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                      <h5 class="fw-bolder">Kemampuan</h5>
                      <p>Tulis kemampuan sesuai sama yang kamu bisa agar recruiter tertarik ya</p>
                            <div class="col-12">
                              <label for="skill" class="form-label">Kemampuan</label>
                              <input type="text" class="form-control" name="skill" value="{{ $skill->skill }}">
                              @error('skills') <span class="error">{{ $message }}</span> @enderror
                            </div>
                      <div class="col-12 step d-flex justify-content-between mt-3">
                        <button type="reset" class="btn btn-outline-primary text-uppercase btn-prev">Batal</button>
                        <button type="submit" class="btn btn-primary ml-auto text-uppercase btn-next">Perbarui</button>
                      </div>
              </form>
          </div>
      </div>
      <footer class="footer py-4 ">
        <center>Copyright &copy; CV-KU 2023</center>
      </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
      
    </body>
</html>


