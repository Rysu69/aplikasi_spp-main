<h5>Halaman Data Kelas.</h5>
<a href="?url=tambah-kelas" class="btn btn-primary"> Tambah Kelas </a>
<hr>
        <table class="table table-bordered table-hover">
        <thead class="table-secondary">
    <tr class="fw-bold">
        <td>No</td>
        <td>Kelas</td>
        <td>Edit</td>
        <td>Hapus</td>  
    </tr>
    </thead>
    <?php 
    include'../koneksi.php';
    $no = 1;
    $sql = "select*from kelas order by id_kelas asc";
    $query = mysqli_query($koneksi, $sql);
    foreach($query as $data){?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['kelas']; ?></td>
            <td>
                <a href="?url=edit-kelas&id_kelas=<?= $data['id_kelas'] ?>" class='btn btn-warning'>EDIT</a>
            </td>
            <td>
                <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data')" href="?url=hapus-kelas&id_kelas=<?= $data['id_kelas'] ?>" class='btn btn-danger'>HAPUS</a>
            </td>
        </tr>
    <?php } ?>
</table>