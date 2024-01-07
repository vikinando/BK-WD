<?php
// get_jadwal_by_dokter.php

require '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dokterId'])) {
    $dokterId = $_POST['dokterId'];

    $sql_jadwal = "SELECT id, hari, jam_mulai, jam_selesai FROM jadwal_periksa WHERE id_dokter = '$dokterId'";
    $result_jadwal = mysqli_query($conn, $sql_jadwal);

    if ($result_jadwal && mysqli_num_rows($result_jadwal) > 0) {
        $jadwalArray = [];
        while ($row_jadwal = mysqli_fetch_assoc($result_jadwal)) {
            $jadwalArray[] = $row_jadwal;
        }

        echo json_encode($jadwalArray);
    } else {
        echo json_encode(['error' => 'Tidak ada jadwal periksa untuk dokter yang dipilih.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request.']);
}

mysqli_close($conn);
?>
