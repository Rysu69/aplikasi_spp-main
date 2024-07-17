<h5>Halaman Data Kelas.</h5>
<a href="?url=tambah-jurusan" class="btn btn-primary"> Tambah Kelas </a>
<hr>
        <table class="table table-bordered table-hover">
        <thead class="table-secondary">
    <tr class="fw-bold">
        <td>No</td>
        <td>Nama Kelas</td>
        <td>Edit</td>
        <td>Hapus</td>  
    </tr>
    </thead>
    <?php 
    include'../koneksi.php';
    $no = 1;
    $sql = "select*from jurusan order by id_jurusan desc";
    $query = mysqli_query($koneksi, $sql);
    foreach($query as $data){?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['kompetensi_keahlian']; ?></td>
            <td>
                <a href="?url=edit-jurusan&id_jurusan=<?= $data['id_jurusan'] ?>" class='btn btn-warning'>EDIT</a>
            </td>
            <td>
                <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data')" href="?url=hapus-jurusan&id_jurusan=<?= $data['id_jurusan'] ?>" class='btn btn-danger'>HAPUS</a>
            </td>
        </tr>
    <?php } ?>
</table>