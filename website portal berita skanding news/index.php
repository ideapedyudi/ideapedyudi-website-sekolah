<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Skanding News</title>
	<link rel="stylesheet" href="vendor/bootstrap/bootstrap.css">
	<link rel="stylesheet" href="vendor/fontawesome/fontawesome.css">
	<link rel="stylesheet" href="vendor/aos/aos.css">
	<link rel="stylesheet" href="ydadmin/ydadminindexc.css">
	<style>
		body {
			overflow-y: none;
		}
		a:hover {
			text-decoration: none !important;
		}
		@font-face {
			font-family: "opensans";
			src: url('vendor/font/OpenSans-Regular.ttf');
		}

		@font-face {
			font-family: "opensansbold";
			src: url('vendor/font/OpenSans-Bold.ttf');
		}

		.text-nav {
			font-size: 13px;
			font-family: "opensansbold";
			color: rgba(48, 60, 74, 0.78);
		}

		.page-item .page-linkn a {
			color: #00a5af !important;
		}

		.dropdown-item:active {
			background-color: #03AEB8 !important;
		}

		.text-kategori {
			border: 1px solid #00a5af;
			padding: 4px;
			border-radius: 10px;
		}


		/* media mobile */
		@media (max-width: 770px) {
			.mobile-logo {
				margin-left: 20% !important;
			}

			.mobile-sosial {
				margin-left: 20% !important;
			}

			.post-img {
				margin-left: 25% !important;
			}

			.card-img{
				width: 90px;
			}

			.post-berita .col-md-8 {
				margin-top: 15px;
			}

			.img-sub {
				width: 200px !important;
				height: 120px !important;
			}

			.postst {
				text-align: center;
			}

			.text-populer {
			text-align: center !important;
		}
			.rounded {
				margin-left: 0px !important;
			}
		}

		@media (max-width: 570px) {
			.widget {
				margin-left: 35% !important;
				margin-top: 20px;
			}

			.mobile_selengkapnya {
				margin-left: -12px !important;
			}
		}
	</style>
</head>

<body>
	<!-- ================================= bagian header =============================================== -->
	<header class="section-header py-4">
		<div class="top-border bg-primarys"></div>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light">
				<a class="navbar-brand ml-n2 mobile-logo" href="#" data-aos="fade-right">
					<img src="vendor/img/logoberita.png" width="35" height="40" alt="" loading="lazy" style="margin-top: -7px;">
					<span class="title-logo font-weight-bold ml-2">Skanding News</span>
				</a>
				<div class="navbar ml-auto  mobile-sosial" data-aos="fade-left">
					<a class="nav-link sosial" href="https://web.facebook.com/groups/709516699779630" target="_blank"><i class="fab fa-facebook"></i></a>
					<a class="nav-link sosial" href="https://www.instagram.com/smkn1gending_official/?hl=en" target="_blank"><i class="fab fa-instagram"></i></a>
					<a class="nav-link sosial" href="https://www.youtube.com/channel/UCjvsuWJM3JTGRwnzfrSY2ng" target="_blank"><i class="fab fa-youtube"></i></a>
					<a class="nav-link sosial" href="https://www.smkn1.org/" target="_blank"><i class="fas fa-globe"></i></a>
				</div>
			</nav>
		</div>
	</header>

	<!-- ================================= bagian navbar =============================================== -->
	<nav class="navbar box-botton navbar-expand-lg navbar-dark sticky-top bg-white mt-n3">
		<div class="container">
			<button class="navbar-toggler ml-n4 bg-primarys" type="button" data-toggle="collapse" data-target="#main_nav">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="main_nav">
				<ul class="navbar-nav text-center">
					<li class="nav-item"><a class="nav-link font-weight-bold text-nav" href="index.php"> HOME </a> </li>
					<li class="nav-item"><a class="nav-link font-weight-bold text-nav" href="?page=visimisi"> VISI DAN MISI </a></li>
					<li class="nav-item"><a class="nav-link font-weight-bold text-nav" href="?page=ekstra">EKSTRAKURIKULER</a></li>
					<li class="nav-item dropdown">
						<a class="nav-link font-weight-bold text-nav" href="#" data-toggle="dropdown"> KOMPETENSI KEAHLIAN </a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item text-nav-drow" href="?page=rpl"> Rekasaya Perangkat Lunak </a></li>
							<li><a class="dropdown-item text-nav-drow" href="?page=titl"> Teknik Instalasi Tenaga Listrik </a></li>
							<li><a class="dropdown-item text-nav-drow" href="?page=tkr"> Teknik Kendaraan Ringan </a></li>
							<li><a class="dropdown-item text-nav-drow" href="?page=tp"> Teknik Pemesinan </a></li>
							<li><a class="dropdown-item text-nav-drow" href="?page=tb"> Teknik Tata Busana </a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- ================================== bagian jumbotron ==================================================  -->
	<div data-aos="fade-up">
		<div id="particles-js">
		</div>
		<center><img src="vendor/img/smk.png" class="road" width="130px" alt="" data-aos="zoom-in"></center><br>
		<h5 class="text-center roadtext mx-auto" id="title" style="color: white;"></h5>
	</div>

	<!-- =================================== bagian post ====================================== -->
	<?php 
		include "page/content.php";
	?>

	<!-- ============================================== bagian link jurusan ====================================== -->
	<section id="bottom">
		<h6 class="kompetensi text-center mt-5 mx-auto" data-aos="fade-up" data-aos-anchor-placement="top-bottom">KOMPETENSI KEAHLIAN</h6>
		<hr class="hr-judul" style="width: 260px;margin-top: -10px !important;" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
		<div class="container mr-3">
			<div class="row mt-5">
				<div class="col-md-2 col-sm-6" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
					<div class="widget">
						<a href="?page=rpl" class="logo-jurusan"><img src="vendor/img/logorpl.png" alt="" width=150 height=150></a>
					</div>
				</div>

				<div class="col-md-2 col-sm-6" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
					<div class="widget">
						<a href="?page=titl"><img src="vendor/img/titl2.png" alt="" width=150 height=150></a>
					</div>
				</div>

				<div class="col-md-2 col-sm-6" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
					<div class="widget">
						<a href="?page=tkr"><img src="vendor/img/logotkr.png" alt="" width=150 height=150></a>
					</div>
				</div>

				<div class="col-md-2 col-sm-6" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
					<div class="widget">
						<a href="?page=tp"><img src="vendor/img/tp2.png" alt="" width=150 height=150></a>
					</div>
				</div>

				<div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
					<div class="widget">
						<a href="?page=tb"><img src="vendor/img/tb2.png" alt="" width=150 height=150></a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ========================================== bagian footer ============================ -->
	<div class="card-footer">
		<div class="title-footer">Copyright &copy; 2019 RPL SMKN 1 GENDING</div>
	</div>

</body>
<script src="ydadmin/particles.js"></script>
<script src="ydadmin/app.js"></script>
<script src="vendor/bootstrap/jquery.js"></script>
<script src="vendor/bootstrap/bootstrap.js"></script>
<script src="vendor/fontawesome/fontawesome.js"></script>
<script src="vendor/aos/aos.js"></script>
<script type="">
	var i=0;
        //Tulisan = "SMK NEGERI 1 GENDING";
        Tulisan = "Luhur Dalam Budi Pekerti, Tinggi Dalam Prestasi";
        function typing() {
        if(i<Tulisan.length){
            document.getElementById("title").innerHTML += Tulisan.charAt(i);
            i++;

            setTimeout(typing,200);
        }
        }
        typing();
</script>
<script>
  AOS.init();
</script>

</html>