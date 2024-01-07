<?php
require '../config/config.php';

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Menggunakan password_hash untuk menyimpan password yang aman
    $role = "dokter"; // Default role

    // Query untuk memasukkan data ke dalam tabel akun
    $sql = "INSERT INTO akun (email, password, role) VALUES ('$email', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../admin/mengelola_dr.php");
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi
$conn->close();
?>