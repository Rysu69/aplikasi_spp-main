<h5>Laporan Pembayaran SPP.</h5>
<a href="cetak-laporan.php" class="btn btn-primary"> Cetak Laporan </a>
<hr>
        <table class="table table-bordered table-hover">
        <thead class="table-secondary">
    <tr class="fw-bold">
        <td>No</td>
        <td>Nama</td>  
        <td>NISN</td>
        <td>Kelas</td>
        <td>Nama Kelas</td>
        <td>Tahun SPP</td>
        <td>Nominal Dibayar</td>
        <td>Sudah Dibayar</td>
        <td>Tanggal Bayar</td>
        <td>Petugas</td>
        <td>Edit</td>
        <td>Hapus</td>
    </tr>
   </thead>
    <?php 
    include'../koneksi.php';
    $no = 1;
        $sql = "SELECT*FROM pembayaran,siswa,kelas,jurusan,spp,petugas WHERE pembayaran.id_siswa=siswa.id_siswa
         AND siswa.id_kelas=kelas.id_kelas AND siswa.id_jurusan=jurusan.id_jurusan AND pembayaran.id_spp=spp.id_spp
          AND pembayaran.id_petugas=petugas.id_petugas ORDER BY tgl_bayar DESC";
    $query = mysqli_query($koneksi, $sql);
    foreach($query as $data){
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nama']; ?></td>      
            <td><?= $data['nisn']; ?></td>
            <td><?= $data['kelas']; ?></td>
            <td><?= $data['kompetensi_keahlian']; ?></td>
            <td><?= $data['tahun']; ?></td>
            <td><?= number_format($data['nominal'],2,',','.'); ?></td>
            <td><?= number_format($data['jumlah_bayar'],2,',','.'); ?></td>
            <td><?= $data['tgl_bayar']; ?></td>
            <td><?= $data['nama_petugas']; ?></td>
            <td>
                <a href="?url=edit-pembayaran&id_pembayaran=<?= $data['id_pembayaran'] ?>" class='btn btn-warning'>EDIT</a>
            </td>
            <td>
                <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data')" href="?url=hapus-pembayaran&id_pembayaran=<?= $data['id_pembayaran'] ?>" class='btn btn-danger'>HAPUS</a>
            </td>
        </tr>
    <?php } ?>
</table>