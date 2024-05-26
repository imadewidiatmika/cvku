<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <title>Platform Pembuatan CV ATS FRIENDLY | Halaman Masuk </title>
</head>
<body>
    <div class="container px-xl-5 py-5 mx-auto">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if(session()->has('loginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('loginError')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

        <div class="card0 border-0 mx-auto">
              <form action="{{ route('login') }}" method="POST">
                @csrf
                    <div class="col-lg-12">
                        <div class="card2 card border-0 px-4 py-5">
                            <div class="row mb-4 px-3 mx-auto">
                                <img src="img/cvku.svg" class="image">
                            </div>
                            <div class="row px-3">
                                <label class="mb-1" for="email"><h6 class="mb-0 text-sm  fw-bold">Email Address</h6></label>
                                <input class="form-control mb-4 @error('email') is-invalid @enderror" type="email" id="email" name="email" placeholder="Masukkan alamat email" autofocus required value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="row px-3">
                                <label class="mb-1" for="password"><h6 class="mb-0 text-sm fw-bold">Password</h6></label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" required>
                            </div>
                            <div class="row px-3 mb-4">
                                <a href="{{ route('password.request') }}" class="ml-auto mb-0 text-end">Lupa Password?</a>
                            </div>
                            <div class="row mb-3 px-3">
                                <button type="submit" class="btn btn-primary text-center">Masuk</button>
                            </div>
                            <div class="row mb-3 px-3">
                                <a href="{{ route('google.login') }}" class="google"><i class="bi bi-google"></i> Masuk Dengan Google</a>
                            </div>
                            <div class="row mb-4 px-3 mx-auto">
                                <small>Tidak memiliki akun? <a href="/register" class="register fw-bolder">Daftar</a></small>
                            </div>
                        </div>
                    </div>

                    <div class="footer py-4">
                        <center>Copyright &copy; CV-KU 2023</center>
                    </div>
              </form>
            </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>