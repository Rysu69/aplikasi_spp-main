<h5>Halaman Tambah Data Siswa.</h5>
<a href="?url=siswa" class="btn btn-primary"> KEMBALI </a>
<hr>
<form action="?url=proses-tambah-siswa" method="post">
    <div class="form-group mb-2">
        <label>NISN</label>
        <input type="number" name="nisn" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>NIS</label>
        <input type="number" name="nis" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Kelas</label>
        <select name="id_kelas" class="form-control" required>
            <option value=""> Pilih Kelas </option>
            <?php 
                include'../koneksi.php';
                $kelas = mysqli_query($koneksi,"SELECT*FROM kelas ORDER BY kelas ASC");
                foreach($kelas as $data_kelas){
                    ?>
                <option value="<?= $data_kelas['id_kelas'] ?>"> <?= $data_kelas['kelas'] ?></option>
                <?php }?>
        </select>
    </div>
    <div class="form-group mb-2">
        <label>jurusan</label>
        <select name="id_jurusan" class="form-control" required>
            <option value=""> Pilih jurusan </option>
            <?php 
                include'../koneksi.php';
                $jurusan = mysqli_query($koneksi,"SELECT*FROM jurusan ORDER BY kompetensi_keahlian ASC");
                foreach($jurusan as $data_jurusan){
                    ?>
                <option value="<?= $data_jurusan['id_jurusan'] ?>"> <?= $data_jurusan['kompetensi_keahlian'] ?></option>
                <?php }?>
        </select>
    </div>
    <div class="form-group mb-2">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required></textarea>
    </div>
    <div class="form-group mb-2">
        <label>No Telp</label>
        <input type="number" name="no_telp" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>SPP</label>
        <select name="id_spp" class="form-control" required>
            <option value=""> Pilih SPP </option>
            <?php 
                include'../koneksi.php';
                $spp = mysqli_query($koneksi,"SELECT*FROM spp ORDER BY id_spp ASC");
                foreach($spp as $data_spp){
                    ?>
                <option value="<?= $data_spp['id_spp'] ?>"> <?= $data_spp['tahun']; ?> | <?= number_format($data_spp['nominal'],2,',','.'); ?></option>
                <?php }?>
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit"> SIMPAN </button>
        <button class="btn btn-warning" type="reset"> KOSONGKAN </button>
    </div>
</form>