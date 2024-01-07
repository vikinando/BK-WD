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
                    <a class="navbar-brand fa" href="../dashboard_admin.php">Admin</a>
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
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                        <h2 style="text-align: center;" >Add New Doctor</h2>
                        <a href="register_dr.html" class="btn btn-primary btn-lg btn-block">Register Akun Dokter</a> <br>
                    <form action="../auth/insert_dr.php" method="post">
                        <div class="form-group">
                            <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <label for="id_akun">Select Akun:</label>
                            </div>
                                <select class="custom-select" name="id_akun" require>
                                <option selected>Choose...</option>
                                <?php
                                    // Include your database configuration file here
                                    require '../config/config.php';

                                    $akun_query = "SELECT id, email FROM akun WHERE role = 'dokter'";
                                    $akun_result = mysqli_query($conn, $akun_query);

                                    while ($akun_row = mysqli_fetch_assoc($akun_result)) {
                                        echo '<option value="' . $akun_row['id'] . '">' . $akun_row['email'] . '</option>';
                                    }

                                    // Close the database connection
                                    mysqli_close($conn);
                                ?>
                            </select>
                            </div>
                                
                            </select><br>

                            <!-- Select the id_poli from the poli table -->
                            <div class="form-group">
                            <div class="input-group mb-6">
                                <div class="input-group-prepend">
                                    <label for="id_poli">Select Poli:</label>
                                </div>
                                    <select class="custom-select" name="id_poli" required>
                                    <option selected>Choose...</option>
                                    <?php
                                        // Include your database configuration file here
                                        require '../config/config.php';

                                        $poli_query = "SELECT id, Nama_poli FROM poli";
                                        $poli_result = mysqli_query($conn, $poli_query);

                                        while ($poli_row = mysqli_fetch_assoc($poli_result)) {
                                            echo '<option value="' . $poli_row['id'] . '">' . $poli_row['Nama_poli'] . '</option>';
                                        }

                                        // Close the database connection
                                        mysqli_close($conn);
                                    ?>
                            </select>
                            </div>
                                <br><br>
                            <div class="form-group">
                                <label for="nama">Nama Dokter:</label>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                    
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <input type="text" class="form-control" name="alamat" required>
                            </div>

                            <div class="form-group">
                                <label for="no_hp">Nomer Handphone:</label>
                                <input type="text" class="form-control" name="no_hp" required>
                            </div>
                    
                            <button type="submit" class="btn btn-primary" VALUES="Add Doctor">Tambah</button>
                            <a href="data_dr.php" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </form>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
