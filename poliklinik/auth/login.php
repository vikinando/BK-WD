<?php
session_start();    
require '../config/config.php';

$email = $_POST['email'];
$password = $_POST['password'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Query untuk mendapatkan password dari email yang diinputkan
$sql = "SELECT * FROM akun WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        // Verifikasi password menggunakan password_verify()
        if (password_verify($password, $row['password'])) {
            // Password cocok, atur sesi atau token otentikasi di sini (jika diperlukan)

            // Redirect ke halaman sesuai dengan role
            if ($row['role'] == 'admin') {
                header("Location: ../dashboard_admin.php");
                $_SESSION['login'] = true;
                $_SESSION['id'] = $row['id'];
            } elseif ($row['role'] == 'pasien') {
                $_SESSION['login'] = true;
                $_SESSION['id'] = $row['id'];
                header("Location: ../dashboard_pasien.php");
            } elseif ($row['role'] == 'dokter') {
                $_SESSION['login'] = true;
                $_SESSION['id'] = $row['id'];
                header("Location: ../dashboard_dokter.php");
                // Handle peran lain jika diperlukan
                echo "Peran tidak valid.";
            }

            // Pastikan untuk menghentikan eksekusi setelah pengalihan header
            exit();
        } else {
            echo "Password tidak valid.";
        }
    } else {
        echo "Akun tidak ditemukan.";
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
