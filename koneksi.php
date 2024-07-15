<?php 
$koneksi = mysqli_connect('localhost','root','','db_spp_haris');

if(!$koneksi){
    echo "Koneksi gagal";
}