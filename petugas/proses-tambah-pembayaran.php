<?php 

$id_petugas = $_SESSION['id_petugas'];
$id_siswa = $_POST['id_siswa'];
$tgl_bayar = $_POST['tgl_bayar'];
$id_spp = $_POST['id_spp'];
$jumlah_bayar = $_POST['jumlah_bayar'];


include'../koneksi.php';
$sql = "INSERT INTO pembayaran(id_petugas,id_siswa,tgl_bayar,id_spp,jumlah_bayar) VALUES('$id_petugas','$id_siswa','$tgl_bayar','$id_spp','$jumlah_bayar')";
$query = mysqli_query($koneksi,$sql);
if ($query){
    header("Location:?url=pembayaran");
} else {
    echo "<script>
    alert('Maaf Data Tidak Tersimpan');
    window.location.assign('?url=pembayaran');
    </script>";
}
?>