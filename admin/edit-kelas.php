<?php 
$id_kelas = $_GET['id_kelas'];
include '../koneksi.php';
$sql = "select*from kelas where id_kelas='$id_kelas'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
?>
<h5>Halaman Edit Data Kelas.</h5>
<a href="?url=kelas" class="btn btn-primary"> KEMBALI </a>
<hr>
<form action="?url=proses-edit-kelas&id_kelas=<?= $id_kelas; ?>" method="post">
        <div class="form-group mb-2">
        <label>kelas</label>
        <input value="<?= $data['kelas'] ?>" type="number" name="kelas"class="form-control" required>
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit"> SIMPAN </button>
        <button class="btn btn-warning" type="reset"> KOSONGKAN </button>
    </div>
</form>