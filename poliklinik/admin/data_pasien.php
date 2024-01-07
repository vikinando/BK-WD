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
                    <a class="navbar-brand" href="../dashboard_admin.php">Admin</a>
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
                            <h1 class="page-header">Data Pasien</h1>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div>
                        <!-- Tombol tambah data -->

                        <!-- Tabel untuk menampilkan data obat -->
                        <table class="table">
                            <?php
                            require '../config/config.php';

                            if (isset($_GET['id'])) {
                                $id_to_delete = $_GET['id'];
                                $delete_query = "DELETE FROM pasien WHERE id = $id_to_delete";
                            
                                if (mysqli_query($conn, $delete_query)) {
                                    echo '<a href="data_pasien.php" class="btn btn-primary">Kembali ke Data Pasien</a><br><br>';
                                    echo "Data pasien berhasil dihapus.";
                            
                                    exit();
                                } else {
                                    echo "Error deleting record: " . mysqli_error($conn);
                                }
                            }

                            $sql = "SELECT * FROM pasien";
                            $result = mysqli_query($conn, $sql);
                            $nomor_urut = 1;

                            if ($result) {
                                echo '<table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">ID Akun</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">No KTP</th>
                                                <th scope="col">No RM</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>';

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>{$nomor_urut}</td>";
                                    echo "<td>{$row['id_akun']}</td>";
                                    echo "<td>{$row['nama']}</td>";
                                    echo "<td>{$row['alamat']}</td>";
                                    echo "<td>{$row['no_ktp']}</td>";
                                    echo "<td>{$row['no_rm']}</td>";
                                    echo "<td>";
                                    echo "<a href='edit_pasien.php?id={$row['id']}' class='btn btn-primary btn-sm'>Edit</a>";
                                    echo "&nbsp;";
                                    echo "<a href='data_pasien.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">Hapus</a>";
                                    echo "</td>";
                                    echo "</tr>";

                                    $nomor_urut++;
                                }

                                echo '</tbody></table>';
                            } else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }

                            mysqli_close($conn);
                            ?>
                            </tbody>
                        </table>
                        <a href="../dashboard_admin.php" class="btn btn-primary">Kembali</a>
                    </div>
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
