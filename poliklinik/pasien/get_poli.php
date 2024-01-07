<?php
// get_poli.php

require '../config/config.php';

$sql_poli = "SELECT * FROM poli";
$result_poli = mysqli_query($conn, $sql_poli);

if ($result_poli && mysqli_num_rows($result_poli) > 0) {
    $poliArray = [];
    while ($row_poli = mysqli_fetch_assoc($result_poli)) {
        $poliArray[] = $row_poli;
    }

    echo json_encode($poliArray);
} else {
    echo json_encode(['error' => 'Tidak ada data poli.']);
}

mysqli_close($conn);
?>
