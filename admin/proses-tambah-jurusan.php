<?php 

$kompetensi_keahlian = $_POST['kompetensi_keahlian'];

include'../koneksi.php';
$sql = "INSERT INTO jurusan(kompetensi_keahlian) VALUES('$kompetensi_keahlian')";
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