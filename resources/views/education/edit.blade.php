<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Platform Pembuatan CV ATS FRIENDLY | Pendidikan</title>
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
            @include('components.educationbread')
        <form action="{{ route('education.update', $education) }}" class="form" method="POST">
          @csrf
          @method('PUT')
          <h5 class="fw-bolder">Pengalaman Kerja</h5>
          <p>Mulai dengan pengalaman terakhir kamu</p>
          <div class="row">
            <div class="col-12">
              <label for="school" class="form-label">Nama Sekolah/Universitas</label>
              <input type="text" class="form-control" id="school" name="school" value="{{ $education->school }}">
              @error('school') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-12">
              <label for="locationSchool" class="form-label">Lokasi Sekolah/Universitas</label>
              <input type="text" class="form-control" id="locationSchool" name="locationSchool" value="{{ $education->locationSchool }}">
              @error('locationSchool') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-6">
              <label for="startMonthSchool" class="form-label">Bulan Mulai</label>
              <select class="form-select" id="startMonthSchool" name="startMonthSchool">
                <option selected>Pilih Bulan</option>
                <option value="Januari" {{ $education->startMonthSchool == 'Januari' ? 'selected' : '' }}>Januari</option>
                <option value="Februari" {{ $education->startMonthSchool == 'Februari' ? 'selected' : '' }}>Februari</option>
                <option value="Maret" {{ $education->startMonthSchool == 'Maret' ? 'selected' : '' }}>Maret</option>
                <option value="April" {{ $education->startMonthSchool == 'April' ? 'selected' : '' }}>April</option>
                <option value="Mei" {{ $education->startMonthSchool == 'Mei' ? 'selected' : '' }}>Mei</option>
                <option value="Juni" {{ $education->startMonthSchool == 'Juni' ? 'selected' : '' }}>Juni</option>
                <option value="Juli" {{ $education->startMonthSchool == 'Juli' ? 'selected' : '' }}>Juli</option>
                <option value="Agustus" {{ $education->startMonthSchool == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                <option value="September" {{ $education->startMonthSchool == 'September' ? 'selected' : '' }}>September</option>
                <option value="Oktober" {{ $education->startMonthSchool == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                <option value="November" {{ $education->startMonthSchool == 'November' ? 'selected' : '' }}>November</option>
                <option value="Desember" {{ $education->startMonthSchool == 'Desember' ? 'selected' : '' }}>Desember</option>
            </select>
            
              @error('startMonthSchool') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-6">
              <label for="startYearSchool" class="form-label">Tahun Mulai</label>
              <select class="form-select" id="startYearSchool" name="startYearSchool"">
                <option selected>Pilih Tahun</option>
                @for ($year = date('Y'); $year >= 1990; $year--)
                <option value="{{ $year }}" {{ $education->startYearSchool == $year ? 'selected' : '' }}>{{ $year }}</option>
                @endfor
              </select>
              @error('startYearSchool') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-6 mb-3">
              <label for="endMonthSchool" class="form-label">Bulan Selesai</label>
              <select class="form-select" id="endMonthSchool" name="endMonthSchool">
                <option selected>Pilih Bulan</option>
                <option value="Januari" {{ $education->endMonthSchool == 'Januari' ? 'selected' : '' }}>Januari</option>
                <option value="Februari" {{ $education->endMonthSchool == 'Februari' ? 'selected' : '' }}>Februari</option>
                <option value="Maret" {{ $education->endMonthSchool == 'Maret' ? 'selected' : '' }}>Maret</option>
                <option value="April" {{ $education->endMonthSchool == 'April' ? 'selected' : '' }}>April</option>
                <option value="Mei" {{ $education->endMonthSchool == 'Mei' ? 'selected' : '' }}>Mei</option>
                <option value="Juni" {{ $education->endMonthSchool == 'Juni' ? 'selected' : '' }}>Juni</option>
                <option value="Juli" {{ $education->endMonthSchool == 'Juli' ? 'selected' : '' }}>Juli</option>
                <option value="Agustus" {{ $education->endMonthSchool == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                <option value="September" {{ $education->endMonthSchool == 'September' ? 'selected' : '' }}>September</option>
                <option value="Oktober" {{ $education->endMonthSchool == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                <option value="November" {{ $education->endMonthSchool == 'November' ? 'selected' : '' }}>November</option>
                <option value="Desember" {{ $education->endMonthSchool == 'Desember' ? 'selected' : '' }}>Desember</option>
            </select>
            
              @error('endMonthSchool') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-6">
              <label for="endYearSchool" class="form-label">Tahun Selesai</label>
              <select class="form-select" id="endYearSchool" name="endYearSchool">
                <option selected>Pilih Tahun</option>
                @for ($year = date('Y'); $year >= 1990; $year--)
                <option value="{{ $year }}" {{ $education->endYearSchool == $year ? 'selected' : '' }}>{{ $year }}</option>
                @endfor
              </select>
              @error('endYearSchool') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="row">
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="isActiveEducation">
                  <label class="form-check-label" for="isActiveEducation">
                    <h6 class="p-2">Saat ini saya masih aktif di sini</h6>
                  </label>
                </div>
              </div>
            </div>
            <div class="col-6">
              <label for="lastEdu" class="form-label">Pendidikan</label>
              <input type="text" class="form-control" placeholder="Srata 1" id="lastEdu" name="lastEdu" value="{{ $education->lastEdu }}">
              @error('lastEdu') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-6">
              <label for="major" class="form-label">Jurusan</label>
              <input type="text" class="form-control" placeholder="Sistem Informasi" name="major" id="major" value="{{ $education->major }}">
              @error('major') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-12">
              <label for="ipk" class="form-label">IPK (Opsional namun disarankan)</label>
              <input type="text" class="form-control" name="ipk" id="ipk" value="{{ $education->ipk }}">
              @error('ipk') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-12" wire:ignore>
              <label for="activity" class="form-label">Aktivitas dan Pencapaian</label>
              <textarea class="form-control" rows="3" name="activity" id="activity">{{ $education->activity }}</textarea>
              @error('activity') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-12">
              <label for="linkSertif" class="form-label"><i class="fas fa-link" aria-hidden="true"></i> Link Sertifikat (Opsional)</label>
              <input type="text" class="form-control" id="linkSertif" name="linkSertif" value="{{ $education->linkSertif }}">
              @error('linkSertif') <span class="error">{{ $message }}</span> @enderror
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
                .create(document.querySelector('#activity'))
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


