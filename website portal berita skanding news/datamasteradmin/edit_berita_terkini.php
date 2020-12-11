<?php 

	require 'fuctionsberita.php';

	$id_post = $_GET['id_post'];
	$query_ubah_terkini = tampil_berita_terkini("SELECT * FROM tb_post WHERE id_post = $id_post")[0];

	if (isset($_POST['ubahdata'])) {
		if (ubah_berita_terkini($_POST) > 0) {
			echo "
				<script>
					alert('ubah data berhasil');
					document.location.href = 'content.php?page=berita_terkini';
				</script>
				";
		} else {
			echo "
				<script>
					alert('ubah data gagal');
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
	<title>Edit Berita Terkini - Skanding News Admin</title>
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
		  <li class="list-group-item active text-center bg-primarys	border-0" style="margin-top: 80px;">Edit Berita Terkini</li>
		  <li class="list-group-item">
		  	<form action="" method="post" enctype="multipart/form-data">
	          <input type="hidden" name="id_post" value="<?php echo $query_ubah_terkini['id_post']; ?>">
	          <input type="hidden" name="gambarLama" value="<?php echo $query_ubah_terkini['gambar_berita']; ?>">
			  <div class="form-group">
			    <label for="judul_berita">Judul Berita</label>
			    <input type="text" class="form-control" id="judul_berita" name="judul_berita" value="<?php echo $query_ubah_terkini['judul_berita']; ?>" required autocomplete="off">
			  </div>
			  <div class="form-group">
			    <label for="tgl_post">Tgl Post</label>
			    <input type="date" class="form-control" id="tgl_post" name="tgl_post" value="<?php echo $query_ubah_terkini['tgl_post']; ?>" required autocomplete="off">
			  </div>
			  <div class="form-group">
			    <label for="gambar_berita">Gambar Berita</label><br>
			    <img src="../vendor/img/<?php echo $query_ubah_terkini['gambar_berita']; ?>" width="120" alt=""><br><br>
			    <input type="file" class="form-control-file" id="gambar_berita" name="gambar_berita">
			  </div>
			  <div class="form-group">
			    <label for="deskripsi_berita">Deskripsi Berita</label>
			    <input type="text" class="form-control" id="deskripsi_berita" name="deskripsi_berita" value="<?php echo $query_ubah_terkini['deskripsi_berita']; ?>" required autocomplete="off">
			    <small id="emailHelp" class="form-text text-muted">Isi pokok dari berita</small>
			  </div>
			  <div class="form-group">
			    <label for="kategori_berita">Kategori Berita</label>
			    <input type="text" class="form-control" id="kategori_berita" name="kategori_berita" value="<?php echo $query_ubah_terkini['kategori_berita']; ?>" required autocomplete="off">
			    <small id="emailHelp" class="form-text text-muted">Pilih kategori kesehatan, peristiwa, dan prestasi siswa </small>
			  </div>
			  <div class="form-group">
			    <label for="id_kat">Id Kategori</label>
			    <input type="text" class="form-control" id="id_kat" name="id_kat" value="<?php echo $query_ubah_terkini['id_kat']; ?>" required autocomplete="off">
			    <small id="emailHelp" class="form-text text-muted">kategori berita berisi tentang 1 untuk kesehatan, 2 untuk peristiwa dan 3 untuk prestasi siswa</small>
			  </div>
			  <div class="form-group">
			    <label for="isi_berita">Isi Berita</label>
			    <textarea class="form-control" id="isi_berita" rows="3" name="isi_berita"><?php echo $query_ubah_terkini['isi_berita']; ?></textarea>
			  </div>
			  <div class="form-group">
			    <label for="id_user">Id User</label>
			    <input type="text" class="form-control" id="id_user" name="id_user" value="<?php echo $query_ubah_terkini['id_user']; ?>" required autocomplete="off">
			    <small id="emailHelp" class="form-text text-muted">Isi id user anda sebagai admin</small>
			  </div>
		      <div class="modal-footer">
		        <a href="content.php?page=berita_terkini" class="btn btn-danger">Batal</a>
		        <button type="submit" name="ubahdata" class="btn btn-primary">Ubah Data</button>
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