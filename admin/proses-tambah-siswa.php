<?php 

$nisn = $_POST['nisn'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$id_kelas = $_POST['id_kelas'];
$id_jurusan = $_POST['id_jurusan'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$id_spp = $_POST['id_spp'];

$kompetensi_keahlian = $_POST['kompetensi_keahlian'];

include'../koneksi.php';
$sql = "INSERT INTO siswa(nisn,nis,nama,id_kelas,id_jurusan,alamat,no_telp,id_spp) VALUES('$nisn','$nis','$nama','$id_kelas','$id_jurusan','$alamat','$no_telp','$id_spp')";
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