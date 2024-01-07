<?php
require '../config/config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir
    $id_dokter = $_POST['id'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];

    // Validasi data jika diperlukan

    // Insert data ke dalam tabel jadwal_periksa
    $sql = "INSERT INTO jadwal_periksa (id_dokter, hari, jam_mulai, jam_selesai) VALUES ('$id_dokter', '$hari', '$jam_mulai', '$jam_selesai')";

    if (mysqli_query($conn, $sql)) {
        // Jika berhasil, redirect ke halaman lain atau tampilkan pesan sukses
        echo "New record created successfully";
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
