<?php 

require 'fuctionsberita.php';

$id = $_GET['id'];

if (hapus_berlangganan($id) > 0) {
	echo "
			<script>
				alert('hapus data berhasil');
				document.location.href = 'content.php';
			</script>
		";
} else {
	echo "
			<script>
				alert('hapus data gagal');
				document.location.href = 'content.php';
			</script>
		";
}



?>