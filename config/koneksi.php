<?php

$koneksi = mysqli_connect("localhost", "root", "", "poli");

// cek koneksi
if (!$koneksi) {
    die("koneksi gagal: " . mysqli_connect_error());
}
