<?php 
header("Content-Type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan-Pembayaran-SPP.xls");
?>
<h5>Laporan Pembayaran SPP.</h5>
<hr>
<table border="1">
    <thead style="background-color: #f2f2f2;">
        <tr>
            <th>No</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Tahun SPP</th>
            <th>Nominal Dibayar</th>
            <th>Sudah Dibayar</th>
            <th>Tanggal Bayar</th>
            <th>Petugas</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    include '../koneksi.php';
    $no = 1;
    $sql = "SELECT pembayaran.*, siswa.nisn, siswa.nama, kelas.kelas, jurusan.kompetensi_keahlian, spp.tahun, spp.nominal, petugas.nama_petugas 
            FROM pembayaran 
            JOIN siswa ON pembayaran.id_siswa = siswa.id_siswa 
            JOIN kelas ON siswa.id_kelas = kelas.id_kelas 
            JOIN jurusan ON siswa.id_jurusan = jurusan.id_jurusan 
            JOIN spp ON pembayaran.id_spp = spp.id_spp 
            JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas 
            ORDER BY tgl_bayar DESC";
    $query = mysqli_query($koneksi, $sql);
    while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nisn']; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['kelas']; ?></td>
            <td><?= $data['kompetensi_keahlian']; ?></td>
            <td><?= $data['tahun']; ?></td>
            <td><?= number_format($data['nominal'], 2, ',', '.'); ?></td>
            <td><?= number_format($data['jumlah_bayar'], 2, ',', '.'); ?></td>
            <td><?= $data['tgl_bayar']; ?></td>
            <td><?= $data['nama_petugas']; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
