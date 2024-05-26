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
            @include('components.organizationbread')
            <form action="{{ route('organization.update', $organization) }}" class="form" method="POST">
              @csrf
              @method('PUT')
              <h5 class="fw-bolder">Organisasi</h5>
              <p>Mulai dengan pengalaman organisasi terakhir kamu</p>
              <div class="row">
                <div class="col-12">
                  <label for="organization" class="form-label">Organisasi/Nama Acara</label>
                  <input type="text" class="form-control" name="organization" id="organization"  value="{{ $organization->organization }}">
                  @error('organization') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="col-12">
                  <label for="positionOrganization" class="form-label">Posisi/Gelar Jabatan</label>
                  <input type="text" class="form-control" name="positionOrganization" id="positionOrganization" value="{{ $organization->positionorganization }}">
                  @error('positionOrganization') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="col-12">
                  <label for="locationOrganization" class="form-label">Lokasi Organisasi/Acara</label>
                  <input type="text" class="form-control" name="locationOrganization" id="locationOrganization" value="{{ $organization->locationorganization }}">
                  @error('locationOrganization') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="col-6">
                  <label for="startMonthOrganization" class="form-label">Bulan Mulai</label>
                  <select class="form-select" id="startMonthOrganization" name="startMonthOrganization">
                    <option selected>Pilih Bulan</option>
                    <option value="Januari" {{ $organization->startMonthorganization == 'Januari' ? 'selected' : '' }}>Januari</option>
                    <option value="Februari" {{ $organization->startMonthorganization == 'Februari' ? 'selected' : '' }}>Februari</option>
                    <option value="Maret" {{ $organization->startMonthorganization == 'Maret' ? 'selected' : '' }}>Maret</option>
                    <option value="April" {{ $organization->startMonthorganization == 'April' ? 'selected' : '' }}>April</option>
                    <option value="Mei" {{ $organization->startMonthorganization == 'Mei' ? 'selected' : '' }}>Mei</option>
                    <option value="Juni" {{ $organization->startMonthorganization == 'Juni' ? 'selected' : '' }}>Juni</option>
                    <option value="Juli" {{ $organization->startMonthorganization == 'Juli' ? 'selected' : '' }}>Juli</option>
                    <option value="Agustus" {{ $organization->startMonthorganization == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                    <option value="September" {{ $organization->startMonthorganization == 'September' ? 'selected' : '' }}>September</option>
                    <option value="Oktober" {{ $organization->startMonthorganization == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                    <option value="November" {{ $organization->startMonthorganization == 'November' ? 'selected' : '' }}>November</option>
                    <option value="Desember" {{ $organization->startMonthorganization == 'Desember' ? 'selected' : '' }}>Desember</option>
                </select>
                  @error('startMonthOrganization') <span class="error">{{ $message }}</span> @enderror
                </div>
            <div class="col-6">
              <label for="startYearOrganization" class="form-label">Tahun Mulai</label>
              <select class="form-select" name="startYearOrganization" id="startYearOrganization">
                  <option selected>Pilih Tahun</option>
                  @for ($year = date('Y'); $year >= 1990; $year--)
                  <option value="{{ $year }}" {{ old('startYearorganization') == $year ? 'selected' : '' }}>{{ $year }}</option>
                  @endfor
              </select>
              @error('startYearOrganization') <span class="error">{{ $message }}</span> @enderror
          </div>
          <div class="col-6">
            <label for="endMonthOrganization" class="form-label">Bulan Selesai</label>
            <select class="form-select" id="endMonthOrganization" name="endMonthOrganization">
              <option selected>Pilih Bulan</option>
              <option value="Januari" {{ $organization->endMonthorganization == 'Januari' ? 'selected' : '' }}>Januari</option>
              <option value="Februari" {{ $organization->endMonthorganization == 'Februari' ? 'selected' : '' }}>Februari</option>
              <option value="Maret" {{ $organization->endMonthorganization == 'Maret' ? 'selected' : '' }}>Maret</option>
              <option value="April" {{ $organization->endMonthorganization == 'April' ? 'selected' : '' }}>April</option>
              <option value="Mei" {{ $organization->endMonthorganization == 'Mei' ? 'selected' : '' }}>Mei</option>
              <option value="Juni" {{ $organization->endMonthorganization == 'Juni' ? 'selected' : '' }}>Juni</option>
              <option value="Juli" {{ $organization->endMonthorganization == 'Juli' ? 'selected' : '' }}>Juli</option>
              <option value="Agustus" {{ $organization->endMonthorganization == 'Agustus' ? 'selected' : '' }}>Agustus</option>
              <option value="September" {{ $organization->endMonthorganization == 'September' ? 'selected' : '' }}>September</option>
              <option value="Oktober" {{ $organization->endMonthorganization == 'Oktober' ? 'selected' : '' }}>Oktober</option>
              <option value="November" {{ $organization->endMonthorganization == 'November' ? 'selected' : '' }}>November</option>
              <option value="Desember" {{ $organization->endMonthorganization == 'Desember' ? 'selected' : '' }}>Desember</option>
          </select>
            @error('endMonthOrganization') <span class="error">{{ $message }}</span> @enderror
          </div>
            <div class="col-6">
              <label for="endYearOrganization" class="form-label">Tahun Selesai</label>
              <select class="form-select" name="endYearOrganization" id="endYearOrganization">
                  <option selected>Pilih Tahun</option>
                  @for ($year = date('Y'); $year >= 1990; $year--)
                  <option value="{{ $year }}" {{ old('endYearorganization') == $year ? 'selected' : '' }}>{{ $year }}</option>
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
                <textarea class="form-control" rows="3" name="descOrganization" id="descOrganization">{{ $organization->descorganization }}</textarea>
                @error('descOrganization') <span class="error">{{ $message }}</span> @enderror
              </div>
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
      <script>
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor
                .create(document.querySelector('#descOrganization'))
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


