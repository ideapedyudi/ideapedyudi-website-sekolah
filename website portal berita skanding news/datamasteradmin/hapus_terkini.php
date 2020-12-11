<?php 
require 'fuctionsberita.php';


$id_post = $_GET['id_post'];

if (hapus_berita_terkini($id_post) > 0) {
	echo "
			<script>
				alert('hapus data berhasil');
				document.location.href = 'content.php?page=berita_terkini';
			</script>
		";
} else {
	echo "
			<script>
				alert('hapus data gagal');
				document.location.href = 'content.php?page=berita_terkini';
			</script>
		";
}


?>