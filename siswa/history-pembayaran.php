<?php

if (empty($_SESSION['nisn']) || empty($_SESSION['nis'])) {
    echo "NISN or NIS is not set.";
    exit;
}

$nisn = $_SESSION['nisn'];
$nis = $_SESSION['nis'];

include '../koneksi.php';

// Fetch id_siswa using nisn and nis
$sql = "SELECT id_siswa FROM siswa WHERE nisn='$nisn' AND nis='$nis'";
$result = mysqli_query($koneksi, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    $id_siswa = $data['id_siswa'];
} else {
    echo "No student found with the provided NISN and NIS.";
    exit;
}
?>
<table class="table table-bordered table-hover">
    <thead class="table-secondary">
        <tr>
            <td>No</td>
            <td>NISN</td>
            <td>NIS</td>
            <td>Nama</td>
            <td>Kelas</td>
            <td>Jurusan</td>
            <td>Tahun SPP</td>
            <td>Nominal Dibayar</td>
            <td>Sudah Dibayar</td>
            <td>Tanggal Bayar</td>
            <td>Petugas</td>
        </tr>
    </thead>
    <tbody>
    <?php 
    $no = 1;
    $sql = "SELECT pembayaran.*, siswa.*, kelas.*, jurusan.*, spp.*, petugas.*
            FROM pembayaran
            JOIN siswa ON pembayaran.id_siswa = siswa.id_siswa
            JOIN kelas ON siswa.id_kelas = kelas.id_kelas
            JOIN jurusan ON siswa.id_jurusan = jurusan.id_jurusan
            JOIN spp ON pembayaran.id_spp = spp.id_spp
            JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas
            WHERE pembayaran.id_siswa = '$id_siswa'
            ORDER BY tgl_bayar DESC";
    $query = mysqli_query($koneksi, $sql);
    if (mysqli_num_rows($query) > 0) {
        foreach ($query as $data) {
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nisn']; ?></td>
            <td><?= $data['nis']; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['kelas']; ?></td>
            <td><?= $data['kompetensi_keahlian']; ?></td>
            <td><?= $data['tahun']; ?></td>
            <td><?= number_format($data['nominal'], 2, ',', '.'); ?></td>
            <td><?= number_format($data['jumlah_bayar'], 2, ',', '.'); ?></td>
            <td><?= $data['tgl_bayar']; ?></td>
            <td><?= $data['nama_petugas']; ?></td>  
        </tr>
    <?php 
        }
    } else {
        echo "<tr><td colspan='11'>No data found</td></tr>";
    }
    ?>
    </tbody>
</table>
