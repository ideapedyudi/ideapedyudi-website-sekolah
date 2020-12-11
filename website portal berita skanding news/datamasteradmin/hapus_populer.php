<?php 
// koneksi
require 'fuctionsberita.php';

$id = $_GET['id'];

if (hapus_berita_populer($id) > 0) {
	echo "
			<script>
				alert('hapus data berhasil');
				document.location.href = 'content.php?page=berita_populer';
			</script>
		";
} else {
	echo "
			<script>
				alert('hapus data gagal');
				document.location.href = 'content.php?page=berita_populer';
			</script>
		";
}


?>