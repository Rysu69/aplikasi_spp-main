<?php 
$id_jurusan = $_GET['id_jurusan'];
include '../koneksi.php';
$sql = "select*from jurusan where id_jurusan='$id_jurusan'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
?>
<h5>Halaman Edit Data Kelas.</h5>
<a href="?url=jurusan" class="btn btn-primary"> KEMBALI </a>
<hr>
<form action="?url=proses-edit-jurusan&id_jurusan=<?= $id_jurusan; ?>" method="post">
    <div class="form-group mb-2">
        <label>Nama jurusan</label>
        <input value="<?= $data['kompetensi_keahlian'] ?>" type="text" name="kompetensi_keahlian"class="form-control" required>
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit"> SIMPAN </button>
        <button class="btn btn-warning" type="reset"> KOSONGKAN </button>
    </div>
</form>