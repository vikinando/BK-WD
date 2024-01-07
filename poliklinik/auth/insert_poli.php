<?php
require '../config/config.php';


$nama = $_POST['nama_poli'];
$ket = $_POST['keterangan'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Query SQL
    $sql = "INSERT INTO poli (nama_poli, keterangan) VALUES ('$nama', '$ket')";

    if (mysqli_query($conn, $sql)) {
         // Arahkan kembali ke halaman admin mengelola_obat.html
        header("Location: ../admin/mengelola_poli.html");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
