<?php
include '../koneksi.php';

// Fetch data for the form
$id_pembayaran = $_GET['id_pembayaran'];
$sql = "SELECT pembayaran.*, siswa.nama, kelas.kelas, jurusan.kompetensi_keahlian, spp.tahun, spp.nominal, petugas.nama_petugas 
        FROM pembayaran
        JOIN siswa ON pembayaran.nisn = siswa.nisn
        JOIN kelas ON siswa.id_kelas = kelas.id_kelas
        JOIN jurusan ON siswa.id_jurusan = jurusan.id_jurusan
        JOIN spp ON pembayaran.id_spp = spp.id_spp
        JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas
        WHERE pembayaran.id_pembayaran = '$id_pembayaran'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);

if (!$data) {
    echo "Data not found!";
    exit;
}
?>

<h5>Halaman Edit Data Pembayaran.</h5>
<a href="?url=pembayaran" class="btn btn-primary">KEMBALI</a>
<hr>
<form action="?url=proses-edit-pembayaran2&id_pembayaran=<?= $id_pembayaran; ?>" method="post">
    <div class="form-group mb-2">
        <label>NISN</label>
        <input value="<?= $data['nisn'] ?>" readonly type="number" name="nisn" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Nama</label>
        <input value="<?= $data['nama'] ?>" readonly type="text" name="nama" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Kelas</label>
        <input value="<?= $data['kelas'] ?>" readonly type="text" name="kelas" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Jurusan</label>
        <input value="<?= $data['kompetensi_keahlian'] ?>" readonly type="text" name="kompetensi_keahlian" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>SPP</label>
        <select class="form-control" disabled>
            <option value="<?= $data['id_spp'] ?>"> <?= $data['tahun']; ?> | <?= number_format($data['nominal'], 2, ',', '.'); ?> </option>
            <?php
            $spp = mysqli_query($koneksi, "SELECT * FROM spp ORDER BY id_spp ASC");
            foreach ($spp as $data_spp) {
            ?>
            <option value="<?= $data_spp['id_spp'] ?>"> <?= $data_spp['tahun']; ?> | <?= number_format($data_spp['nominal'], 2, ',', '.'); ?> </option>
            <?php } ?>
        </select>
        <input type="hidden" name="id_spp" value="<?= $data['id_spp'] ?>">
    </div>
    <div class="form-group mb-2">
        <label>Nominal bayar</label>
        <input value="<?= $data['jumlah_bayar'] ?>" type="number" name="jumlah_bayar" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Tanggal Bayar</label>
        <input value="<?= $data['tgl_bayar'] ?>" type="date" name="tgl_bayar" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Petugas</label>
        <select name="id_petugas" class="form-control" required>
            <option value="<?= $data['id_petugas'] ?>"> <?= $data['nama_petugas'] ?> </option>
            <?php
            $petugas = mysqli_query($koneksi, "SELECT * FROM petugas ORDER BY nama_petugas ASC");
            foreach ($petugas as $data_petugas) {
            ?>
            <option value="<?= $data_petugas['id_petugas'] ?>"> <?= $data_petugas['nama_petugas']; ?> </option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">SIMPAN</button>
        <button type="reset" class="btn btn-warning">KOSONGKAN</button>
    </div>
</form>
