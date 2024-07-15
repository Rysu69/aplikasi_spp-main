<?php 
$id_spp = $_GET['id_spp'];
include '../koneksi.php';
$sql = "select*from spp where id_spp='$id_spp'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
?>
<h5>Halaman Edit Data SPP.</h5>
<a href="?url=spp" class="btn btn-primary"> KEMBALI </a>
<hr>
<form action="?url=proses-edit-spp&id_spp=<?= $id_spp; ?>" method="post">
    <div class="form-group mb-2">
        <label>Tahun</label>
        <input value="<?= $data['tahun'] ?>" name="tahun" maxlength="25" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Nominal</label>
        <input value="<?= $data['nominal'] ?>" type="number" name="nominal" maxlength="13" class="form-control" required>
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit"> SIMPAN </button>
        <button class="btn btn-warning" type="reset"> KOSONGKAN </button>
    </div>
</form>