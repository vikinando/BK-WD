<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Poliklinik</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="app/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="app/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="container">
        <div class="jumbotron text-center mt-5">
            <h1 class="display-4">Selamat Datang di Poliklinik</h1>
            <p class="lead"></p>
            <hr class="my-4">
            <p class="h3">Silahkan login terlebih dahulu.</p>
            <!-- <a class="btn btn-primary btn-lg" href="login.php" role="button">Login</a> -->
        </div>

        <div class="row justify-content-lg-center">
            <div class="col-md-6 text-center">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-sharp fa-solid fa-hospital-user mb-3 text-primary" style="font-size: 34px;"></i>
                        <h3 class="">Pasien</h3>
                        <p class="card-text">Apabila anda adalah seorang Pasien, Silahkan tekan tombol dibawah untuk melakukan pendaftaran pasien</p>
                        <a href="daftarPasien.php" class="btn btn-primary btn-block">Pendaftaran Pasien</a>
                    </div>
                </div>
            </div>
            <!-- <i class="fa-sharp fa-solid fa-hospital-user"></i> -->
            <div class="col-md-6 text-center">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-user-nurse fa-fw mb-3 text-success" style="font-size: 34px;"></i>
                        <h3 class="">Dokter</h3>
                        <p class="card-text">Apabila anda adalah seorang Dokter, silahkan Login terlebih dahulu untuk
                            memulai melayani pasien</p>
                        <div class="d-grid">
                            <a href="login.php" class="btn btn-success btn-block">Login Sebagai Dokter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="app/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="app/dist/js/adminlte.min.js"></script>
</body>

</html>