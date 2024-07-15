<h5>Halaman Tambah Data SPP.</h5>
<a href="?url=spp" class="btn btn-primary"> KEMBALI </a>
<hr>
<form action="?url=proses-tambah-spp" method="post">
    <div class="form-group mb-2">
        <label>Tahun</label>
        <input name="tahun" maxlength="25" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Nominal</label>
        <input type="number" name="nominal" maxlength="13" class="form-control" required>
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit"> SIMPAN </button>
        <button class="btn btn-warning" type="reset"> KOSONGKAN </button>
    </div>
</form>