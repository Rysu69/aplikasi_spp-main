<?php 

$id_jurusan = $_GET['id_jurusan'];

include'../koneksi.php';
$sql = "DELETE FROM jurusan WHERE id_jurusan='$id_jurusan'";
$query = mysqli_query($koneksi,$sql);
if ($query){
    header("Location:?url=jurusan");
} else {
    echo "<script>
    alert('Maaf Data Tidak Terhapus');
    window.location.assign('?url=jurusan');
    </script>";
}
?>