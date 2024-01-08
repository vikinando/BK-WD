<?php
include('config/koneksi.php');
$tahunBulan = date('Ym');

$getLastData = 'SELECT * FROM pasien ORDER BY no_rm DESC limit 1';
$querygetData = mysqli_query($koneksi, $getLastData);
$lastData = mysqli_fetch_assoc($querygetData);
$substring = substr($lastData['no_rm'], 7);
$urutanTerakhir = (int) $substring;
$urutanTerakhir += 1;
if ($urutanTerakhir > 99) {
    $no_rm_baru = $tahunBulan . '-' . $urutanTerakhir;
} else if ($urutanTerakhir > 9 && $urutanTerakhir < 100) {
    $no_rm_baru = $tahunBulan . '-' . '0' . $urutanTerakhir;
} else if ($urutanTerakhir <= 9) {
    $no_rm_baru = $tahunBulan . '-' . '00' . $urutanTerakhir;
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Pendaftaran pasien Baru</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" id="pasienForm" action="pages/daftarPasien/checkPasien.php">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" class="form-control" placeholder="isikan nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">alamat</label>
                                <input type="text" class="form-control" placeholder="isikan alamat" name="alamat" required>
                            </div>
                            <div class="form-group">
                                <label for="nomor hp">Nomor HP</label>
                                <input type="text" class="form-control" placeholder="isikan nomor HP" name="no_hp" required>
                            </div>
                            <div class="form-group">
                                <label for="nomor ktp">nomor ktp</label>
                                <input type="text" class="form-control" placeholder="isikan nomor ktp" name="no_ktp" required>
                            </div>
                            <div class="form-group">
                                <label for="nomor RM">nomor RM</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="no_rm" id="no_rm" value="<?php echo $no_rm_baru; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
                <!-- /.card -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>