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
    } else {
        $namaDokter = "Data tidak ditemukan";
    }
} else {
    $namaDokter = "Error: " . $sql . "<br>" . mysqli_error($conn);
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
                    <a class="navbar-brand" href="../dashboard_dokter.html">Dokter</a>
                </div>
                <!-- Top Menu Items -->

                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="../dashboard_dokter.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li class="active">
                            <a href="data_jadwal.php"><i class="fa fa-fw fa-edit"></i> Jadwal Periksa</a>
                        </li>
                        <li class="active">
                            <a href="memeriksa_pasien.php"><i class="fa fa-fw fa-edit"></i> Periksa</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
            <div id="page-wrapper">
                <div class="container-fluid">
                    
                    <!-- /.row -->
                    <div>
                        <h2>Input Jadwal Periksa</h2>
                        <form method="post" action="../auth/insert_jadwal.php">
                            <div class="form-group">
                                <input  type="hidden" class="form-control" name="id" value="<?php echo $id_dokter; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Pasien:</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo $namaDokter; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="hari">Hari:</label>
                                <select class="form-control" id="hari" name="hari" required>
                                    <option value="1">Senin</option>
                                    <option value="2">Selasa</option>
                                    <option value="3">Rabu</option>
                                    <option value="4">Kamis</option>
                                    <option value="5">Jumat</option>
                                    <option value="6">Sabtu</option>
                                    <option value="7">Minggu</option>
                                    <!-- Add more options if needed -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="jam_mulai">Jam Mulai:</label>
                                <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                            </div>
                            <div class="form-group">
                                <label for="jam_selesai">Jam Selesai:</label>
                                <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="data_jadwal.php" class="btn btn primary">Kembali</a>
                        </form>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
