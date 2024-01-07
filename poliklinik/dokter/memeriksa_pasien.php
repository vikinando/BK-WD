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
                            <h1 class="page-header">Mengelola Pasien</h1>
                        </div>
                        <div>
                        <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Pasien</th>
                                            <th scope="col">Hari</th>
                                            <th scope="col">Jam</th>
                                            <th scope="col">Nomer Antrian</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                    require '../config/config.php';


                                    $sql = "SELECT daftar_poli.*, jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai, pasien.nama
                                            FROM daftar_poli
                                            JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id
                                            JOIN pasien ON daftar_poli.id_pasien = pasien.id
                                            WHERE jadwal_periksa.id_dokter = (
                                                SELECT dokter.id
                                                FROM dokter
                                                WHERE dokter.id_akun = '$id_akun'
                                            )";

                                    $result = mysqli_query($conn, $sql);
                                    $nomor_urut = 1;

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>{$nomor_urut}</td>";
                                            echo "<td>{$row['nama']}</td>"; // Menampilkan nama
                                            echo "<td>{$row['hari']}</td>"; // Menampilkan hari
                                            echo "<td>{$row['jam_mulai']} - {$row['jam_selesai']}</td>"; // Menampilkan jam
                                            echo "<td>{$row['no_antrian']}</td>";
                                            echo "<td>";
                                            echo "<a href='periksa.php?id={$row['id']}' class='btn btn-primary btn-sm'>Periksa</a>";
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
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- ... (Bagian lain dari file memeriksa_pasien.php) ... -->

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script>
        $(document).ready(function() {
            // Fungsi untuk mengambil data pasien
            function getDataPasien(idPasien) {
                $.ajax({
                    type: 'GET',
                    url: 'get_data_pasien.php',
                    data: { id_pasien: idPasien },
                    dataType: 'json',
                    success: function(data) {
                        if (!data.error) {
                            // Mengisi formulir dengan data pasien
                            $('input[name="id"]').val(data.id);
                            $('input[name="nama"]').val(data.nama);
                            // ... (Tambahkan field lainnya sesuai kebutuhan)
                        } else {
                            alert('Error: ' + data.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Error: ' + error);
                    }
                });
            }

            // Menangani klik tombol "Periksa"
            $('.btn-periksa').on('click', function() {
                // Mengambil ID pasien dari atribut data-id
                var idPasien = $(this).data('id');
                
                // Memanggil fungsi untuk mengambil data pasien
                getDataPasien(idPasien);
            });
        });
        </script>

<!-- ... (Bagian lain dari file memeriksa_pasien.php) ... -->


        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
