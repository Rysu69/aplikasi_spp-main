<?php 
$id_siswa = $_GET['id_siswa'];
$kekurangan = $_GET['kekurangan'];
include '../koneksi.php';
$sql = "select*from siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp AND id_siswa='$id_siswa'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
?>
<h5>Halaman Pembayaran SPP.</h5>
<a href="?url=pembayaran" class="btn btn-primary"> KEMBALI </a>
<hr>
<form action="?url=proses-tambah-pembayaran&id_siswa=<?= $id_siswa; ?>" method="post">
<input name="id_spp" value="<?= $data['id_spp'] ?>" type="hidden" class="form-control" required>
    <div class="form-group mb-2">
        <label>Nama Petugas</label>
        <input value="<?= $_SESSION['nama_petugas'] ?>" disabled name="nama_petugas"class="form-control" required>
    </div>
        <div class="form-group mb-2">
        <label>ID SISWA</label>
        <input readonly name="id_siswa" value="<?= $data['id_siswa'] ?>" type="text" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>NISN</label>
        <input readonly name="nisn" value="<?= $data['nisn'] ?>" type="text" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Nama Siswa</label>
        <input disabled value="<?= $data['nama'] ?>" type="text" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Tanggal Bayar</label>
        <input type="date" name="tgl_bayar" class="form-control" required>
    </div>
    <!-- <div class="form-group mb-2">
        <label>Bulan Bayar</label>
        <select name="bulan_dibayar" class="form-control" required>
        <option value=""> Pilih Bulan Dibayar </option>
        <option value="Januari">Januari</option>
        <option value="Februari">Februari</option>
        <option value="Maret">Maret</option>
        <option value="April">April</option>
        <option value="Mei">Mei</option>
        <option value="Juni">Juni</option>
        <option value="Juli">Juli</option>
        <option value="Agustus">Agustus</option>
        <option value="September">September</option>
        <option value="Oktober">Oktober</option>
        <option value="November">November</option>
        <option value="Desember">Desember</option>
    </select>
    </div>
    <div class="form-group mb-2">
        <label>Tahun Bayar</label>
        <select name="tahun_dibayar" class="form-control" required>
            <option value=""> Pilih Tahun Bayar </option>
            <?php 
            for($i=2010; $i<=date('Y'); $i++){
                echo"<option value='$i'>$i</option>";
            }
            ?>
        </select>
    </div> -->
    <div class="form-group mb-2">
        <label>Jumlah Bayar (Jumlah yang harus dibayar adalah <b><?= number_format($kekurangan,2,',','.')?></b>)</label>
        <input type="number" name="jumlah_bayar" max="<?= $kekurangan; ?>" class="form-control" required>
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit"> SIMPAN </button>
        <button class="btn btn-warning" type="reset"> KOSONGKAN </button>
    </div>
</form>