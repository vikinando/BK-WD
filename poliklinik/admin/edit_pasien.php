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
                        <h1 class="page-header">Edit Data Pasien</h1>
                    </div>
                    <div class="container mt-5">

                        <!-- Form to edit obat data -->
                        <form method="post" action="edit_pasien.php">
                        <?php
                        require '../config/config.php';

                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $id = $_POST['no'];
                            $id_akun = $_POST['id_akun'];
                            $nama = $_POST['nama'];
                            $alamat = $_POST['alamat'];
                            $no_hp = $_POST['no_hp'];
                            $no_ktp = $_POST['no_ktp'];
                            $no_rm = $_POST['no_rm'];

                            // Perhatikan bahwa no_hp harus dipisahkan dengan koma dari no_ktp
                            $update_query = "UPDATE pasien SET id_akun='$id_akun', nama='$nama', alamat='$alamat', no_hp='$no_hp', no_ktp='$no_ktp', no_rm='$no_rm' WHERE id=$id";

                            if (mysqli_query($conn, $update_query)) {
                                echo "Data pasien berhasil diupdate.";
                            } else {
                                echo "Error updating record: " . mysqli_error($conn);
                            }
                        } else {
                            $nama = '';
                            $alamat = '';
                            $no_hp = '';
                            $no_ktp = '';
                            $no_rm = '';

                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];

                                $select_query = "SELECT * FROM pasien WHERE id=$id";
                                $result = mysqli_query($conn, $select_query);

                                if ($result) {
                                    $row = mysqli_fetch_assoc($result);
                                    $id_akun = $row['id_akun'];
                                    $nama = $row['nama'];
                                    $alamat = $row['alamat'];
                                    $no_hp = $row['no_hp'];
                                    $no_ktp = $row['no_ktp'];
                                    $no_rm = $row['no_rm'];
                                } else {
                                    echo "Error: " . $select_query . "<br>" . mysqli_error($conn);
                                }
                            }
                        }

                        mysqli_close($conn);
                        ?>

                            <input type="hidden" name="no" value="<?php echo $id; ?>">
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="id_akun">Id Akun:</label>
                                <input type="text" class="form-control" id="id_akun" name="id_akun" value="<?php echo $id_akun; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="no_ktp">No KTP:</label>
                                <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="<?php echo $no_ktp; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No HP:</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $no_hp; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="no_rm">No RM:</label>
                                <input type="text" class="form-control" id="no_rm" name="no_rm" value="<?php echo $no_rm; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="simpan">Update Data</button>
                            <a href="data_pasien.php" class="btn btn-primary">Kembali</a>
                        </form>
                    </div>
                </div>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>

