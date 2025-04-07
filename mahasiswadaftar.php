<?php include 'header.php'; ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="mahasiswatambah.php" class="btn btn-sm btn-primary shadow-sm float-right pull-right"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Mahasiswa</a>
</div>
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="table">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th>Prodi</th>
                                <th>Tahun Akademik</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor = 1; ?>
                            <?php $ambil = $koneksi->query("SELECT*FROM mahasiswa order by idmahasiswa desc"); ?>
                            <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $nomor; ?></td>
                                    <td><?php echo $pecah['nama'] ?></td>
                                    <td><?php echo $pecah['nim'] ?></td>
                                    <td><?php echo $pecah['jeniskelamin'] ?></td>
                                    <td><?php echo $pecah['email'] ?></td>
                                    <td><?php echo $pecah['nohp'] ?></td>
                                    <td><?php echo $pecah['alamat'] ?></td>
                                    <td><?php echo $pecah['prodi'] ?></td>
                                    <td><?php echo $pecah['tahunakademik'] ?></td>
                                    <td><?php echo $pecah['status'] ?></td>
                                    <td>
                                        <a href="mahasiswaedit.php?id=<?php echo $pecah['idmahasiswa']; ?>" class="btn btn-warning m-1">Ubah</a>
                                        <a href="mahasiswahapus.php?id=<?php echo $pecah['idmahasiswa']; ?>" class="btn btn-danger m-1" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">Hapus</a>
                                    </td>
                                </tr>
                                <?php $nomor++; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>