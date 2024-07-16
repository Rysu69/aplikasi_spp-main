<?php 
header("Content-Type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan-Pembayaran-SPP.xls");
?>
<h5>Laporan Pembayaran SPP.</h5>
<hr>
        <table class="table table-bordered table-hover">
        <thead class="table-secondary">
    <tr class="fw-bold">
        <td>No</td>
        <td>NISN</td>
        <td>Nama</td>
        <td>Kelas</td>
        <td>jurusan</td>
        <td>Tahun SPP</td>
        <td>Nominal Dibayar</td>
        <td>Sudah Dibayar</td>
        <td>Tanggal Bayar</td>
        <td>Petugas</td>
    </tr>
    </thead>
    <?php 
    include'../koneksi.php';
    $no = 1;
        $sql = "SELECT*FROM pembayaran,siswa,kelas,jurusan,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND siswa.id_jurusan=jurusan.id_jurusan AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas ORDER BY tgl_bayar DESC";
    $query = mysqli_query($koneksi, $sql);
    foreach($query as $data){
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nisn']; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['kelas']; ?></td>
            <td><?= $data['kompetensi_keahlian']; ?></td>
            <td><?= $data['tahun']; ?></td>
            <td><?= number_format($data['nominal'],2,',','.'); ?></td>
            <td><?= number_format($data['jumlah_bayar'],2,',','.'); ?></td>
            <td><?= $data['tgl_bayar']; ?></td>
            <td><?= $data['nama_petugas']; ?></td>
        </tr>
    <?php } ?>
</table>