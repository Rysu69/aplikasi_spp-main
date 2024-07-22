<?php
session_start();

if (empty($_SESSION['nisn'])) {
    echo "<script>
    alert('Maaf anda belum login');
    window.location.assign('../index.php');
    </script>";
    exit;
}

// Store NISN and NIS from URL to session if they are provided
if (isset($_GET['nisn']) && isset($_GET['nis'])) {
    $_SESSION['nisn'] = $_GET['nisn'];
    $_SESSION['nis'] = $_GET['nis'];
}

$nisn = $_SESSION['nisn'];
$nis = $_SESSION['nis'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa - Aplikasi Pembayaran SPP</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fc;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3>Aplikasi Pembayaran SPP SD Islam AL-Quds.</h3>
        <div class="alert alert-info">
            Anda Login Sebagai Siswa <b><?= $_SESSION['nama'] ?></b> Aplikasi Pembayaran SPP.
        </div>

        <a href="siswa.php" class="btn btn-primary">Siswa</a>
        <a href="siswa.php?url=logout" class="btn btn-danger">Logout</a>

        <div class="card mt-2">
            <div class="card-body">
                <!-- isi web -->
                <?php 
                $file = @$_GET['url'];
                if (empty($file)) {
                    echo "<h4>Selamat Datang di History Pembayaran Siswa. </h4>";
                    echo "<hr>";
                    include "history-pembayaran.php";
                } else {
                    include $file . '.php';
                }
                ?>
            </div>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
