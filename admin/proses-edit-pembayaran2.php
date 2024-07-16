<?php 

$id_pembayaran = $_GET['id_pembayaran'];
$jumlah_bayar = $_POST['jumlah_bayar'];
$tgl_bayar = $_POST['tgl_bayar'];
$id_petugas = $_POST['id_petugas'];  // Changed from nama_petugas to id_petugas

include '../koneksi.php';

$sql = "UPDATE pembayaran SET jumlah_bayar='$jumlah_bayar', tgl_bayar='$tgl_bayar', id_petugas='$id_petugas' WHERE id_pembayaran='$id_pembayaran'";
$query = mysqli_query($koneksi, $sql);

if ($query) {
    header("Location:?url=pembayaran");
} else {
    echo "<script>
    alert('Maaf Data Tidak Tersimpan');
    window.location.assign('?url=pembayaran');
    </script>";
}
?>
