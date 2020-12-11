<?php 
	
	require 'fuctionsberita.php';

	$id = $_GET['id'];
	$query_ubah_populer = tampil_berita_populer("SELECT * FROM tb_post_populer WHERE id = $id")[0];

	if (isset($_POST['ubahberitapopuler'])) {
		if (ubah_berita_populer($_POST) > 0) {
			echo "
				<script>
					alert('ubah data berhasil');
					document.location.href = 'content.php?page=berita_populer';
				</script>
				";
		} else {
			echo "
				<script>
					alert('ubah data gagal');
					document.location.href = 'content.php?page=berita_populer';
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
	<title>Edit Berita Populer - Skanding News Admin</title>
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
		  <li class="list-group-item active text-center bg-primarys	border-0" style="margin-top: 80px;">Edit Berita Populer</li>
		  <li class="list-group-item">
		  	 <form action="" method="post" enctype="multipart/form-data">
	          <input type="hidden" name="id" value="<?= $query_ubah_populer['id']; ?>">
	          <input type="hidden" name="gambarLama" value="<?php echo $query_ubah_populer['gambar_berita_populer']; ?>">
			  <div class="form-group">
			    <label for="id_user_populer">Id admin</label>
			    <input type="text" class="form-control" id="id_user_populer" name="id_user_populer" value="<?= $query_ubah_populer['id_user_populer']; ?>" required autocomplete="off">
			    <small id="emailHelp" class="form-text text-muted">id admin pemosting</small>
			  </div>
			  <div class="form-group">
			    <label for="gambar_berita_populer">Gambar Berita</label><br>
			    <img src="../vendor/img/<?php echo $query_ubah_populer['gambar_berita_populer']; ?>" width="120" alt=""><br><br>
			    <input type="file" class="form-control-file" id="gambar_berita_populer" name="gambar_berita_populer">
			  </div>
			  <div class="form-group">
			    <label for="judul_berita_populer">Judul Berita</label>
			    <input type="text" class="form-control" id="judul_berita_populer" name="judul_berita_populer" value="<?= $query_ubah_populer['judul_berita_populer']; ?>" required autocomplete="off">
			  </div>
			  <div class="form-group">
			    <label for="detail_berita_populer">Deskripsi Berita</label>
			    <input type="text" class="form-control" id="detail_berita_populer" name="detail_berita_populer" value="<?= $query_ubah_populer['detail_berita_populer']; ?>" required autocomplete="off">
			  </div>
			  <div class="form-group">
			    <label for="isi_berita_populer">Isi Berita</label>
			    <textarea class="form-control" id="isi_berita_populer" rows="3" name="isi_berita_populer"><?= $query_ubah_populer['isi_berita_populer']; ?></textarea>
			  </div>
			  <div class="form-group">
			    <label for="tgl_berita_populer">Tanggal Memposting</label>
			    <input type="date" class="form-control" id="tgl_berita_populer" name="tgl_berita_populer" value="<?= $query_ubah_populer['tgl_berita_populer']; ?>" required autocomplete="off">
			  </div>		  
		      <div class="modal-footer">
		        <a href="content.php?page=berita_populer" class="btn btn-danger">Batal</a>
		        <button type="submit" name="ubahberitapopuler" class="btn btn-primary">Ubah Data</button>
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