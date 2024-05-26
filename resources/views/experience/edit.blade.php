<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Platform Pembuatan CV ATS FRIENDLY | Pengalaman</title>
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
        <form action="{{ route('experience.update', $experience) }}" class="form" method="POST">
          @csrf
          @method('PUT')
          <h5 class="fw-bolder">Pengalaman Kerja</h5>
          <p>Mulai dengan pengalaman terakhir kamu</p>
          <div class="row">
            <div class="col">
              <label for="company" class="form-label">Nama Perusahaan</label>
              <input type="text" class="form-control"  aria-label="First name" name="company" id="company" value="{{ $experience->company }}">
              @error('company') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col">
              <label for="position" class="form-label">Jabatan/Magang/Posisi</label>
              <input type="text" class="form-control"  aria-label="Last name" name="position" id="position" value="{{ $experience->position }}">
              @error('position') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-12">
              <label for="location" class="form-label">Lokasi Perusahaan</label>
              <input type="text" class="form-control" name="locationCompany" id="locationCompany" value="{{ $experience->locationCompany }}">
              @error('locationCompany') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mb-1">
              <label for="descCompany" class="form-label">Deskripsi Perusahaan</label>
              <textarea class="form-control" rows="3" name="descCompany" id="descCompany" value="{{ $experience->descCompany }}"></textarea>
              @error('descCompany') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-6">
              <label for="startMonthCompany" class="form-label">Bulan Mulai</label>
              <select class="form-select" id="startMonthCompany" name="startMonthCompany">
                <option selected>Pilih Bulan</option>
                <option value="Januari" {{ $experience->startMonthCompany == 'Januari' ? 'selected' : '' }}>Januari</option>
                <option value="Februari" {{ $experience->startMonthCompany == 'Februari' ? 'selected' : '' }}>Februari</option>
                <option value="Maret" {{ $experience->startMonthCompany == 'Maret' ? 'selected' : '' }}>Maret</option>
                <option value="April" {{ $experience->startMonthCompany == 'April' ? 'selected' : '' }}>April</option>
                <option value="Mei" {{ $experience->startMonthCompany == 'Mei' ? 'selected' : '' }}>Mei</option>
                <option value="Juni" {{ $experience->startMonthCompany == 'Juni' ? 'selected' : '' }}>Juni</option>
                <option value="Juli" {{ $experience->startMonthCompany == 'Juli' ? 'selected' : '' }}>Juli</option>
                <option value="Agustus" {{ $experience->startMonthCompany == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                <option value="September" {{ $experience->startMonthCompany == 'September' ? 'selected' : '' }}>September</option>
                <option value="Oktober" {{ $experience->startMonthCompany == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                <option value="November" {{ $experience->startMonthCompany == 'November' ? 'selected' : '' }}>November</option>
                <option value="Desember" {{ $experience->startMonthCompany == 'Desember' ? 'selected' : '' }}>Desember</option>
            </select>
              @error('startMonthCompany') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-6">
              <label for="startYearCompany" class="form-label">Tahun Mulai</label>
              <select class="form-select" name="startYearCompany" id="startYearCompany">
                <option selected>Pilih Tahun</option>
                @for ($year = date('Y'); $year >= 1990; $year--)
                <option value="{{ $year }}" {{ $experience->startYearCompany == $year ? 'selected' : '' }}>{{ $year }}</option>
                @endfor
              </select>
              @error('startYearCompany') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-6 mb-3">
              <label for="endMonthCompany" class="form-label">Bulan Selesai</label>
              <select class="form-select" id="endMonthCompany" name="endMonthCompany">
                <option selected>Pilih Bulan</option>
                <option value="Januari" {{ $experience->endMonthCompany == 'Januari' ? 'selected' : '' }}>Januari</option>
                <option value="Februari" {{ $experience->endMonthCompany == 'Februari' ? 'selected' : '' }}>Februari</option>
                <option value="Maret" {{ $experience->endMonthCompany == 'Maret' ? 'selected' : '' }}>Maret</option>
                <option value="April" {{ $experience->endMonthCompany == 'April' ? 'selected' : '' }}>April</option>
                <option value="Mei" {{ $experience->endMonthCompany == 'Mei' ? 'selected' : '' }}>Mei</option>
                <option value="Juni" {{ $experience->endMonthCompany == 'Juni' ? 'selected' : '' }}>Juni</option>
                <option value="Juli" {{ $experience->endMonthCompany == 'Juli' ? 'selected' : '' }}>Juli</option>
                <option value="Agustus" {{ $experience->endMonthCompany == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                <option value="September" {{ $experience->endMonthCompany == 'September' ? 'selected' : '' }}>September</option>
                <option value="Oktober" {{ $experience->endMonthCompany == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                <option value="November" {{ $experience->endMonthCompany == 'November' ? 'selected' : '' }}>November</option>
                <option value="Desember" {{ $experience->endMonthCompany == 'Desember' ? 'selected' : '' }}>Desember</option>
            </select>
              @error('endMonthCompany') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-6">
              <label for="endYearCompany" class="form-label">Tahun Selesai</label>
              <select class="form-select" name="endYearCompany" id="endYearCompany">
                <option selected>Pilih Tahun</option>
                @for ($year = date('Y'); $year >= 1990; $year--)
                <option value="{{ $year }}" {{ $experience->endYearCompany == $year ? 'selected' : '' }}>{{ $year }}</option>
                @endfor
              </select>
              @error('endYearCompany') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="row">
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="isActiveCompany" id="isActiveCompany">
                  <label class="form-check-label" for="isActiveCompany">
                    <h6 class="p-2">Saat ini saya masih aktif di sini</h6>
                  </label>
                </div>
              </div>
            </div>
            <div class="col-12">
              <label for="portfolioWork" class="form-label">Portofolio Kerja dan Prestasi</label>
              <textarea class="form-control" rows="3" name="portfolioWork" id="portfolioWork">{{ $experience->portfolioWork }}</textarea>
              @error('portfolioWork') <span class="error">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="col-12 step d-flex justify-content-between mt-3">
            <button type="reset" class="btn btn-outline-primary text-uppercase btn-prev">Batal</button>
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
                .create(document.querySelector('#portfolioWork'))
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


