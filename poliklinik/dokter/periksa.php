
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
                <div class="col-lg-12">
                        <h1 class="page-header"> Periksa Pasien</h1>
                    </div>
                    <div>
                        <?php
                        require '../config/config.php';
                        $host = "localhost";  // Ganti dengan host database Anda
                        $user = "root";   // Ganti dengan username database Anda
                        $pass = "";   // Ganti dengan password database Anda
                        $db = "booking_rs"; // Ganti dengan nama database Anda

                        $mysqli = new mysqli($host, $user, $pass, $db);

                        // Periksa koneksi
                        if ($mysqli->connect_error) {
                            die("Koneksi database gagal: " . $mysqli->connect_error);
                        }

                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            // Extract data from the form
                            $id_daftar_poli = $_POST['no'];
                            $id_pasien = $_POST['id_pasien'];
                            $keluhan = $_POST['keluhan'];
                            $no_antrian = $_POST['no_antrian'];
                        
                            // Additional data for inserting into the periksa table
                            $tgl_periksa = date('Y-m-d'); // Assuming you want to use the current date
                            $catatan = $_POST['catatan'];
                            $biaya_periksa = 150000; // Set biaya periksa menjadi 150,000

                        
                            // Insert data into the periksa table
                            $sql_periksa = "INSERT INTO periksa (id_daftar_poli, tgl_periksa, catatan, biaya_periksa) VALUES ('$id_daftar_poli', '$tgl_periksa', '$catatan', '$biaya_periksa')";
                        
                            if (mysqli_query($mysqli, $sql_periksa)) {
                                // Ambil ID periksa yang baru saja diinsert
                                $id_periksa = mysqli_insert_id($mysqli);
                            
                                // Ambil obat yang dipilih dari input form
                                $obat_selected = isset($_POST['obat']) ? $_POST['obat'] : array();
                            
                                // Simpan obat yang baru dipilih ke dalam tabel detail_periksa
                                foreach ($obat_selected as $obat) {
                                    // Ambil ID obat dari tabel obat
                                    $id_obat_result = mysqli_query($mysqli, "SELECT id FROM obat WHERE id = '$obat'");
                                    $id_obat_row = mysqli_fetch_assoc($id_obat_result);
                            
                                    if ($id_obat_row && isset($id_obat_row['id'])) {
                                        $id_obat = $id_obat_row['id'];
                            
                                        // Insert data into the detail_periksa table
                                        $tambah_detail = mysqli_query($mysqli, "INSERT INTO detail_periksa (id_periksa, id_obat) 
                                                                        VALUES (
                                                                            '" . $id_periksa . "',
                                                                            '" . $id_obat . "'
                                                                        )");
                                    } else {
                                        echo "Error: Obat dengan ID $obat tidak ditemukan.";
                                    }
                                }
                            
                                echo "Record inserted successfully";
                            } else {
                                echo "Error inserting into periksa table: " . mysqli_error($mysqli);
                            }
                        }
                        else {
                            $id_jadwal = '';
                            $id_pasien = '';
                            $keluhan = '';
                            $no_antrian = '';

                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];

                                // Fetch existing data for the specified daftar_poli from the database
                                $sql = "SELECT daftar_poli.*, jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai, pasien.nama as nama_pasien
                                                FROM daftar_poli
                                                JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id
                                                JOIN pasien ON daftar_poli.id_pasien = pasien.id
                                                WHERE daftar_poli.id = $id";
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    $row = mysqli_fetch_assoc($result);

                                    $id_jadwal = $row['id_jadwal'];
                                    $id_pasien = $row['id_pasien'];
                                    $keluhan = $row['keluhan'];
                                    $no_antrian = $row['no_antrian'];
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                }
                            }
                        }
                        ?>

                        <!-- Update the HTML form with the additional fields -->
                        <form method="post" action="periksa.php">
                            <input type="hidden" name="no" value="<?php echo $id; ?>">

                            <div class="form-group" hidden>
                                <label for="id_jadwal">Jadwal Periksa:</label>
                                <input type="text" class="form-control" id="id_jadwal" name="id_jadwal" value="<?php echo $row['hari'] . ' ' . $row['jam_mulai'] . ' - ' . $row['jam_selesai']; ?>" required readonly>
                            </div>
                            <div class="form-group" hidden>
                                <label for="id_pasien">Nama Pasien:</label>
                                <input type="text" class="form-control" id="id_pasien" name="id_pasien" value="<?php echo $row['nama_pasien']; ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="keluhan">Keluhan:</label>
                                <input type="text" class="form-control" id="keluhan" name="keluhan" value="<?php echo $keluhan; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="tgl_periksa">Tanggal Periksa:</label>
                                <input type="text" class="form-control" id="tgl_periksa" name="tgl_periksa" value="<?php echo date('Y-m-d'); ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="no_antrian">No Antrian:</label>
                                <input type="text" class="form-control" id="no_antrian" name="no_antrian" value="<?php echo $no_antrian; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="obat">Pilih Obat:</label>
                                <input type="text" class="form-control" id="search_obat" placeholder="Cari obat...">
                                <select multiple class="form-control" id="obat" name="obat[]" onchange="tampilkanObatTerpilih()" required>
                                    <?php
                                    // Ambil data obat dari tabel obat
                                    $sql_obat = "SELECT * FROM obat";
                                    $result_obat = mysqli_query($mysqli, $sql_obat);

                                    if ($result_obat) {
                                        while ($row_obat = mysqli_fetch_assoc($result_obat)) {
                                            echo "<option value='" . $row_obat['id'] . "' data-harga='" . $row_obat['harga'] . "'>" . $row_obat['nama_obat'] . "</option>";
                                        }
                                    } else {
                                        echo "Error: " . $sql_obat . "<br>" . mysqli_error($mysqli);
                                    }
                                    ?>
                                </select>
                            </div>
                            <div id="obat_terpilih_div">
                                <label for="obat_terpilih">Text Box Obat Terpilih:</label>
                                <input type="text" class="form-control" id="obat_terpilih" name="obat_terpilih" readonly>
                            </div>
                            <div class="form-group">
                                <label for="catatan">Catatan:</label>
                                <textarea class="form-control" id="catatan" name="catatan" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="biaya_periksa">Biaya Periksa:</label>
                                <input type="text" class="form-control" id="biaya_periksa" name="biaya_periksa" value="<?php echo 150000?>"readonly> <!-- Biaya periksa diisi otomatis -->
                            </div>
                            <div id="totalHarga">   
                                <h4>Total Biaya :</h4>
                            </div>
                            <button type="submit" class="btn btn-primary" name="simpan">Periksa</button>
                            <button type="button" class="btn btn-primary" onclick="hitungTotalHarga()">Total Biaya</button>
                            <a href="data_daftar_poli.php" class="btn btn-primary">Kembali</a>
                        </form>
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
        <script src="js/jquery.js"></script>
        <!-- Tambahkan skrip JavaScript untuk pencarian obat -->
        <script>
            $(document).ready(function () {
                // Fungsi untuk menangani perubahan pada kotak pencarian
                $('#search_obat').on('input', function () {
                    var searchKeyword = $(this).val().toLowerCase();

                    // Saring opsi obat berdasarkan kata kunci pencarian
                    $('#obat option').each(function () {
                        var optionText = $(this).text().toLowerCase();
                        var optionValue = $(this).val();

                        if (optionText.includes(searchKeyword)) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                });
            });
        </script>
        <script>
            function tampilkanObatTerpilih() {
                var obatSelected = document.getElementById('obat');
                var selectedOptions = obatSelected.selectedOptions;
                var obatTerpilihText = "";

                for (var i = 0; i < selectedOptions.length; i++) {
                    obatTerpilihText += selectedOptions[i].text + ", ";
                }

                // Hapus koma terakhir
                obatTerpilihText = obatTerpilihText.replace(/,\s*$/, "");

                // Tampilkan obat yang sudah dipilih di elemen dengan ID obat_terpilih
                document.getElementById('obat_terpilih').value = obatTerpilihText;
            }
        </script>
        <script>
            function hitungTotalHarga() {
                // Ambil nilai biaya_periksa dari input
                var biayaPeriksa = parseFloat(document.getElementById('biaya_periksa').value);

                // Ambil nilai obat yang dipilih
                var obatSelected = document.getElementById('obat');
                var selectedOptions = obatSelected.selectedOptions;
                var totalHargaObat = 0;

                // Hitung total harga obat yang dipilih
                for (var i = 0; i < selectedOptions.length; i++) {
                    totalHargaObat += parseFloat(selectedOptions[i].getAttribute('data-harga'));
                }

                // Hitung total harga keseluruhan
                var totalHarga = biayaPeriksa + totalHargaObat;

                // Tampilkan total harga di dalam elemen dengan ID totalHarga
                document.getElementById('totalHarga').innerHTML = 'Total Harga: ' + totalHarga;
            }
        </script>

<!-- Element HTML untuk menampilkan nama poli -->


        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
