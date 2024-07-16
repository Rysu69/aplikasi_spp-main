<?php 
$nisn = $_SESSION['nisn'];
?>
        <table class="table table-bordered table-hover">
        <thead class="table-secondary">
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
    <?php 
    include'../koneksi.php';
    $no = 1;
        $sql = "SELECT*FROM pembayaran,siswa,kelas,jurusan,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND siswa.id_jurusan=jurusan.id_jurusan AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas AND pembayaran.nisn='$nisn' ORDER BY tgl_bayar DESC";
    $query = mysqli_query($koneksi, $sql);
    foreach($query as $data){
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nisn']; ?></td>
            <td><?= $data['nis']; ?></td>
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