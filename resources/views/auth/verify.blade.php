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
    <link rel="stylesheet" href="../css/login.css">
    <title>Platform Pembuatan CV ATS FRIENDLY || Halaman Verifikasi</title>
</head>
<body>
    <div class="container px-xl-5 py-5 mx-auto">
        <div class="card0 border-0 mx-auto">
                <div class="col-lg-12">
                    <div class="card2 card border-0 px-4 py-5">
                        <div class="row mb-4 px-3 mx-auto">
                            <img src="../img/cvku.svg" class="image">
                        </div>
                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            <h6 class="mb-0 text-sm ">Tautan verifikasi baru telah dikirim ke alamat email Anda.</h6>
                        </div>
                        @endif
                        <h6 class="mb-0 text-sm ">Sebelum melanjutkan, silakan periksa email Anda untuk tautan verifikasi.Jika kamu tidak menerima pesan email.</h6>
                        <form method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="button-resent" >klik di sini untuk meminta ulang</button>.
                        </form>
                    </div>
                </div>
            </form>
            <div class="footer py-4">
                    <center>Copyright &copy; CV-KU 2023</center>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
