<?php include 'header.php'; ?><div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Mahasiswa</h6>
            </div>
            <div class="card-body">
                <form method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">NIM</label>
                        <input type="number" name="nim" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Jenis Kelamin</label>
                        <select name="jeniskelamin" class="form-control" required>
                            <option value="">- Pilih Jenis Kelamin -</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">No HP</label>
                        <input type="number" name="nohp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Prodi</label>
                        <select name="prodi" class="form-control" required>
                            <option value="">- Pilih Program Studi -</option>
                            <option value="Arsitektur">Arsitektur</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Sipil">Teknik Sipil</option>
                            <option value="Teknik Pertambangan">Teknik Pertambangan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tahun Akademik</label>
                        <select name="tahunakademik" class="form-control" required>
                            <?php
                            $currentYear = date("Y");
                            for ($year = $currentYear; $year >= 2017; $year--) {
                                $yearberikutnya = $year + 1;
                            ?>
                                <option value="<?= $year . '/' . $yearberikutnya ?>"><?= $year . '/' . $yearberikutnya ?></option>
                            <?php
                            }
                            ?>

                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Status Mahasiswa</label>
                                <select name="status" class="form-control" required>
                                    <option value="">- Pilih Status Mahasiswa -</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <br>
                                <button class="btn btn-primary float-right" name="daftar">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<script>
    const inputElements = document.querySelectorAll('.ip');
    inputElements.forEach(function(inputElement) {
        inputElement.addEventListener('input', function() {
            if (this.value > 4) {
                this.value = '4';
            }
        });
    });
</script>
<?php
if (isset($_POST["daftar"])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $prodi = $_POST['prodi'];
    $tahunakademik = $_POST['tahunakademik'];
    $status = $_POST['status'];
    $sql = "INSERT INTO mahasiswa (nama, nim, jeniskelamin, email, nohp, alamat, prodi, tahunakademik, status) 
VALUES ('$nama', '$nim', '$jeniskelamin', '$email', '$nohp', '$alamat', '$prodi', '$tahunakademik', '$status')";

    $koneksi->query($sql) or die(mysqli_error($koneksi));

    echo "<script>alert('Data berhasil di tambah')</script>";
    echo "<script>location='mahasiswadaftar.php';</script>";
}
?>