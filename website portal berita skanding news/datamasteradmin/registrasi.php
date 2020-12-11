<?php 

require 'fuctionsberita.php';

if (isset($_POST['register'])) {
	if (registrasi($_POST) > 0) {
		echo "
				<script>
					alert('user baru berhasil di tambahkan!');
				</script>
		";
	} else {
		echo mysqli_error($conn);
	}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Regiterasi - Skanding News Admin</title>
	<link rel="stylesheet" href="../vendor/bootstrap/bootstrap.css">
	<link rel="stylesheet" href="../vendor/fontawesome/fontawesome.css">
	<link rel="stylesheet" href="../vendor/aos/aos.css">
	<link rel="stylesheet" href="styleadmi.css">
</head>
<body>
	<!-- ======================= bagian navbar =================================== -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light bg-primarys fixed-top">
	  <a class="navbar-brand text-white" href="#">SKANDING NEWS PANEL ADMIN</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	</nav>

	<!-- ==================== card form register ================================ -->
	<div class="container">
		<ul class="list-group mx-auto" style="width: 600px;margin-top: 90px;">
		  <li class="list-group-item active text-center bg-primarys border-0">Registrasi</li>
		  <li class="list-group-item">
		  	<form action="" method="post">
			  <div class="form-group">
			    <label for="id_user">ID User :</label>
			    <input type="text" class="form-control" name="id_user" id="id_user">
			  </div>
			  <div class="form-group">
			    <label for="username">Username :</label>
			    <input type="text" class="form-control" name="username" id="username">
			  </div>
			  <div class="form-group">
			    <label for="password">Password :</label>
			    <input type="password" class="form-control" name="password" id="password">
			  </div>
			  <div class="form-group">
			    <label for="password2">Konfirmasi Password :</label>
			    <input type="password" class="form-control" name="password2" id="password2">
			  </div>
			  <div class="form-group">
			    <label for="nama_lengkap">Nama Lengkap</label>
			    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap">
			  </div>
			  <button type="submit" class="btn btn-primary" name="register">Regiter</button>
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