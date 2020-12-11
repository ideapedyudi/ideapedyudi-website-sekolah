<?php 
	// koneksi
	require 'fuctionsberita.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Skanding News Admin</title>
	<link rel="stylesheet" href="../vendor/bootstrap/bootstrap.css">
	<link rel="stylesheet" href="../vendor/fontawesome/fontawesome.css">
	<link rel="stylesheet" href="../vendor/aos/aos.css">
	<link rel="stylesheet" href="styleadmi.css">
	<style>
		body {
			font-family: "opensans";
		}
		@font-face {
			font-family: "opensans";
			src: url('../vendor/font/OpenSans-Regular.ttf');
		}

		@media (max-width: 870px) {
			.list-hidden {
				display: none;
			}
		}
	</style>
	
</head>

<body>
	<!-- ======================= bagian navbar =================================== -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light bg-primarys fixed-top">
	  <a class="navbar-brand text-white" href="#">SKANDING NEWS PANEL ADMIN</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	</nav>
	<!-- ====================== bagian navigasi mobile ============================= -->
	<div class="row">
		<div class="col-lg-12">
			<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="list-group list-group-flush">
			  <li class="list-group-item">KOSONG</li>
			  <a href="?page=dashboard"><li class="list-group-item list-group-item-action text-center border-0">DASHBOARD</li></a>
			  <a href="?page=berita_terkini"><li class="list-group-item list-group-item-action text-center border-0">BERITA TERKINI</li></a>
			  <a href="?page=berita_populer"><li class="list-group-item list-group-item-action text-center border-0">BERITA TERPOPULER</li></a>
			</ul>
			</div>
		</div>
	</div>
	<!-- ========================== bagian navigaso desktop =============================== -->
<div class="row">
	<div class="col-lg-2 fixed-top list-hidden" style="margin-top: 56px;margin-left: -15px;">
		<ul class="list-group list-group-flush">
		  <a href="?page=dashboard" class="list-group-item list-group-item-action list-text bg-primarysy list-hover">DASHBOARD</a>
		  <a href="?page=berita_terkini" class="list-group-item list-group-item-action list-text bg-primarysy list-hover">BERITA TERKINI</a>
		  <a href="?page=berita_populer" class="list-group-item list-group-item-action list-text bg-primarysy list-hover">BERITA TERPOPULER</a>	
		  <a href="logout.php" class="list-group-item list-group-item-action list-text bg-primarysy list-hover">LOGOUT</a>	
		  <a href="#" class="list-group-item list-group-item-action list-text bg-primarysy" style="height: 900px;"></a>
		</ul>
	</div>
	<!-- ========================================== isi dalam kanan ================================== -->
	<!-- ===================================== bagian dashboard ========================= -->
	<div class="col-lg-11 mt-5">	
			<?php require "data.php"; ?>

	</div>
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