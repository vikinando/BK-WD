<?php

session_start();




$id_jadwal = isset($_POST['jadwal']) ? $_POST['jadwal'] : '';
$id_akun = isset($_SESSION['id']) ? $_SESSION['id'] : '';

require '../config/config.php';


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
        <link href="../css/bootstrap.min.css" rel="stylesheet" />

        <!-- Custom CSS -->
        <link href="../css/sb-admin.css" rel="stylesheet" />

        <!-- Custom Fonts -->
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
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
                    <a class="navbar-brand" href="../dashboard_pasien.php">Pendaftaran Poli</a>
                </div>
                <!-- Top Menu Items -->
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="../dashboard_pasien.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li class="active">
                            <a href="pendaftaran_poli.php"><i class="fa fa-fw fa-edit"></i> Pendaftaran Poliklinik</a>
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
                            <h1 class="page-header">Pendaftaran Poliklinik</h1>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Form -->
                                <div>
                                    <form action="../auth/insert_pendaftaran_Poli.php" method="POST">
                                        <div class="form-group">
                                            <input  type="hidden" class="form-control" name="id" value="<?php echo $id_pasien; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Pasien:</label>
                                            <input type="text" class="form-control" name="nama" value="<?php echo $namaPasien; ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="poli">poli:</label>
                                            <!-- Tambahkan dropdown untuk memilih poli berdasarkan poli -->
                                            <select class="form-control" name="poli" id="poli" required>
                                                <option value="">Pilih Poli</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="dokter">Dokter:</label>
                                            <!-- Tambahkan dropdown untuk memilih dokter berdasarkan poli -->
                                            <select class="form-control" name="dokter" id="dokter" required>
                                                <option value="">Pilih Dokter</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="jadwal">Jadwal:</label>
                                            <!-- Tambahkan dropdown untuk memilih jadwal -->
                                            <select class="form-control" id="jadwal" name="jadwal" required>
                                                <option value="">Select Schedule</option>
                                                <!-- Schedule options will be populated using AJAX based on the selected doctor -->
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="keluhan">Keluhan:</label>
                                            <input type="text" class="form-control" name="keluhan" required>
                                        </div>
                                    
                                        <button type="submit" class="btn btn-primary" >Tambah</button>

                                        <?php
                                        $no_antrian = isset($_GET['no_antrian']) ? $_GET['no_antrian'] : '';

                                        if ($no_antrian) {
                                            echo "Pendaftaran berhasil. Nomor Antrian Anda: $no_antrian";
                                        } else {
                                            echo "";
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Tabel -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Hari</th>
                                            <th scope="col">Jam</th>
                                            <th scope="col">Nomer Antrian</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                        require '../config/config.php';

                                        $sql = "SELECT daftar_poli.*, jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai, pasien.nama
                                            FROM daftar_poli
                                            JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id
                                            JOIN pasien ON daftar_poli.id_pasien = pasien.id";

                                        $result = mysqli_query($conn, $sql);
                                        $nomor_urut = 1;

                                        if ($result) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo "<td>{$nomor_urut}</td>";
                                                echo "<td>{$row['hari']}</td>"; // Menampilkan hari
                                                echo "<td>{$row['jam_mulai']} - {$row['jam_selesai']}</td>"; // Menampilkan jam
                                                echo "<td>{$row['no_antrian']}</td>";
                                                // Buatkan tombol edit dan hapus yang mengarah ke file edit_obat.php dan delete_obat.php
                                                $nomor_urut++;
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                        }

                                        mysqli_close($conn);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script>
                $(document).ready(function() {
                    $.ajax({
                    type: 'GET',
                    url: 'get_poli.php', // Adjust the URL to the actual location of your get_poli.php file
                    dataType: 'json',
                    success: function(response) {
                        if (!response.error) {
                            // Populate the poli dropdown with fetched data
                            $.each(response, function(index, poli) {
                                $('#poli').append('<option value="' + poli.id + '">' + poli.nama_poli + '</option>');
                            });
                        } else {
                            alert('Error: ' + response.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('AJAX request failed with error: ' + error);
                    }
                });

                $('#poli').change(function() {
                    var poliId = $(this).val();
                    $('#dokter').empty();

                    $.ajax({
                        url: 'get_dokter_by_poli.php',
                        type: 'POST',
                        data: { poliId: poliId },
                        dataType: 'json',
                        success: function(data) {
                            $('#dokter').append('<option value="">Pilih Dokter</option>');
                            $.each(data, function(index, dokter) {
                                $('#dokter').append('<option value="' + dokter.id + '">' + dokter.nama + '</option>');
                            });
                        },
                        error: function(error) {
                            console.log('Error: ', error);
                        }
                    });
                });

                $('#dokter').change(function() {
                    var dokterId = $(this).val();
                    $('#jadwal').empty();

                    $.ajax({
                        url: 'get_jadwal_by_dokter.php',
                        type: 'POST',
                        data: { dokterId: dokterId },
                        dataType: 'json',
                        success: function(data) {
                            $('#jadwal').append('<option value="">Pilih Jadwal</option>');
                            $.each(data, function(index, jadwal) {
                                $('#jadwal').append('<option value="' + jadwal.id + '">' + jadwal.hari + ' - ' + jadwal.jam_mulai + ' - ' + jadwal.jam_selesai + '</option>');
                            });
                        },
                        error: function(error) {
                            console.log('Error: ', error);
                        }
                    });
                });
            });
            </script>


        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
