<?php 

require "koneksi.php"; 
// panggil functions dan query tampil post populer
    $post_populer = query("SELECT * FROM tb_post_populer,tb_user WHERE tb_post_populer.id_user_populer=tb_user.id_user order by id_user desc");



// menampilkan jumlah kategori berita
$kategori_berita = kategori_berita("SELECT * FROM tb_kategoripost ORDER BY id_kat");


?>
	<div class="container">
		<section class="post-berita mt-3">
			<div class="row">
				<div class="col-lg-7 text-left">
	<!-- ======================= bagian berita terkini ================================ -->
					<div class="mx-auto berita-terkini-judul">
						<h6 class="font-weight-bold text-center">BERITA TERKINI</h6>
					</div>
					<hr class="hr-judul">
					 <?php
                                        
                        $batas = 4;
                        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
        
                        $previous = $halaman - 1;
                        $next = $halaman + 1;
                        
                        $data = mysqli_query($koneksi,"select * from tb_post");
                        $jumlah_data = mysqli_num_rows($data);
                        $total_halaman = ceil($jumlah_data / $batas);
        
                        //$data_pegawai = mysqli_query($koneksi,"select * from pegawai limit $halaman_awal, $batas");
                        
                        $data_post = mysqli_query($koneksi, "select * from tb_post,tb_user where tb_post.id_user = tb_user.id_user order by id_post desc limit $halaman_awal, $batas");
                        $nomor = $halaman_awal+1;
                        while ($row = mysqli_fetch_array($data_post)) {
                            ?>
	<!-- ================================ card beita ==================================== -->
					<div class="card mb-3 mt-4 border-0" style="max-width: 640px;" data-aos="zoom-in">
						<div class="row no-gutters">
							<div class="col-md-4">
								<img src="vendor/img/<?= $row['gambar_berita']; ?>" class="card-img post-img" alt="..." style="width: 220px; height: 140px;">
							</div>
							<div class="col-md-8">
								<p class="card-text ml-4">
									<small class="text-muted">Diposting oleh : <?= $row['nama_lengkap']; ?></small>
									<small class="text-muted tanggal-post"> <?= date("M d, Y", strtotime($row['tgl_post']))?> </small>
								</p>
								<div class="card-body mt-n4 ml-n4">
									<a href="index.php?id=<?=$row['id_post'];?>&&page=selengkapnya" class="postbaru">
										<h5 class="card-title"><?= $row['judul_berita'];?></h5>
									</a>
									<p class="card-text"><?php echo $row['deskripsi_berita']; ?></p>
									<p class="card-text" style="font-size: 15px;">
										<small class="text-muted mut text-kategori"><?php echo $row['kategori_berita']; ?></small>
									</p>
								</div>
							</div>
						</div>
					</div>
					<hr>
					 <?php   } ?>
	<!-- ================================= pagination ke halaman lain ============================= -->
					<nav aria-label="Page navigation example" data-aos="zoom-in">
						<ul class="pagination justify-content-center">
							<li class="page-item disabled">
								<a class="page-link" tabindex="-1" aria-disabled="true" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>&laquo;</a>
							</li>
							 <?php 
	                            for($x=1;$x<=$total_halaman;$x++){
	                                ?> 
	                                <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                        	 <?php } ?>	
							<li class="page-item">
								<a class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>&raquo;</a>
							</li>
						</ul>
					</nav>
				</div>
				<div class="col-lg-4 text-center ml-5 mx-auto">
	<!-- =============================== populer berita ======================================= -->
					<div class="mx-auto kategori-berita-judul">
							<h6 class="font-weight-bold text-center">BERITA POPULER</h6>
					</div>
					<hr class="hr-judul" style="width: 210px;">
					<?php foreach ($post_populer as $populer) : ?>
					<div class="card mb-3 mt-4 border-0" style="max-width: 640px;" data-aos="zoom-in">
						<div class="row no-gutters" style="display: flex;">
							<div class="col-md-4">
								<img src="vendor/img/<?php echo $populer['gambar_berita_populer']; ?>" class="card-img img-sub" alt="..." style="width: 120px; height: 80px;">
							</div>
							<div class="col-md-8 col-sm-3">
								<div class="card-body mt-n4">
									<a class="font-weight-bold" href="index.php?id=<?=$populer['id'];?>&&page=selengkapnya_populer">
										<p class="postst mt-9"><?php echo $populer['judul_berita_populer']; ?></p>
									</a>
									<p class="card-text mt-n3 ml-n2 text-populer" style="text-align: left;padding: -10px;"><?php echo $populer['detail_berita_populer']; ?></p>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
	<!-- ================================ kategori berita ======================================= -->
					<?php require "kategori.php"; ?>
    <!-- ========================= berlanganan berita ===================================== -->				
					<div class="card subcribe" data-aos="zoom-in">
						<div class="card-body">
							<?php 

							if (isset($_POST['berlangganan'])) {
								if (tambah_berlangganan($_POST)) {
									echo "
												<script>
													alert('berlangganan berhasil');
													document.location.href = 'index.php';
												</script>
											";
								} else {
									echo "
											<script>
												alert('berlangganan berhasil');
												document.location.href = 'index.php';
											</script>
										";
								}
							}



							?>
							<form action="" method="post">
								<h5 class="card-title">Berlangganan Berita Baru</h5>
								<p class="card-text">Berlangganan Untuk Dapatkan Pembaruan Berita SMKN 1 Gending Langsung Ke Email Anda. Gratis!</p>
								<input type="email" class="form-control" name="email" id="berlangganan" placeholder="Email.." style="height: 40px; font-size: 13px;">
								<button class="btn btn-primary mt-3 btn-block bg-primarys" type="submit" name="berlangganan">Berlangganan Sekarang</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

