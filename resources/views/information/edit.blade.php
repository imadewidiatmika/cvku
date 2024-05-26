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
    @livewireStyles
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
            @include('components.informationbread')
        <form action="{{ route('information.update', $information) }}" class="form" method="POST">
          @csrf
          @method('PUT')

          <h5 class="fw-bolder">Informasi Pribadi</h5>
          <p>Bantu recruiter mengenal kamu</p>
          <div class="col-12">
            <label for="name" class="form-label">Nama </label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $information->name }}">
            @error('name') <span class="error">{{ $message }}</span> @enderror
          </div>
          <div class="col-12">
            <label for="phoneNum" class="form-label">Nomor Handphone (Mobile)</label>
            <input type="text" class="form-control" id="phoneNum" name="phoneNum" value="{{ $information->phoneNum }}">
            @error('phoneNum') <span class="error">{{ $message }}</span> @enderror
          </div>
          <div class="col-12">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $information->email }}">
            @error('email') <span class="error">{{ $message }}</span> @enderror
          </div>
          <div class="col-12">
            <label for="profesion" class="form-label">Profesi</label>
            <input type="text" class="form-control" id="profesion" name="profesion" value="{{ $information->profesion }}">
            @error('profesion') <span class="error">{{ $message }}</span> @enderror
          </div>
          <div class="col-12">
            <label for="linked" class="form-label">LinkedIn Profile URL </label>
            <input type="text" class="form-control" id="linked" name="linked" value="{{ $information->linked }}">
            @error('linked') <span class="error">{{ $message }}</span> @enderror
          </div>
          <div class="col-12">
            <label for="portfolio" class="form-label">Portfolio/Website URL </label>
            <input type="text" class="form-control" id="portfolio" name="portfolio" value="{{ $information->portfolio }}">
            @error('portfolio') <span class="error">{{ $message }}</span> @enderror
          </div>
          <div class="col-12">
            <label for="address" class="form-label">Alamat </label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $information->address }}">
            @error('address') <span class="error">{{ $message }}</span> @enderror
          </div>
          <div class="mb-3">
            <label for="desc" class="form-label">Deskripsi singkat tentang kamu</label>
            <textarea class="form-control" id="desc" name="desc" rows="3">{{ $information->desc }}</textarea>
            @error('desc') <span class="error">{{ $message }}</span> @enderror
          </div>
          <div class="col-12 step d-flex justify-content-between">
            <button type="reset" class="btn btn-outline-primary text-uppercase btn-prev">Reset</button>
            <button type="submit" class="btn btn-primary ml-auto text-uppercase btn-next">Perbarui</button>
          </div>
        </form>
      </div>
      <footer class="footer py-4 ">
        <center>Copyright &copy; CV-KU 2023</center>
      </footer>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor
                .create(document.querySelector('#desc'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        });
        </script>
        
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
      @livewireScripts
    </body>
</html>


