<?php 

$id_jurusan = $_GET['id_jurusan'];
$kompetensi_keahlian = $_POST['kompetensi_keahlian'];

include'../koneksi.php';
$sql = "UPDATE jurusan SET kompetensi_keahlian='$kompetensi_keahlian' WHERE id_jurusan='$id_jurusan'";
$query = mysqli_query($koneksi,$sql);
if ($query){
    header("Location:?url=jurusan");
} else {
    echo "<script>
    alert('Maaf Data Tidak Tersimpan');
    window.location.assign('?url=jurusan');
    </script>";
}
?>