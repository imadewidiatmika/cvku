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
    <link rel="stylesheet" href="../css/form.css" />
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
            <form action="{{ route('education.store') }}" class="form" method="POST">
              @csrf
                    <h5 class="fw-bolder">Pendidikan</h5>
                    <p>Mulai dari pendidikan terakhir kamu ya</p>
                    <div class="row">
                          <div class="col-12">
                            <label for="school" class="form-label">Nama Sekolah/Universitas</label>
                            <input type="text" class="form-control" name="school" id="school" value="{{ old('school') }}">
                            @error('school') <span class="error">{{ $message }}</span> @enderror
                          </div>
                          <div class="col-12">
                            <label for="locationSchool" class="form-label">Lokasi Sekolah/Universitas</label>
                            <input type="text" class="form-control" name="locationSchool" id="locationSchool" value="{{ old('locationSchool') }}">
                            @error('locationSchool') <span class="error">{{ $message }}</span> @enderror
                          </div>
                          <div class="col-6">
                            <label for="startMonthSchool" class="form-label">Bulan Mulai</label>
                            <select class="form-select" name="startMonthSchool" id="startMonthSchool" >
                              <option selected>Pilih Bulan</option>
                              <option value="Januari" {{ old('startMonthSchool') == 'Januari' ? 'selected' : '' }}>Januari</option>
                              <option value="Februari" {{ old('startMonthSchool') == 'Februari' ? 'selected' : '' }}>Februari</option>
                              <option value="Maret" {{ old('startMonthSchool') == 'Maret' ? 'selected' : '' }}>Maret</option>
                              <option value="April" {{ old('startMonthSchool') == 'April' ? 'selected' : '' }}>April</option>
                              <option value="Mei" {{ old('startMonthSchool') == 'Mei' ? 'selected' : '' }}>Mei</option>
                              <option value="Juni" {{ old('startMonthSchool') == 'Juni' ? 'selected' : '' }}>Juni</option>
                              <option value="Juli" {{ old('startMonthSchool') == 'Juli' ? 'selected' : '' }}>Juli</option>
                              <option value="Agustus" {{ old('startMonthSchool') == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                              <option value="September" {{ old('startMonthSchool') == 'September' ? 'selected' : '' }}>September</option>
                              <option value="Oktober" {{ old('startMonthSchool') == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                              <option value="November" {{ old('startMonthSchool') == 'November' ? 'selected' : '' }}>November</option>
                              <option value="Desember" {{ old('startMonthSchool') == 'Desember' ? 'selected' : '' }}>Desember</option>
                            </select>
                            @error('startMonthSchool') <span class="error">{{ $message }}</span> @enderror
                          </div>
                          <div class="col-6">
                            <label for="startYearSchool" class="form-label">Tahun Mulai</label>
                            <select class="form-select" name="startYearSchool" id="startYearSchool" value="{{ old('company') }}">
                              <option selected>Pilih Tahun</option>
                              @for ($year = date('Y'); $year >= 1990; $year--)
                              <option value="{{ $year }}" {{ old('startYearSchool') == $year ? 'selected' : '' }}>{{ $year }}</option>
                              @endfor
                            </select>
                            @error('startYearSchool') <span class="error">{{ $message }}</span> @enderror
                          </div>
                          <div class="col-6 mb-3">
                            <label for="endMonthSchool" class="form-label">Bulan Selesai</label>
                            <select class="form-select" name="endMonthSchool" id="endMonthSchool">
                              <option selected>Pilih Bulan</option>
                              <option value="Januari" {{ old('endMonthSchool') == 'Januari' ? 'selected' : '' }}>Januari</option>
                              <option value="Februari" {{ old('endMonthSchool') == 'Februari' ? 'selected' : '' }}>Februari</option>
                              <option value="Maret" {{ old('endMonthSchool') == 'Maret' ? 'selected' : '' }}>Maret</option>
                              <option value="April" {{ old('endMonthSchool') == 'April' ? 'selected' : '' }}>April</option>
                              <option value="Mei" {{ old('endMonthSchool') == 'Mei' ? 'selected' : '' }}>Mei</option>
                              <option value="Juni" {{ old('endMonthSchool') == 'Juni' ? 'selected' : '' }}>Juni</option>
                              <option value="Juli" {{ old('endMonthSchool') == 'Juli' ? 'selected' : '' }}>Juli</option>
                              <option value="Agustus" {{ old('endMonthSchool') == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                              <option value="September" {{ old('endMonthSchool') == 'September' ? 'selected' : '' }}>September</option>
                              <option value="Oktober" {{ old('endMonthSchool') == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                              <option value="November" {{ old('endMonthSchool') == 'November' ? 'selected' : '' }}>November</option>
                              <option value="Desember" {{ old('endMonthSchool') == 'Desember' ? 'selected' : '' }}>Desember</option>
                            </select>
                            @error('endMonthSchool') <span class="error">{{ $message }}</span> @enderror
                          </div>
                          <div class="col-6">
                            <label for="endYearSchool" class="form-label">Tahun Selesai</label>
                            <select class="form-select" name="endYearSchool" id="endYearSchool">
                              <option selected>Pilih Tahun</option>
                              @for ($year = date('Y'); $year >= 1990; $year--)
                              <option value="{{ $year }}" {{ old('endYearSchool') == $year ? 'selected' : '' }}>{{ $year }}</option>
                              @endfor
                            </select>
                            @error('endYearSchool') <span class="error">{{ $message }}</span> @enderror
                          </div>
                          <div class="row">
                            <div class="col-12">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="isActiveEducation" id="isActiveEducation">
                                <label class="form-check-label" for="isActiveEducation">
                                  <h6 class="p-2">Saat ini saya masih aktif di sini</h6>
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <label for="lastEdu" class="form-label">Pendidikan</label>
                            <input type="text" class="form-control" name="lastEdu" placeholder="Srata 1" id="lastEdu" value="{{ old('lastEdu') }}">
                            @error('lastEdu') <span class="error">{{ $message }}</span> @enderror
                          </div>
                          <div class="col-6">
                            <label for="major" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" name="major" placeholder="Sistem Informasi" id="major" value="{{ old('major') }}">
                            @error('major') <span class="error">{{ $message }}</span> @enderror
                          </div>
                          <div class="col-12">
                            <label for="ipk" class="form-label">IPK (Opsional namun disarankan)</label>
                            <input type="text" class="form-control" name="ipk" id="ipk" value="{{ old('ipk') }}">
                            @error('ipk') <span class="error">{{ $message }}</span> @enderror
                          </div>
                          <div class="col-12">
                            <label for="activity" class="form-label">Aktivitas dan Pencapaian</label>
                            <textarea class="form-control" rows="3" name="activity" id="activity">{{ old('activity') }}</textarea>
                            @error('activity') <span class="error">{{ $message }}</span> @enderror
                          </div>
                          <div class="col-12">
                            <label for="linkSertif" class="form-label"><i class="fas fa-link" aria-hidden="true"></i> Link Sertifikat (Opsional)</label>
                            <input type="text" class="form-control" name="linkSertif" id="linkSertif" value="{{ old('linkSertif') }}">
                            @error('linkSertif') <span class="error">{{ $message }}</span> @enderror
                          </div>
                        </div>
                    <div class="col-12 step d-flex justify-content-between mt-3">
                      <button type="reset" class="btn btn-outline-primary text-uppercase btn-prev" >Batal</button>
                      <button type="submit" class="btn btn-primary ml-auto text-uppercase btn-next" >Simpan</button>
                    </div>
            </form>
            <script>
              ClassicEditor
                      .create( document.querySelector( '#activity' ) )
                      .then( editor => {
                              console.log( editor );
                      } )
                      .catch( error => {
                              console.error( error );
                      } );

                      document.addEventListener('DOMContentLoaded', (event) => {
                      const isActiveEducation = document.getElementById('isActiveEducation'); 
                      const endMonthSchool = document.getElementById('endMonthSchool');
                      const endYearSchool = document.getElementById('endYearSchool');
                      
                      isActiveEducation.addEventListener('change', (event) => { 
                          if (isActiveEducation.checked) { 
                              endMonthSchool.setAttribute('disabled', 'disabled');
                              endYearSchool.setAttribute('disabled', 'disabled');
                          } else {
                              endMonthSchool.removeAttribute('disabled');
                              endYearSchool.removeAttribute('disabled');
                          }
                      });
                    });

          </script>
          </div>
      </div>
      <footer class="footer py-4 ">
        <center>Copyright &copy; CV-KU 2023</center>
      </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
      @livewireScripts
    </body>
</html>


