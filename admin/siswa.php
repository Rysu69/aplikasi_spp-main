        <h5>Halaman Data Siswa.</h5>
        <a href="?url=tambah-siswa" class="btn btn-primary"> Tambah Siswa </a>
        <hr>
        <table class="table table-bordered table-hover">
            <thead class="table-secondary">
                <tr class="fw-bold">
                    <td>No</td>
                    <td>NISN</td>
                    <td>NIS</td>
                    <td>Nama</td>
                    <td>Kelas</td>
                    <td>Jurusan</td>
                    <td>Alamat</td>
                    <td>No Telepon</td>
                    <td>SPP</td>
                    <td>Naik Kelas</td>
                    <td>Edit</td>
                    <td>Hapus</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                include '../koneksi.php';
                $no = 1;
                $sql = "select*from siswa,spp,kelas,jurusan WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_jurusan=jurusan.id_jurusan AND siswa.id_spp=spp.id_spp ORDER BY nama ASC";
                $query = mysqli_query($koneksi, $sql);
                foreach($query as $data){
                    $naikkelas = $data['kelas'];
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nisn']; ?></td>
                        <td><?= $data['nis']; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['kelas']; ?></td>
                        <td><?= $data['kompetensi_keahlian']; ?></td>
                        <td><?= $data['alamat']; ?></td>
                        <td><?= $data['no_telp']; ?></td>
                        <td><?= $data['tahun']; ?> - <?= number_format($data['nominal'],2,',','.'); ?></td>
                        <td>
                            <?php if ($naikkelas == 3): ?>
                                <span class='badge text-bg-success'> Lulus </span>
                            <?php else: ?>
                                <form action="?url=update_kelas" method="post">
                                    <input type="hidden" name="id_siswa" value="<?= $data['id_siswa'] ?>">
                                    <button type="submit" class="btn btn-primary">Naik Kelas</button>
                                </form>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="?url=edit-siswa&id_siswa=<?= $data['id_siswa'] ?>" class='btn btn-warning'>EDIT</a>
                        </td>
                        <td>
                            <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data')" href="?url=hapus-siswa&id_siswa=<?= $data['id_siswa'] ?>" class='btn btn-danger'>HAPUS</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
