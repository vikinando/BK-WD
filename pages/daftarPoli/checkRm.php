<?php
include('../../config/koneksi.php');

if ($_SERVER == 'POST') {
    $no_rm = $_POST['no_rm'];
    $result = mysqli_query($koneksi, "SELECT * FROM pasien WHERE no_rm = '$no_rm'");
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);


        header("location:../../dashboard.php");
    } else {
        echo '<script>alert("Email atau password salah");location.href="../../login.php";</script>';
    }
}
