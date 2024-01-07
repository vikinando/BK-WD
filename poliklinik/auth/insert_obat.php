<?php
require '../config/config.php';


$nama = $_POST['nama_obat'];
$kemasan = $_POST['kemasan'];
$harga = $_POST['harga'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Query SQL
    $sql = "INSERT INTO obat (nama_obat, kemasan, harga) VALUES ('$nama', '$kemasan', '$harga')";

    if (mysqli_query($conn, $sql)) {
         // Arahkan kembali ke halaman admin mengelola_obat.html
        header("Location: ../admin/mengelola_obat.html");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
