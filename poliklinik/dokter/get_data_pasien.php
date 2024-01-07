<?php

require '../config/config.php';

if (isset($_GET['id_pasien'])) {
    $id_pasien = $_GET['id_pasien'];

    // Query untuk mendapatkan data pasien berdasarkan ID
    $sql = "SELECT * FROM pasien WHERE id = '$id_pasien'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Mengembalikan data dalam format JSON
            echo json_encode($row);
        } else {
            echo json_encode(['error' => 'Data pasien tidak ditemukan']);
        }
    } else {
        echo json_encode(['error' => 'Error: ' . $sql . '<br>' . mysqli_error($conn)]);
    }
} else {
    echo json_encode(['error' => 'ID pasien tidak disediakan']);
}

mysqli_close($conn);
?>
