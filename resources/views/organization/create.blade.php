<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Platform Pembuatan CV ATS FRIENDLY | Organisasi</title>
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
            <form action="{{ route('organization.store') }}" class="form" method="POST">
              @csrf
              <h5 class="fw-bolder">Organisasi</h5>
              <p>Mulai dengan pengalaman organisasi terakhir kamu</p>
              <div class="row">
                <div class="col-12">
                  <label for="organization" class="form-label">Organisasi/Nama Acara</label>
                  <input type="text" class="form-control" name="organization" id="organization"  value="{{ old('organization') }}">
                  @error('organization') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="col-12">
                  <label for="positionOrganization" class="form-label">Posisi/Gelar Jabatan</label>
                  <input type="text" class="form-control" name="positionOrganization" id="positionOrganization"  value="{{ old('positionOrganization') }}">
                  @error('positionOrganization') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="col-12">
                  <label for="locationOrganization" class="form-label">Lokasi Organisasi/Acara</label>
                  <input type="text" class="form-control" name="locationOrganization" id="locationOrganization" value="{{ old('locationOrganization') }}">
                  @error('locationOrganization') <span class="error">{{ $message }}</span> @enderror
                </div>
              <div class="col-6">
                <label for="startMonthOrganization" class="form-label">Bulan Mulai</label>
                <select class="form-select" name="startMonthOrganization" id="startMonthOrganization">
                    <option selected>Pilih Bulan</option>
                    <option value="Januari" {{ old('startMonthOrganization') == 'Januari' ? 'selected' : '' }}>Januari</option>
                    <option value="Februari" {{ old('startMonthOrganization') == 'Februari' ? 'selected' : '' }}>Februari</option>
                    <option value="Maret" {{ old('startMonthOrganization') == 'Maret' ? 'selected' : '' }}>Maret</option>
                    <option value="April" {{ old('startMonthOrganization') == 'April' ? 'selected' : '' }}>April</option>
                    <option value="Mei" {{ old('startMonthOrganization') == 'Mei' ? 'selected' : '' }}>Mei</option>
                    <option value="Juni" {{ old('startMonthOrganization') == 'Juni' ? 'selected' : '' }}>Juni</option>
                    <option value="Juli" {{ old('startMonthOrganization') == 'Juli' ? 'selected' : '' }}>Juli</option>
                    <option value="Agustus" {{ old('startMonthOrganization') == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                    <option value="September" {{ old('startMonthOrganization') == 'September' ? 'selected' : '' }}>September</option>
                    <option value="Oktober" {{ old('startMonthOrganization') == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                    <option value="November" {{ old('startMonthOrganization') == 'November' ? 'selected' : '' }}>November</option>
                    <option value="Desember" {{ old('startMonthOrganization') == 'Desember' ? 'selected' : '' }}>Desember</option>
                </select>
                @error('startMonthOrganization') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-6">
              <label for="startYearOrganization" class="form-label">Tahun Mulai</label>
              <select class="form-select" name="startYearOrganization" id="startYearOrganization">
                  <option selected>Pilih Tahun</option>
                  @for ($year = date('Y'); $year >= 1990; $year--)
                  <option value="{{ $year }}" {{ old('startYearOrganization') == $year ? 'selected' : '' }}>{{ $year }}</option>
                  @endfor
              </select>
              @error('startYearOrganization') <span class="error">{{ $message }}</span> @enderror
          </div>
              <div class="col-6 mb-3">
                <label for="endMonthOrganization" class="form-label">Bulan Selesai</label>
                <select class="form-select" name="endMonthOrganization" id="endMonthOrganization">
                    <option selected>Pilih Bulan</option>
                    <option value="Januari" {{ old('endMonthOrganization') == 'Januari' ? 'selected' : '' }}>Januari</option>
                    <option value="Februari" {{ old('endMonthOrganization') == 'Februari' ? 'selected' : '' }}>Februari</option>
                    <option value="Maret" {{ old('endMonthOrganization') == 'Maret' ? 'selected' : '' }}>Maret</option>
                    <option value="April" {{ old('endMonthOrganization') == 'April' ? 'selected' : '' }}>April</option>
                    <option value="Mei" {{ old('endMonthOrganization') == 'Mei' ? 'selected' : '' }}>Mei</option>
                    <option value="Juni" {{ old('endMonthOrganization') == 'Juni' ? 'selected' : '' }}>Juni</option>
                    <option value="Juli" {{ old('endMonthOrganization') == 'Juli' ? 'selected' : '' }}>Juli</option>
                    <option value="Agustus" {{ old('endMonthOrganization') == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                    <option value="September" {{ old('endMonthOrganization') == 'September' ? 'selected' : '' }}>September</option>
                    <option value="Oktober" {{ old('endMonthOrganization') == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                    <option value="November" {{ old('endMonthOrganization') == 'November' ? 'selected' : '' }}>November</option>
                    <option value="Desember" {{ old('endMonthOrganization') == 'Desember' ? 'selected' : '' }}>Desember</option>
                </select>
                @error('endMonthOrganization') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-6">
              <label for="endYearOrganization" class="form-label">Tahun Selesai</label>
              <select class="form-select" name="endYearOrganization" id="endYearOrganization">
                  <option selected>Pilih Tahun</option>
                  @for ($year = date('Y'); $year >= 1990; $year--)
                  <option value="{{ $year }}" {{ old('endYearOrganization') == $year ? 'selected' : '' }}>{{ $year }}</option>
                  @endfor
              </select>
              @error('endYearOrganization') <span class="error">{{ $message }}</span> @enderror
          </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="isActiveOrganization" id="isActiveOrganization">
                    <label class="form-check-label" for="isActiveOrganization">
                      <h6 class="p-2">Saat ini saya masih aktif di sini</h6>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <label for="descOrganization" class="form-label">Deskripsi Organisasi</label>
                <textarea class="form-control" rows="3" name="descOrganization" id="descOrganization">{{ old('descOrganization') }}</textarea>
                @error('descOrganization') <span class="error">{{ $message }}</span> @enderror
              </div>
            </div>
                <div class="col-12 step d-flex justify-content-between mt-3">
                  <button type="reset" class="btn btn-outline-primary text-uppercase btn-prev">Batal</button>
                  <button type="submit" class="btn btn-primary ml-auto text-uppercase btn-next">Simpan</button>
                </div>
        </form>
          </div>
      </div>
      <footer class="footer py-4 ">
        <center>Copyright &copy; CV-KU 2023</center>
      </footer>
      <script>
        ClassicEditor
                .create( document.querySelector( '#descOrganization' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );

            

        document.addEventListener('DOMContentLoaded', (event) => {
          const isActiveOrganization = document.getElementById('isActiveOrganization'); 
          const endMonthOrganization = document.getElementById('endMonthOrganization');
          const endYearOrganization = document.getElementById('endYearOrganization');
          
          isActiveOrganization.addEventListener('change', (event) => { 
              if (isActiveOrganization.checked) { 
                  endMonthOrganization.setAttribute('disabled', 'disabled');
                  endYearOrganization.setAttribute('disabled', 'disabled');
              } else {
                  endMonthOrganization.removeAttribute('disabled');
                  endYearOrganization.removeAttribute('disabled');
              }
          });
        });

      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
      @livewireScripts
    </body>
</html>


