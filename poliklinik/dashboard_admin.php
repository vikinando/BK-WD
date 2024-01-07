<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Admin - Appointmen</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet" />

        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet" />

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="dashboard_admin.php">Admin</a>
                </div>
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                            </b></a>
                    </li>
                    <li class="dropdown">
                        <a href="index.php" action="./auth/logout.php" class="btn btn-danger">Logout</b></a>
                    </li>
                </ul>
                <!-- Top Menu Items -->

                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="active">
                            <a href="dashboard_admin.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="./admin/data_dr.php"><i class="fa fa-fw fa-user-md"></i> Mengelola Dokter</a>
                        </li>
                        <li>
                            <a href="./admin/data_obat.php"><i class="fa fa-fw fa-medkit"></i> Mengelola Obat</a>
                        </li>
                        <li>
                            <a href="./admin/data_poli.php"><i class="fa fa-fw fa-hospital-o"></i> Mengelola Poli</a>
                        </li>
                        <li>
                            <a href="./admin/data_pasien.php"><i class="fa fa-fw fa-users"></i> Mengelola Pasien</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Dashboard <small>Statistics Overview</small></h1>
                        </div>
                    </div>
                    <!-- /.row -->

                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa fa-medkit fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <?php
                                            require './config/config.php';

                                            $sql = "SELECT COUNT(*) AS total_obat FROM obat";
                                            $result = mysqli_query($conn, $sql);

                                            if ($result) {
                                                $row = mysqli_fetch_assoc($result);
                                                $total_obat = $row['total_obat'];
                                                echo '<div>Total Obat!</div>';
                                                echo '<div class="huge">' . $total_obat . '</div>';
                                                
                                            } else {
                                                echo '<div class="huge">Error</div>';
                                                echo '<div>Error fetching data</div>';
                                            }

                                            mysqli_close($conn);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <a href="./admin/data_obat.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user-md fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                        <?php
                                            require './config/config.php';

                                            $sql = "SELECT COUNT(*) AS total_dokter FROM dokter";
                                            $result = mysqli_query($conn, $sql);

                                            if ($result) {
                                                $row = mysqli_fetch_assoc($result);
                                                $total_dokter = $row['total_dokter'];
                                                echo '<div>Dokter</div>';
                                                echo '<div class="huge">' . $total_dokter . '</div>';
                                                
                                            } else {
                                                echo '<div class="huge">Error</div>';
                                                echo '<div>Error fetching data</div>';
                                            }

                                            mysqli_close($conn);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <a href="./admin/data_dr.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-hospital-o fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                        <?php
                                            require './config/config.php';

                                            $sql = "SELECT COUNT(*) AS total_poli FROM poli";
                                            $result = mysqli_query($conn, $sql);

                                            if ($result) {
                                                $row = mysqli_fetch_assoc($result);
                                                $total_poli = $row['total_poli'];
                                                echo '<div>poli</div>';
                                                echo '<div class="huge">' . $total_poli . '</div>';
                                                
                                            } else {
                                                echo '<div class="huge">Error</div>';
                                                echo '<div>Error fetching data</div>';
                                            }

                                            mysqli_close($conn);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <a href="./admin/data_dr.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                            <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                        <?php
                                            require './config/config.php';

                                            $sql = "SELECT COUNT(*) AS total_pasien FROM pasien";
                                            $result = mysqli_query($conn, $sql);

                                            if ($result) {
                                                $row = mysqli_fetch_assoc($result);
                                                $total_pasien = $row['total_pasien'];
                                                echo '<div>Pasien</div>';
                                                echo '<div class="huge">' . $total_pasien . '</div>';
                                                
                                            } else {
                                                echo '<div class="huge">Error</div>';
                                                echo '<div>Error fetching data</div>';
                                            }

                                            mysqli_close($conn);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <a href="./admin/data_pasien.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <!-- /.row -->

                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="js/plugins/morris/raphael.min.js"></script>
        <script src="js/plugins/morris/morris.min.js"></script>
        <script src="js/plugins/morris/morris-data.js"></script>
    </body>
</html>
