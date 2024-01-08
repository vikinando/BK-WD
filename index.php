<!DOCTYPE html>
<html lang="en">

<?php
include('header.php');
include('../config/koneksi.php');
?>

<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">

    <!-- Preloader -->
    <?php include('components/preloader.php'); ?>

    <!-- Navbar -->
    <?php include('components/navbar.php'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <?php include('components/logo.php'); ?>

      <!-- Sidebar -->
      <?php include('components/sidebar.php'); ?>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <?php include('components/content-header.php'); ?>
      <!-- /.content-header -->

      <!-- Main content -->
      <?php
      if (isset($_GET['page'])) {
        if ($_GET['page'] == 'pasien-baru') {
          include('components/pasien_baru.php');
        } else if ($_GET['page'] == 'pasien-lama') {
          include('components/pasien_lama.php');
        }
      }
      ?>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include('footer.php'); ?>
</body>

</html>