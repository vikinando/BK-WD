<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Pendaftaran poli</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" id="pasienForm" action="pages/daftarPoli/daftarPoli.php">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="no_rm">No RM</label>
                                <input type="text" class="form-control" placeholder="isikan no RM" name="no_rm">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Poli</label>
                                <select class="form-control" name="poli" required id="poli">
                                    <?php
                                    // Ambil data poli dari database dan isi dropdown
                                    require "config/koneksi.php";
                                    $resultPoli = mysqli_query($koneksi, "SELECT * FROM poli");
                                    while ($rowPoli = mysqli_fetch_assoc($resultPoli)) { ?>
                                        <option value="<?php echo $rowPoli['id'] ?>">
                                            <?php echo $rowPoli['nama_poli'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jadwal</label>
                                <select class="form-control" id="jadwal" name="jadwal" required>

                                </select>
                            </div>
                            <div class="form-group" name="keluhan">
                                <label>Keluhan</label>
                                <input type="text" class="form-control" placeholder="Masukkan keluhan" name="keluhan" required>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>