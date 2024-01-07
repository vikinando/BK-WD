<?php
require '../config/config.php';

function generateNoRM($currentYear, $currentMonth, $existingPatientsCount) {

    // Format nomor rekam medis: TahunBulan-totalData+1
    $noRM = $currentYear . str_pad($currentMonth, 2, '0', STR_PAD_LEFT) . '-' . str_pad($existingPatientsCount + 1, 3, '0', STR_PAD_LEFT);
    return $noRM;
}
// Data dari formulir pendaftaran
$email = $_POST['email'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_ktp = $_POST['no_ktp'];
$no_hp = $_POST['no_hp'];

// Role default (pasien)
$defaultRole = 'pasien';

// Hash password menggunakan password_hash()
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Mulai transaksi
mysqli_begin_transaction($conn);

try {
    // Cek apakah pasien sudah terdaftar berdasarkan nomor KTP
    $sqlCheckPasien = "SELECT COUNT(*) as count FROM pasien WHERE no_ktp = '$no_ktp'";
    $resultCheckPasien = mysqli_query($conn, $sqlCheckPasien);
    $rowCheckPasien = mysqli_fetch_assoc($resultCheckPasien);
    $existingPatientsCount = $rowCheckPasien['count'];
    // Ambil jumlah pasien yang sudah terdaftar dari tabel pasien
    $checktotalpasien = "SELECT COUNT(*) as counts FROM pasien";
    $resulttotalpasien = mysqli_query($conn, $checktotalpasien);
    $rowtotalpasien = mysqli_fetch_assoc($resulttotalpasien);
    $total = $rowtotalpasien['counts'];
    

    if ($existingPatientsCount > 0) {
        // Pasien sudah terdaftar, berikan feedback atau lakukan tindakan lain
        echo "Pasien sudah terdaftar.";
    } else {
        // Pasien belum terdaftar, lakukan pendaftaran
        $sqlAkun = "INSERT INTO akun (email, password, role) VALUES ('$email', '$hashedPassword', '$defaultRole')";
        mysqli_query($conn, $sqlAkun);

        // Ambil ID akun yang baru saja dibuat
        $id_akun = mysqli_insert_id($conn);

        // Ambil informasi waktu saat ini
        $currentYear = date("Y");
        $currentMonth = date("m");

        // Generate nomor rekam medis baru
        $noRM = generateNoRM($currentYear, $currentMonth, $total);

        // Insert data ke tabel pasien dengan ID akun yang baru saja dibuat dan nomor rekam medis baru
        $sqlPasien = "INSERT INTO pasien (id_akun, nama, alamat, no_ktp, no_hp, no_rm) VALUES ('$id_akun', '$nama', '$alamat', '$no_ktp', '$no_hp', '$noRM')";
        mysqli_query($conn, $sqlPasien);

        // Commit transaksi
        mysqli_commit($conn);

        header("Location: ../index.php?noRM=$noRM");
        exit();
    }
} catch (Exception $e) {
    // Rollback transaksi jika terjadi kesalahan
    mysqli_rollback($conn);
    echo "Pendaftaran gagal: " . $e->getMessage();
}

// Tutup koneksi
mysqli_close($conn);
?>
