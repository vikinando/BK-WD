<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Admin - Appointmen</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" />

        <!-- Custom CSS -->
        <link href="../css/sb-admin.css" rel="stylesheet" />

        <!-- Custom Fonts -->
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../dashboard_admin.html">Admin</a>
                </div>
            <!-- Top Menu Items -->
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                        <li class="active">
                            <a href="../dashboard_admin.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="data_dr.php"><i class="fa fa-fw fa-user-md"></i> Mengelola Dokter</a>
                        </li>
                        <li>
                            <a href="data_obat.php"><i class="fa fa-fw fa-medkit"></i> Mengelola Obat</a>
                        </li>
                        <li>
                            <a href="data_poli.php"><i class="fa fa-fw fa-hospital-o"></i> Mengelola Poli</a>
                        </li>
                        <li>
                            <a href="data_pasien.php"><i class="fa fa-fw fa-users"></i> Mengelola Pasien</a>
                        </li>
                    </ul>
                </div>
                    </nav>
                    <div id="page-wrapper">
                        <div class="container-fluid">
                            <!-- Page Heading -->
                            <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Data Obat</h1>
                    </div>
                    <div class="container mt-5">
                        <!-- Form to edit obat data -->
                        <form method="post" action="edit_obat.php">
                        
                        <?php
                            require '../config/config.php';

                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                // Definisikan koneksi ke database
                                $mysqli = new mysqli("localhost", "root", "", "booking_rs");

                                // Extract data from the form
                                $id = $_POST['no']; // Ganti dari $_POST['id'] menjadi $_POST['no']
                                $nama_obat = $_POST['nama'];
                                $kemasan = $_POST['kemasan'];
                                $harga = $_POST['harga'];

                                // Update data in the database
                                $sql = "UPDATE obat SET nama_obat='$nama_obat', kemasan='$kemasan', harga=$harga WHERE id=$id";

                                if (mysqli_query($mysqli, $sql)) {
                                    echo "Data obat berhasil diupdate.";
                                } else {
                                    echo "Error updating record: " . mysqli_error($mysqli);
                                }

                                // Tutup koneksi
                                mysqli_close($mysqli);
                            } else {
                                $nama_obat = '';
                                $kemasan = '';
                                $harga = '';

                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];

                                    // Definisikan koneksi ke database
                                    $mysqli = new mysqli("localhost", "root", "", "booking_rs");

                                    // Periksa koneksi
                                    if ($mysqli->connect_error) {
                                        die("Connection failed: " . $mysqli->connect_error);
                                    }

                                    $ambil = mysqli_query($mysqli, "SELECT * FROM obat WHERE id=$id");
                                    while ($row = mysqli_fetch_array($ambil)) {
                                        $nama_obat = $row['nama_obat'];
                                        $kemasan = $row['kemasan'];
                                        $harga = $row['harga'];
                                    }

                                    // Tutup koneksi
                                    mysqli_close($mysqli);
                                }
                            }
                        ?>
                        <input type="hidden" name="no" value="<?php echo $id; ?>">  
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama_obat ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="kemasan">Kemasan:</label>
                            <input type="text" class="form-control" id="kemasan" name="kemasan" value="<?php echo $kemasan ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga:</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $harga ?>" required>
                        </div>
                            <button type="submit" class="btn btn-primary" name="simpan">Update Data</button>
                            <a href="data_obat.php" class="btn btn-primary">Kembali</a>
                        </form>
                    </div>
                </div>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>

