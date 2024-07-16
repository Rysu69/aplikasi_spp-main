<?php 

$nisn = $_GET['nisn'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$id_kelas = $_POST['id_kelas'];
$id_jurusan = $_POST['id_jurusan'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$id_spp = $_POST['id_spp'];

include'../koneksi.php';
$sql = "UPDATE siswa SET nis='$nis',nama='$nama',id_kelas='$id_kelas',id_jurusan='$id_jurusan',alamat='$alamat',no_telp='$no_telp',id_spp='$id_spp' WHERE nisn='$nisn'";
$query = mysqli_query($koneksi,$sql);
if ($query){
    header("Location:?url=siswa");
} else {
    echo "<script>
    alert('Maaf Data Tidak Tersimpan');
    window.location.assign('?url=siswa');
    </script>";
}
?>