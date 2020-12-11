<?php 

require 'fuctionsberita.php';

if (isset($_POST['submitterkini'])) {
	if (tambah_berita_terkini($_POST) > 0) {
		echo "
				<script>
					alert('Tambah Data Berhasil');
					document.location.href = 'content.php?page=berita_terkini';
				</script>
		";
	} else {
		echo "
				<script>
					alert('Tambah Data Gagal');
					document.location.href = 'content.php?page=berita_terkini';
				</script>
		";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Berita Terkini - Skanding News Admin</title>
	<link rel="stylesheet" href="../vendor/bootstrap/bootstrap.css">
	<link rel="stylesheet" href="../vendor/fontawesome/fontawesome.css">
	<link rel="stylesheet" href="../vendor/aos/aos.css">
	<link rel="stylesheet" href="styleadmi.css">
</head>
<body>
	<!-- ======================= bagian navbar =================================== -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light bg-primarys fixed-top">
	  <a class="navbar-brand text-white" href="#">SKANDING NEWS PANEL ADMIN</a>
	</nav>

	<!-- ====================== bagian form tambah ============================== -->
	<div class="container">
		<ul class="list-group">
		  <li class="list-group-item active text-center bg-primarys	border-0" style="margin-top: 80px;">Tambah Berita Terkini</li>
		  <li class="list-group-item">
		  	<form action="" method="post" enctype="multipart/form-data">
			  <div class="form-group">
			    <label for="id_user">Id admin</label>
			    <input type="text" class="form-control" id="id_user" name="id_user" required autocomplete="off">
			    <small id="emailHelp" class="form-text text-muted">id admin pemosting</small>
			  </div>
			  <div class="form-group">
			    <label for="judul_berita">Judul Berita</label>
			    <input type="text" class="form-control" id="judul_berita" name="judul_berita" required autocomplete="off">
			  </div>
			  <div class="form-group">
			    <label for="gambar_berita">Gambar Berita</label>
			    <input type="file" class="form-control-file" id="gambar_berita" name="gambar_berita" required autocomplete="off">
			  </div>
			  <div class="form-group">
			    <label for="deskripsi_berita">Deskripsi Berita</label>
			    <input type="text" class="form-control" id="deskripsi_berita" name="deskripsi_berita" required autocomplete="off">
			  </div>
			  <div class="form-group">
			    <label for="kategori_berita">Kategori Berita</label>
			    <input type="text" class="form-control" id="kategori_berita" name="kategori_berita" required autocomplete="off">
			    <small id="emailHelp" class="form-text text-muted">kategori berita kesehatan, peristiwa dan prestasi siswa</small>
			  </div>
			  <div class="form-group">
			    <label for="id_kat">Id Kategori</label>
			    <input type="text" class="form-control" id="id_kat" name="id_kat" required autocomplete="off">
			    <small id="emailHelp" class="form-text text-muted">Id kategori berita 1 untuk kesehatan, 2 untuk peristiwa dan 3 untuk prestasi siswa sesuai kategori berita di atas</small>
			  </div>
			  <div class="form-group">
			    <label for="isi_berita">Isi Berita</label>
			    <textarea class="form-control" id="isi_berita" rows="3" name="isi_berita" required autocomplete="off"></textarea>
			  </div>
			  <div class="form-group">
			    <label for="tgl_post">Tanggal Memposting</label>
			    <input type="date" class="form-control" id="tgl_post" name="tgl_post" required autocomplete="off">
			  </div>		  
			  <div class="modal-footer">
			    <a href="content.php?page=berita_terkini" class="btn btn-danger">Batal</a>
			    <button type="submit" name="submitterkini" class="btn btn-primary">Tambah Data</button>
			  </div>
			</form>
		  </li>
		</ul>
	</div>

</body>
	<script src="../ydadmin/particles.js"></script>
	<script src="../ydadmin/app.js"></script>
	<script src="../vendor/bootstrap/jquery.js"></script>
	<script src="../vendor/bootstrap/bootstrap.js"></script>
	<script src="../vendor/fontawesome/fontawesome.js"></script>
	<script src="../vendor/aos/aos.js"></script>
	<script>
	  AOS.init();
	</script>
</html>