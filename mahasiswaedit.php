<?php include 'header.php'; ?>
<?php
$ambil = $koneksi->query("SELECT * FROM mahasiswa WHERE idmahasiswa='$_GET[id]'");
$data = $ambil->fetch_assoc();
?>
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Mahasiswa</h6>
            </div>
            <div class="card-body">
                <form method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">NIM</label>
                        <input type="number" name="nim" value="<?= $data['nim'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Jenis Kelamin</label>
                        <select name="jeniskelamin" class="form-control" required>
                            <option value="">- Pilih Jenis Kelamin -</option>
                            <option value="Laki-Laki" <?= $data['jeniskelamin'] == 'Laki-Laki' ? 'selected' : '' ?>>Laki-Laki</option>
                            <option value="Perempuan" <?= $data['jeniskelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="email" name="email" value="<?= $data['email'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">No HP</label>
                        <input type="number" name="nohp" value="<?= $data['nohp'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Alamat</label>
                        <input type="text" name="alamat" value="<?= $data['alamat'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Prodi</label>
                        <select name="prodi" class="form-control" required>
                            <option value="">- Pilih Program Studi -</option>
                            <option value="Arsitektur" <?= $data['prodi'] == 'Arsitektur' ? 'selected' : '' ?>>Arsitektur</option>
                            <option value="Teknik Informatika" <?= $data['prodi'] == 'Teknik Informatika' ? 'selected' : '' ?>>Teknik Informatika</option>
                            <option value="Teknik Sipil" <?= $data['prodi'] == 'Teknik Sipil' ? 'selected' : '' ?>>Teknik Sipil</option>
                            <option value="Teknik Pertambangan" <?= $data['prodi'] == 'Teknik Pertambangan' ? 'selected' : '' ?>>Teknik Pertambangan</option>
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
                                <option <?php if ($data['tahunakademik'] == $year . '/' . $yearberikutnya) echo 'selected'; ?> value="<?= $year . '/' . $yearberikutnya ?>"><?= $year . '/' . $yearberikutnya ?></option>
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
                                    <option value="Aktif" <?= $data['status'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                                    <option value="Tidak Aktif" <?= $data['status'] == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
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
    $sql = "UPDATE mahasiswa 
    SET nama = '$nama', nim = '$nim', jeniskelamin = '$jeniskelamin', email = '$email', nohp = '$nohp', alamat = '$alamat', prodi = '$prodi', tahunakademik = '$tahunakademik', status = '$status'
    WHERE idmahasiswa = '$_GET[id]'";

    $koneksi->query($sql) or die(mysqli_error($koneksi));

    echo "<script>alert('Data berhasil di edit')</script>";
    echo "<script>location='mahasiswadaftar.php';</script>";
}
?>