<?php

session_start();



$id_akun = isset($_SESSION['id']) ? $_SESSION['id'] : '';


require './config/config.php';


$sql = "SELECT id, nama FROM dokter WHERE id_akun = '$id_akun'";
$result = mysqli_query($conn, $sql);

if ($result) {
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id_dokter = $row['id'];
        $namadokter = $row['nama'];
    } else {
        $namaPasien = "Data tidak ditemukan";
    }
} else {
    $namaPasien = "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>SB Admin - Bootstrap Admin Template</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet" />

        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet" />

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

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
                    <a class="navbar-brand" href="dashboard_dokter.php">Dokter</a>
                </div>
                <!-- Top Menu Items -->
                
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="dashboard_dokter.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li class="active">
                            <a href="./dokter/data_jadwal.php"><i class="fa fa-fw fa-edit"></i> Jadwal Periksa</a>
                        </li>
                        <li class="active">
                            <a href="./dokter/memeriksa_pasien.php"><i class="fa fa-fw fa-edit"></i> Periksa</a>
                        </li>
                        <li class="active">
                            <a href="./dokter/riwayat_pasien.php"><i class="fa fa-fw fa-edit"></i> Riwayat Pasien</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Dashboard <small>Statistics Overview</small></h1>
                            <ol class="breadcrumb">
                                <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                   
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                        <?php
                                            require './config/config.php';

                                            // Ganti 'id_dokter' dengan sesuai dengan kolom di tabel jadwal_periksa yang merujuk ke dokter
                                            $_SESSION['id_dokter'] = $id_dokter;

                                            // Kueri SQL untuk menghitung total pasien pada sesi dokter tertentu
                                            $sql = "SELECT COUNT(*) AS total_pasien FROM daftar_poli WHERE id_jadwal IN (SELECT id FROM jadwal_periksa WHERE id_dokter = '$id_dokter')";
                                            $result = mysqli_query($conn, $sql);

                                            if ($result) {
                                                $row = mysqli_fetch_assoc($result);
                                                $total_pasien = $row['total_pasien'];
                                                echo '<div>Total Pasien!</div>';
                                                echo '<div class="huge">' . $total_pasien . '</div>';
                                            } else {
                                                echo '<div class="huge">Error</div>';
                                                echo '<div>Error fetching data</div>';
                                            }

                                            mysqli_close($conn);
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                   
                    <!-- /.row -->

                    
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

        <!-- Morris Charts JavaScript -->
        <script src="js/plugins/morris/raphael.min.js"></script>
        <script src="js/plugins/morris/morris.min.js"></script>
        <script src="js/plugins/morris/morris-data.js"></script>
    </body>
</html>
