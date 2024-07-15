<?php 

$nama_kelas = $_POST['nama_kelas'];

include'../koneksi.php';
$sql = "INSERT INTO kelas(nama_kelas) VALUES('$nama_kelas')";
$query = mysqli_query($koneksi,$sql);
if ($query){
    header("Location:?url=kelas");
} else {
    echo "<script>
    alert('Maaf Data Tidak Tersimpan');
    window.location.assign('?url=kelas');
    </script>";
}
?>