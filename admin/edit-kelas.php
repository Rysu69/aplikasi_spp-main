<?php 
$id_kelas = $_GET['id_kelas'];
include '../koneksi.php';
$sql = "select*from kelas where id_kelas='$id_kelas'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
?>
<h5>Halaman Edit Data Kelas.</h5>
<a href="?url=spp" class="btn btn-primary"> KEMBALI </a>
<hr>
<form action="?url=proses-edit-kelas&id_kelas=<?= $id_kelas; ?>" method="post">
    <div class="form-group mb-2">
        <label>Nama kelas</label>
        <input value="<?= $data['nama_kelas'] ?>" type="text" name="nama_kelas"class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Kompetensi Keahlian</label>
        <input value="<?= $data['kompetensi_keahlian'] ?>" type="text" name="kompetensi_keahlian" class="form-control" required>
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit"> SIMPAN </button>
        <button class="btn btn-warning" type="reset"> KOSONGKAN </button>
    </div>
</form>