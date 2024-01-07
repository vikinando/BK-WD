<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Login Form</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    </head>
    <body>
        <div class="container" style="margin-top: 200px">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                    <?php
                        // Mengecek apakah parameter URL 'noRM' ada
                        if (isset($_GET['noRM'])) {
                            $noRM = $_GET['noRM'];
                            //make alert
                            echo "<div class='alert alert-success' role='alert'>Pendaftaran berhasil! Nomor Rekam Medis Anda: $noRM.</div>";
                        }
                    ?>
                        <div class="card-header">Login</div>
                        <div class="card-body">
                            <form action="./auth/login.php" method="POST">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" id="email" name="email" required />
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" required />
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
                                <a href="register.html" class="btn btn-success">Register Pasien</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
