<?php
// get_dokter_by_poli.php

require '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['poliId'])) {
    $poliId = $_POST['poliId'];

    $sql_dokter = "SELECT id, nama FROM dokter WHERE id_poli = '$poliId'";
    $result_dokter = mysqli_query($conn, $sql_dokter);

    if ($result_dokter && mysqli_num_rows($result_dokter) > 0) {
        $dokterArray = [];
        while ($row_dokter = mysqli_fetch_assoc($result_dokter)) {
            $dokterArray[] = $row_dokter;
        }

        echo json_encode($dokterArray);
    } else {
        echo json_encode(['error' => 'Tidak ada data dokter untuk poli yang dipilih.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request.']);
}

mysqli_close($conn);
?>
