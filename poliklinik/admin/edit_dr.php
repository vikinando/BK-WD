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
                        <h1 class="page-header">Edit Data Dokter</h1>
                    </div>
                    <div class="container mt-5">
                        <!-- Form to edit dokter data -->
                        <form method="post" action="edit_dr.php">
                        
                        <?php
                            require '../config/config.php';

                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                // Extract data from the form
                                $id = $_POST['no']; // Ganti dari $_POST['id'] menjadi $_POST['no']
                                $id_akun = $_POST['id_akun'];
                                $id_poli = $_POST['id_poli'];
                                $nama = $_POST['nama'];
                                $alamat = $_POST['alamat'];
                                $no_hp = $_POST['no_hp'];
                            
                                // Update data in the database
                                $sql = "UPDATE dokter SET id_akun='$id_akun', id_poli='$id_poli', nama='$nama', alamat='$alamat', no_hp='$no_hp' WHERE id=$id";
                            
                                if (mysqli_query($conn, $sql)) {
                                    echo "Record updated successfully";
                                } else {
                                    echo "Error updating record: " . mysqli_error($conn);
                                }
                            } else {
                                $id_akun = '';
                                $id_poli = '';
                                $nama = '';
                                $alamat = '';
                                $no_hp = '';
                            
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                            
                                    // Fetch existing data for the specified dokter from the database
                                    $sql = "SELECT * FROM dokter WHERE id=$id";
                                    $result = mysqli_query($conn, $sql);
                            
                                    if ($result) {
                                        $row = mysqli_fetch_assoc($result);
                            
                                        $id_akun = $row['id_akun'];
                                        $id_poli = $row['id_poli'];
                                        $nama = $row['nama'];
                                        $alamat = $row['alamat'];
                                        $no_hp = $row['no_hp'];
                                    } else {
                                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                    }
                                }
                            }
                        ?>
                        <input type="hidden" name="no" value="<?php echo $id; ?>">  
                        <div class="form-group">
                            <label for="id_akun">ID Akun:</label>
                            <input type="text" class="form-control" id="id_akun" name="id_akun" value="<?php echo $id_akun; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="id_poli">ID Poli:</label>
                            <input type="text" class="form-control" id="id_poli" name="id_poli" value="<?php echo $id_poli; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="no_hp">No HP:</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $no_hp; ?>" required>
                        </div>
                            <button type="submit" class="btn btn-primary" name="simpan">Update Data</button>
                            <a href="data_dr.php" class="btn btn-primary">Kembali</a>
                        </form>
                    </div>
                </div>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>

