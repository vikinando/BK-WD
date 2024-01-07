<?php
session_start();

$id_pasien = isset($_SESSION['id']) ? $_SESSION['id'] : '';

if (empty($id_pasien)) {
    // Jika id_pasien tidak tersedia, mungkin perlu memberi tahu pengguna untuk login atau memulai sesi.
    // Sesuaikan dengan kebutuhan Anda.
    header("Location: login_page.php");
    exit();
}

// Periksa koneksi ke database
require '../config/config.php';

// Fungsi untuk mengambil nomor antrian
function ambilNomerAntrian($id_jadwal)
{
    global $conn;

    // Ambil data jadwal_periksa
    $sql = "SELECT * FROM jadwal_periksa WHERE id = '$id_jadwal'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Ambil data daftar_poli
    $sql = "SELECT * FROM daftar_poli WHERE id_jadwal = '$id_jadwal'";
    $result = mysqli_query($conn, $sql);

    // Jika tidak ada data daftar_poli, nomor antrian = 1
    if (mysqli_num_rows($result) == 0) {
        return 1;
    }

    // Jika ada data daftar_poli, ambil nomor antrian terakhir
    $sql = "SELECT MAX(no_antrian) AS max_antrian FROM daftar_poli WHERE id_jadwal = '$id_jadwal'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $max_antrian = $row['max_antrian'];

    // Nomor antrian = nomor antrian terakhir + 1
    return $max_antrian + 1;
}

// Tangkap data dari formulir
$id_pasien = isset($_POST['id']) ? $_POST['id'] : '';
$id_jadwal = isset($_POST['jadwal']) ? $_POST['jadwal'] : '';
$keluhan = isset($_POST['keluhan']) ? $_POST['keluhan'] : '';

// Pengecekan apakah id_jadwal valid
$sql_check_jadwal = "SELECT COUNT(*) AS jadwal_count FROM jadwal_periksa WHERE id = '$id_jadwal'";
$result_check_jadwal = mysqli_query($conn, $sql_check_jadwal);
$row_check_jadwal = mysqli_fetch_assoc($result_check_jadwal);
if ($row_check_jadwal['jadwal_count'] == 0) {
    echo "Error: id_jadwal tidak valid.";
    exit();
}




// Ambil nomor antrian
$no_antrian = ambilNomerAntrian($id_jadwal);

// Memasukkan data ke dalam tabel daftar_poli
$query = "INSERT INTO daftar_poli (id_pasien, id_jadwal, keluhan, no_antrian) VALUES ('$id_pasien', '$id_jadwal', '$keluhan', '$no_antrian')";
if (mysqli_query($conn, $query)) {

    header("Location: ../pasien/pendaftaran_poli.php?no_antrian=$no_antrian");
    exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
// Menutup koneksi ke database
mysqli_close($conn);

?>

