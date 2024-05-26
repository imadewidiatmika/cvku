<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CV-KU Admin - Dashboard</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <style>
        .table-responsive {
            max-height: 400px; /* atau tinggi spesifik yang Anda inginkan */
            overflow: auto;
        }
        .card-body {
        overflow: hidden;
    }
    </style>    
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="../css/cvku-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body id="page-top">
    

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

                <div class="sidebar-brand-text mx-3">CV-KU Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-house"></i>
                    <span>Halaman Utama</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.user') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data User</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.information') }}">
                    <i class="fas fa-fw fa-info"></i>
                    <span>Data Informasi Pribadi</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.experience') }}">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Data Pengalaman</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.education') }}">
                    <i class="fas fa-fw fa-graduation-cap"></i>
                    <span>Data Pendidikan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.organization') }}">
                    <i class="fas fa-fw fa-sitemap"></i>
                    <span>Data Organisasi</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.skill') }}">
                    <i class="fas fa-fw fa-check"></i>
                    <span>Data Kemampuan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.language') }}">
                    <i class="fas fa-fw fa-language"></i>
                    <span>Data Bahasa</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.certificate') }}">
                    <i class="fas fa-fw fa-certificate"></i>
                    <span>Data Sertifikat</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                        <!-- Nav Item - User Information -->
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar</button>
                          </form>
            
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Sertifikat</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                                    <!-- Content Row -->
                                    @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                    @endif
                <div class="col-12 mb-4">
                    <div class="card shadow">

                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-success text-uppercase">Jumlah Data Sertifikat</h6>
                        </div>

                        <div class="card-body">
                            <div class="chart-area">
                                <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                      <tr class="table text-white" style="background-color: #0fa7ff">
                                        <th scope="col">ID</th>
                                        <th scope="col">User ID</th>
                                        <th scope="col">Sertifikat</th>
                                        <th scope="col">Aksi</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($certificates as $certificate)
                                        <tr>
                                            <th scope="row">{{ $certificate->id }}</th>
                                            <td>{{ $certificate->user_id }}</td>
                                            <td>{{ $certificate->certificate }}</td>
                                            <td>
                                                <form action="{{ route('admin.certificate.destroy', $certificate) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="#" onclick="this.closest('form').submit(); return false;"><i class="fas fa-fw fa-trash"></i></a>
                                                </form> 
                                            </td>                                                                                     
                                        </tr>
                                    @endforeach
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- Content Row -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; CV-KU 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <script src="js/cvku-admin-2.min.js"></script>

</body>

</html>