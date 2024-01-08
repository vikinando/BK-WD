<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <!-- Messages Dropdown Menu -->
        <!-- Notifications Dropdown Menu -->
        <?php if (!isset($_SESSION['username'])) { ?>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="login.php" class="nav-link">Login</a>
            </li>
        <?php } else { ?>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="pages/logout/logout.php" class="nav-link">Logout</a>
            </li>
        <?php } ?>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>