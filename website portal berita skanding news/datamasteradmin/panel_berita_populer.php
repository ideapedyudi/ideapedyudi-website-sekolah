<?php 

// functions menampilkan data
$beritaPopuler = tampil_berita_populer("SELECT * FROM tb_post_populer,tb_user WHERE tb_post_populer.id_user_populer=tb_user.id_user");

//  teka tombol cari
if (isset($_POST['cari'])) {
	$beritaPopuler = cariPopuler($_POST['keyword']);
}

?>
<!-- ================================== bagian panel berita populer =============================== -->
<div class="row">
	<div class="col-lg-3">
		
	</div>
	<div class="col-lg-9">
		<h5 class="text-center mt-5" data-aos="zoom-in">TABEL BERITA POPULER</h5>
		<div class="row text-center mt-5" data-aos="zoom-in">
			<div class="row ml-1">
				<a href="tambah_berita_populer.php" class="btn btn-primary">Tambah</a>
				<form class="form-inline my-2 my-lg-0 ml-2" action="" method="post">
			      <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Cari berita populer..." aria-label="Search" autocomplete="off">
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
			  	<?php $i=1; foreach ($beritaPopuler as $bp) :?>
				  <tbody>
				    <tr>
				    	<td><?= $i++; ?></td>
				    	<td><?= $bp['id_user_populer']; ?></td>
				    	<td class="text-justify"><?= $bp['judul_berita_populer']; ?></td>
				    	<td><?= date("M d, Y", strtotime($bp['tgl_berita_populer']))?></td>
				    	<td>
				    		<a href="edit_berita_populer.php?id=<?php echo $bp['id']; ?>" class="btn btn-success"><i class="fas fa-edit"></i></a> 
				    		<a href="hapus_populer.php?id=<?php echo $bp['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Data Akan Dihapus');"><i class="fas fa-trash"></i></a>
				    	</td>
				    </tr>
				  </tbody>
				<?php endforeach; ?>
			</table>	
		</div>
	</div>
</div>

<!-- ======================== ubah data berita populer ========================== -->
<?php foreach ($beritaPopuler as $bp) :?>
<div class="modal fade" id="ubahpopuler<?php echo $bp['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content border-white" style="width: 160%;margin-left: -30%;">
      <div class="modal-header bg-primarysy text-white">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Berita Populer</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<?php 
        		$id = $bp['id'];
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
       <form action="" method="post">
          <input type="hidden" name="id" value="<?= $query_ubah_populer['id']; ?>">
		  <div class="form-group">
		    <label for="id_user_populer">Id admin</label>
		    <input type="text" class="form-control" id="id_user_populer" name="id_user_populer" value="<?= $query_ubah_populer['id_user_populer']; ?>" required>
		    <small id="emailHelp" class="form-text text-muted">id admin pemosting</small>
		  </div>
		  <div class="form-group">
		    <label for="gambar_berita_populer">Gambar Berita</label>
		    <input type="text" class="form-control" id="gambar_berita_populer" name="gambar_berita_populer" value="<?= $query_ubah_populer['gambar_berita_populer']; ?>" required>
		  </div>
		  <div class="form-group">
		    <label for="judul_berita_populer">Judul Berita</label>
		    <input type="text" class="form-control" id="judul_berita_populer" name="judul_berita_populer" value="<?= $query_ubah_populer['judul_berita_populer']; ?>" required>
		  </div>
		  <div class="form-group">
		    <label for="detail_berita_populer">Deskripsi Berita</label>
		    <input type="text" class="form-control" id="detail_berita_populer" name="detail_berita_populer" value="<?= $query_ubah_populer['detail_berita_populer']; ?>" required>
		  </div>
		  <div class="form-group">
		    <label for="isi_berita_populer">Isi Berita</label>
		    <textarea class="form-control" id="isi_berita_populer" rows="3" name="isi_berita_populer"><?= $query_ubah_populer['isi_berita_populer']; ?></textarea>
		  </div>
		  <div class="form-group">
		    <label for="tgl_berita_populer">Tanggal Memposting</label>
		    <input type="date" class="form-control" id="tgl_berita_populer" name="tgl_berita_populer" value="<?= $query_ubah_populer['tgl_berita_populer']; ?>" required>
		  </div>		  
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
	        <button type="submit" name="ubahberitapopuler" class="btn btn-primary">Ubah Data</button>
	      </div>
		</form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>