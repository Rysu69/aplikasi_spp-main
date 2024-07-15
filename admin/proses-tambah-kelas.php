<?php 

$kelas = $_POST['kelas'];

include'../koneksi.php';
$sql = "INSERT INTO kelas(kelas) VALUES('$kelas')";
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