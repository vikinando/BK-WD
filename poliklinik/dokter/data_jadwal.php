<?php

session_start();

$id_akun = isset($_SESSION['id']) ? $_SESSION['id'] : '';
require '../config/config.php';

// Fetch doctor's information from the dokter table
$sql = "SELECT id, nama FROM dokter WHERE id_akun = '$id_akun'";
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id_dokter = $row['id'];
        $namaDokter = $row['nama'];

        // Fetch doctor's schedule from the jadwal_periksa table
        $sql_jadwal = "SELECT hari, jam_mulai, jam_selesai FROM jadwal_periksa WHERE id_dokter = '$id_dokter'";
        $result_jadwal = mysqli_query($conn, $sql_jadwal);

        if ($result_jadwal && mysqli_num_rows($result_jadwal) > 0) {
            // Assuming the doctor has one schedule (you may need to adjust if there are multiple schedules)
            $row_jadwal = mysqli_fetch_assoc($result_jadwal);
            $hari = $row_jadwal['hari'];
            $jam_mulai = $row_jadwal['jam_mulai'];
            $jam_selesai = $row_jadwal['jam_selesai'];
        } else {
            $hari = "Data tidak ditemukan";
            $jam_mulai = "Data tidak ditemukan";
            $jam_selesai = "Data tidak ditemukan";
        }

        // Check if today is the same day as the working schedule
        $is_same_day = (date('N') == $hari);  // 'N' returns the ISO-8601 numeric representation of the day of the week (1 for Monday, 7 for Sunday)

        // Set a flag to determine whether the doctor can edit the schedule
        $can_edit_schedule = ($is_same_day);
    } else {
        $namaDokter = "Data tidak ditemukan";
        $can_edit_schedule = false;
    }
} else {
    $namaDokter = "Error: " . $sql . "<br>" . mysqli_error($conn);
    $can_edit_schedule = false;
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

        <title>Dokter</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" />

        <!-- Custom CSS -->
        <link href="../css/sb-admin.css" rel="stylesheet" />

        <!-- Morris Charts CSS -->
        <link href="../css/plugins/morris.css" rel="stylesheet" />

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
                    <a class="navbar-brand" href="../dashboard_dokter.php">Dokter</a>
                </div>
                <!-- Top Menu Items -->
                
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="../dashboard_dokter.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li class="active">
                            <a href="data_jadwal.php"><i class="fa fa-fw fa-edit"></i> Jadwal Periksa</a>
                        </li>
                        <li class="active">
                            <a href="memeriksa_pasien.php"><i class="fa fa-fw fa-edit"></i> Periksa</a>
                        </li>
                        <li class="active">
                            <a href="riwayat_pasien.php"><i class="fa fa-fw fa-edit"></i> Riwayat Pasien</a>
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
                            <h1 class="page-header">Jadwal Periksa <small><?php echo $namaDokter; ?></small></h1>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-subtitle mb-2 text-muted">Jadwal:</h4>
                            <div class="card-text">
                                <p class="mb-1"><strong>Hari:</strong> <?php echo $hari; ?></p>
                                <p class="mb-1"><strong>Jam Mulai:</strong> <?php echo $jam_mulai; ?></p>
                                <p class="mb-1"><strong>Jam Selesai:</strong> <?php echo $jam_selesai; ?></p>
                            </div>
                        </div>
                        
                        <?php if ($can_edit_schedule): ?>
                            <!-- If the doctor can edit the schedule, show the button -->
                            <a href=".php" class="btn btn-primary">Edit Jadwal</a>
                        <?php else: ?>
                            <!-- If the doctor can't edit the schedule, show a message -->
                            <div class="alert alert-info" role="alert">
                                Anda tidak dapat mengubah jadwal pada hari ini atau selama waktu kerja.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

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
