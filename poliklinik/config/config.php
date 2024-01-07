<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "booking_rs";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Koneksi Gagal: " . mysqli_connect_error());
}
?>