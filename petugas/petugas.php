<?php
session_start();

if(empty($_SESSION['id_petugas'])) {
    echo "<script>
    alert('Maaf anda belum login');
    window.location.assign('../index2.php');
    </script>";
}

if($_SESSION['level']!='petugas') {
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
    <title>Petugas - Aplikasi Pembayaran SPP</title>
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
            Anda Login Sebagai Petugas <b><?= $_SESSION['nama_petugas'] ?></b> Aplikasi Pembayaran SPP.
        </div>

        <a href="petugas.php" class="btn btn-primary"> Petugas</a>
        <!-- <a href="petugas.php?url=pembayaran" class="btn btn-primary"> Pembayaran</a> -->
        <a onclick="return confirm('Apakah Anda Yakin Ingin Logout')" href="petugas.php?url=logout" class="btn btn-danger"> Logout</a>

        
        <div class="card mt-2">
            <div class="card-body">
                
                <!-- isi web  -->
                <?php 
            
            $file = @$_GET['url'];
            if(empty($file)){
                echo"<h4>Selamat Datang Di Halaman Pembayaran Petugas. </h4> <hr>";
                // echo"Aplikasi Pembayaran SPP digunakan untuk mempermudah dalam mencatat pembayaran siswa / siswi di sekolah";
                include 'pembayaran2.php';
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