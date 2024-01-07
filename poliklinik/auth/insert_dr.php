<?php
// Include your database configuration file here
require '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form
    $id_akun = $_POST['id_akun'];
    $id_poli = $_POST['id_poli'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    // Insert data into the dokter table
    $insert_query = "INSERT INTO dokter (id_akun, id_poli, nama, alamat, no_hp) VALUES ('$id_akun', '$id_poli', '$nama', '$alamat', '$no_hp')";

    if (mysqli_query($conn, $insert_query)) {
        header("Location: ../admin/mengelola_dr.php");
        echo "New doctor added successfully.";
        exit();
    } else {
        echo "Error adding doctor: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
