<?php
include '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $nama_poli = $_POST["nama_poli"];
    $keterangan = $_POST["keterangan"];

    $check = "SELECT * FROM poli WHERE nama_poli = '$nama_poli'";
    $data = mysqli_query($koneksi, $check);

    if (mysqli_num_rows($data) > 0) {
        echo '<script>alert("Poli sudah ada");window.location.href = "../../poli.php";</script>';
    } else {
        // Query untuk menambahkan data obat ke dalam tabel
        $query = "INSERT INTO poli (nama_poli, keterangan) VALUES ('$nama_poli', '$keterangan')";


        // if ($koneksi->query($query) === TRUE) {
        // Eksekusi query
        if (mysqli_query($koneksi, $query)) {
            // Jika berhasil, redirect kembali ke halaman utama atau sesuaikan dengan kebutuhan Anda
            // header("Location: ../../index.php");
            // exit();
            echo '<script>
                alert("Data poli berhasil ditambahkan!")
                window.location.href = "../../poli.php" 
            </script>';
            exit();
        } else {
            // Jika terjadi kesalahan, tampilkan pesan error
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    }
}

// Tutup koneksi
mysqli_close($koneksi);
