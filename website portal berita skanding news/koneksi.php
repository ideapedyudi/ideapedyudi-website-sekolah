<?php 
// koneksi
$koneksi = mysqli_connect('localhost', 'root', '', 'portal_berita_smk');


// read tampil data
function query($query) {
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
	    $rows[] = $row;
	}
	return $rows;
}


// read tampil data
function querynama($querynama) {
	global $koneksi;
	$result = mysqli_query($koneksi, $querynama);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
	    $rows[] = $row;
	}
	return $rows;
}


// menghitung jumlah data kategori berita
function kategori_berita($katpop) {
	global $koneksi;
	$result = mysqli_query($koneksi, $katpop);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
	    $rows[] = $row;
	}
	return $rows;
}

// kategori ulang
function kategori_pilih() {
	global $koneksi;
	$result = mysqli_query($koneksi, "Select * from tb_post where id_kat='".$_GET['id']."'");
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
	    $rows[] = $row;
	}
	return $rows;
}


// ========================================== functions berlangganan ========================================
// tambah data
function tambah_berlangganan($tambahBerlangganan) {
	global $koneksi;
	$email = htmlspecialchars($tambahBerlangganan['email']);

	mysqli_query($koneksi, "INSERT INTO tb_berlangganan VALUES('', '$email')");

	return mysqli_affected_rows($koneksi);
}

?>