<?php
session_start();
include 'koneksi.php';
?>

<?php include 'header.php'; ?>
<div class="hero-wrap" style="background-image: url('foto/bghome.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-8 ftco-animate d-flex align-items-end">
				<div class="text w-100 text-center">
					<h1 class="mb-4">Selamat<span> Datang</span> Di <span>Website CRUD Mahasiswa</span>.</h1>
					<p><a href="admin/mahasiswadaftar.php" class="btn btn-primary py-2 px-4">Dashboard</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include 'footer.php';
?>