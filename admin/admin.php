<?php
session_start();

/**
 * Check if the user is logged in and has administrator privileges
 */
if(empty($_SESSION['id_petugas'])) {
    echo "<script>
    alert('Maaf anda belum login');
    window.location.assign('../index2.php');
    </script>";
}

if($_SESSION['level']!='admin') {
    echo "<script>
        alert('Maaf anda bukan sesi admin');
        window.location.assign('../index2.php');
        </script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Aplikasi Pembayaran SPP</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    
    <div class="container mt-5">
        
        <h3>Aplikasi Pembayaran SPP SD Islam AL-Quds.</h3>
        <div class="alert alert-info">
            Anda Login Sebagai <b>ADMINISTRATOR</b> Aplikasi Pembayaran SPP.
        </div>

        <!-- Menu options -->
        <a href="admin.php" class="btn btn-primary"> Administrator</a>
        <a href="admin.php?url=spp" class="btn btn-primary"> SPP</a>
        <!-- <a href="admin.php?url=kelas" class="btn btn-primary"> Kelas</a> -->
        <a href="admin.php?url=jurusan" class="btn btn-primary"> Kelas</a>
        <a href="admin.php?url=siswa" class="btn btn-primary"> Siswa</a>
        <a href="admin.php?url=petugas" class="btn btn-primary"> Petugas</a>
        <a href="admin.php?url=pembayaran" class="btn btn-primary"> Pembayaran</a>
        <a href="admin.php?url=laporan" class="btn btn-primary"> Laporan</a>
        <a href="admin.php?url=logout" class="btn btn-danger"> Logout</a>

        
        <div class="card mt-2">
            <div class="card-body">
                
                <!-- Display content based on URL parameter -->
                <?php 
                /**
                 * Get the URL parameter and include the corresponding file
                 *
                 * @param string $file URL parameter
                 */
                $file = @$_GET['url'];
                if(empty($file)){
                    echo"<h4>Selamat Datang di halaman Administrator. </h4>";
                    // echo"Aplikasi Pembayaran SPP digunakan untuk mempermudah dalam mencatat pembayaran siswa / siswi di sekolah";
                    include "beranda.php";
                } else {
                    include $file.'.php';
                }
               ?>
                
            </div>
        </div>

    </div>

<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>