<?php 
$id_petugas = $_GET['id_petugas'];
include '../koneksi.php';
$sql = "select*from petugas where id_petugas='$id_petugas'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
?>
<h5>Halaman Edit Petugas.</h5>
<a href="?url=petugas" class="btn btn-primary"> KEMBALI </a>
<hr>
<form action="?url=proses-edit-petugas&id_petugas=<?= $id_petugas; ?>" method="post">
    <div class="form-group mb-2">
        <label>Username</label>
        <input value="<?= $data['username'] ?>" type="text" name="username" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>password</label>
        <input value="<?= $data['password'] ?>" type="text" name="password" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Nama Petugas</label>
        <input value="<?= $data['nama_petugas'] ?>" type="text" name="nama_petugas" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Level Petugas</label>
        <select name="level" class="form-control" required>
            <option value="<?= $data['level'] ?>"> <?= $data['level'] ?> </option>
            <option value="admin"> Admin </option>
            <option value="petugas"> Petugas </option>
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit"> SIMPAN </button>
        <button class="btn btn-warning" type="reset"> KOSONGKAN </button>
    </div>
</form>