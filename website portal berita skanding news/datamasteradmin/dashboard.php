<?php 

	// menghitung jumlah data berita terkini
	$data_berita_terkini = mysqli_query($conn, "SELECT * FROM tb_post");
	$jumlah_berita_terkini = mysqli_num_rows($data_berita_terkini);


	// menghitung jumalh data berita populer
	$data_berita_populer = mysqli_query($conn, "SELECT * FROM tb_post_populer");
	$jumlah_berita_populer = mysqli_num_rows($data_berita_populer);

	$berlangganan = tampil_berlangganan("SELECT * FROM tb_berlangganan");

?>

<!-- ================================== bagian dashboard =============================== -->
<div class="row">
	<div class="col-lg-3">
		
	</div>
	<div class="col-lg-9">
	<div class="row text-center" style="margin-left: 14%;">
		<div class="col-lg-6 mt-5" data-aos="fade-up" data-aos-duration="2000">
			<div class="card" style="width: 18rem;">
			  <div class="card-body">
			    <h5 class="card-title">BERITA TERKINI</h5>
			    <h3 class="text-success"><?= $jumlah_berita_terkini; ?></h3>
			    <p class="card-text">untuk postingan terkini dalam memanajemen isi Berita</p>
			    <a href="content.php?page=berita_terkini" class="btn btn-primary">Lihat</a>
			  </div>
			</div>
		</div>
		<div class="col-lg-6 mt-5" data-aos="fade-up" data-aos-duration="2000">
			<div class="card" style="width: 18rem;">
			  <div class="card-body">
			    <h5 class="card-title">BERITA POPULER</h5>
			    <h3 class="text-success"><?= $jumlah_berita_populer; ?></h3>
			    <p class="card-text">untuk postingan populer dalam memanajemen isi Berita</p>
			    <a href="content.php?page=berita_populer" class="btn btn-primary">Lihat</a>
			  </div>
			</div>
		</div>	
	</div> 
	<h5 class="text-center mt-5">EMAIL BERLANGGANAN</h5>
	<table class="border table-bordered mt-4 mx-auto text-center table-striped">
		<tr>
			<th style="width: 80px;">No</th>
			<th style="width: 500px;">Email Berlangganan</th>
			<th style="width: 100px;">Aksi</th>
		</tr>
		<?php $i=1; foreach ($berlangganan as $bg) :?>
			<tr>
				<td><?= $i++; ?></td>
				<td><?= $bg['email']; ?></td>
				<td><a href="hapus_berlangganan.php?id=<?php echo $bg['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Data Akan Dihapus');">Hapus</a></td>
			</tr>
		<?php endforeach; ?>
	</table>
	</div>
</div>