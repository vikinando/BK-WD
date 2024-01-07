<?php

session_start();




$id_jadwal = isset($_POST['jadwal']) ? $_POST['jadwal'] : '';
$id_akun = isset($_SESSION['id']) ? $_SESSION['id'] : '';

require './config/config.php';


$sql = "SELECT id, nama FROM pasien WHERE id_akun = '$id_akun'";
$result = mysqli_query($conn, $sql);

if ($result) {
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id_pasien = $row['id'];
        $namaPasien = $row['nama'];
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
                    <a class="navbar-brand" href="dashboard_pasien.html">Selamat Datang Di Appoiment Rs.Kariadi</a>
                </div>
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#"><?php echo $namaPasien; ?></a>
                    </li>
                    <li class="dropdown">
                        <a href="index.php" action="./auth/logout.php" class="btn btn-danger">Logout</b></a>
                    </li>
                </ul>
                <!-- Top Menu Items -->
                
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="dashboard_pasien.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li class="active">
                            <a href="./pasien/pendaftaran_poli.php"><i class="fa fa-fw fa-edit"></i>Poliklinik</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper" >
                <div class="container-fluid">
                    <h1 style="text-align: center;">Rumah Sakit Kariadi Semarang</h1>
                    
                    <img src="gambar/home_rs.png" width="100%" height="100%" />
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
