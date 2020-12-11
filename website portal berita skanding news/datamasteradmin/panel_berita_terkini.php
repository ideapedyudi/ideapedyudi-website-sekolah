<?php 


// functions tampilkan data
$beritaTerkini = tampil_berita_terkini("SELECT * FROM tb_post,tb_user WHERE tb_post.id_user=tb_user.id_user");

// tombol cari
if (isset($_POST['cari'])) {
	$beritaTerkini = cariTerkini($_POST['keyword']);
}

?>
<!-- ================================== panel berita terkini =============================== -->
<div class="row">
	<div class="col-lg-3">
		
	</div>
	<div class="col-lg-9">
		<h5 class="text-center mt-5" data-aos="zoom-in">TABEL BERITA TERKINI</h5>
		<div class="row text-center mt-5" data-aos="zoom-in">
			<div class="row ml-1">
				<a href="tambah_berita_terkini.php" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Tambah">Tambah</a>
				<form class="form-inline my-2 my-lg-0 ml-2" action="" method="post">
			      <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Cari berita terkini..." aria-label="Search" autocomplete="off">
			      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="cari"><i class="fas fa-search"></i></button>
			    </form>
			</div>
			<table class="table table-bordered mt-2">
			  <thead>
			    <tr>
			      <th scope="col">No</th>
			      <th scope="col">ID Pemosting</th>
			      <th scope="col">Judul Berita</th>
			      <th scope="col">Waktu Memposting</th>
			      <th scope="col">Aksi</th>
			    </tr>
			  </thead>
			    	<?php $i=1; foreach ($beritaTerkini as $bt) :?>
				  <tbody>
					    <tr>
					    	<td><?= $i++; ?></td>
					    	<td><?= $bt['id_user']; ?></td>
					    	<td class="text-justify"><?= $bt['judul_berita']; ?></td>
					    	<td><?= date("M d, Y", strtotime($bt['tgl_post']))?></td>
					    	<td>
					    		<a href="edit_berita_terkini.php?id_post=<?php echo $bt['id_post']; ?>" class="btn btn-success"><i class="fas fa-edit"></i></a> 
					    		<a href="hapus_terkini.php?id_post=<?php echo $bt['id_post']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Data Akan Dihapus');"><i class="fas fa-trash"></i></a>
					    	</td>
					    </tr>
					</tbody>
			    	<?php endforeach; ?>
			</table>	
		</div>
	</div>
</div>