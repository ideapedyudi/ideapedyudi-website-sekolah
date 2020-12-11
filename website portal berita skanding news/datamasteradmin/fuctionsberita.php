<?php 
// koneksi
$conn = mysqli_connect('localhost', 'root', '', 'portal_berita_smk');

// ====================================================== fuctions untuk panel berita terkini ================================================

// read data
function tampil_berita_terkini($tampil_terkini) {
	global $conn;
	$result_terkini = mysqli_query($conn, $tampil_terkini);

	$rows = [];
	while ($row = mysqli_fetch_assoc($result_terkini)) {
	    $rows[] = $row;
	}
	return $rows;
}

// tambah data
function tambah_berita_terkini($tambah_terkini) {
	global $conn;
	$id_kat = htmlspecialchars($tambah_terkini['id_kat']);
	$tgl_post = htmlspecialchars($tambah_terkini['tgl_post']);
	$judul_berita = htmlspecialchars($tambah_terkini['judul_berita']);
	// upload gambar
	  $gambar_berita = uploadTerkini();
	  if (!$gambar_berita) {
	  	return false;
	  }
	$deskripsi_berita = htmlspecialchars($tambah_terkini['deskripsi_berita']);
	$kategori_berita = htmlspecialchars($tambah_terkini['kategori_berita']);
	$isi_berita = htmlspecialchars($tambah_terkini['isi_berita']);
	$id_user = htmlspecialchars($tambah_terkini['id_user']);

	$queryTerkini = ("INSERT INTO tb_post VALUES('','$id_kat', '$tgl_post', '$judul_berita', '$gambar_berita', '$deskripsi_berita', '$kategori_berita', '$isi_berita', '$id_user')");
	mysqli_query($conn, $queryTerkini);

	return mysqli_affected_rows($conn);
}

// hapus data
function hapus_berita_terkini($id_post) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_post WHERE id_post = $id_post");

	return mysqli_affected_rows($conn);
}


// ubah data
function ubah_berita_terkini($ubah_terkini) {
	global $conn;
	$id_post = $ubah_terkini['id_post'];
	$id_kat = htmlspecialchars($ubah_terkini['id_kat']);
	$tgl_post = htmlspecialchars($ubah_terkini['tgl_post']);
	$judul_berita = htmlspecialchars($ubah_terkini['judul_berita']);
	$gambarLama = htmlspecialchars($ubah_terkini['gambarLama']);
	// cek apakah user pilih gambar baru atau tidak
	if ($_FILES['gambar_berita']['error'] === 4) {
		$gambar_berita = $gambarLama;
	} else {
		$gambar_berita = uploadTerkini();
	}
	$deskripsi_berita = htmlspecialchars($ubah_terkini['deskripsi_berita']);
	$kategori_berita = htmlspecialchars($ubah_terkini['kategori_berita']);
	$isi_berita = htmlspecialchars($ubah_terkini['isi_berita']);
	$id_user = htmlspecialchars($ubah_terkini['id_user']);

	$queryEdit = "UPDATE tb_post SET
					id_kat = '$id_kat',
					tgl_post = '$tgl_post',
					judul_berita = '$judul_berita',
					gambar_berita = '$gambar_berita',
					deskripsi_berita = '$deskripsi_berita',
					kategori_berita = '$kategori_berita',
					isi_berita = '$isi_berita',
					id_user = '$id_user'
					WHERE id_post = $id_post";
	mysqli_query($conn, $queryEdit);
	return mysqli_affected_rows($conn);
}

// functuons upload
function uploadTerkini() {
	$namaFile = $_FILES['gambar_berita']['name'];
	$ukuranFile = $_FILES['gambar_berita']['size'];
	$error = $_FILES['gambar_berita']['error'];
	$tmpName = $_FILES['gambar_berita']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if ($error === 4) {
		echo "
				<script>
					alert('pilih gambar terlebih dahulu');
				</script>
			";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "
				<script>
					alert('yang anda aploud bukan gambar!');
				</script>
			";
		return false;
	}

	// cek ukurannya terlalu besar
	if ($ukuranFile > 1000000) {
		echo "
				<script>
					alert('ukuran gambar terlalu besar!');
				</script>
			";
		return false;
	}

	// lolos pengecekan, gambar siap di upload
	// generate nama gambar baru

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;


	move_uploaded_file($tmpName, '../vendor/img/' . $namaFileBaru);

	return $namaFileBaru; 

}

// functions cari
function cariTerkini($keyword) {
	$query = "SELECT * FROM tb_post WHERE
				judul_berita LIKE '%$keyword%' OR
				deskripsi_berita LIKE '%$keyword%' OR
				isi_berita LIKE '%$keyword%' OR
				id_user LIKE '%$keyword%'
	";

	return tampil_berita_terkini($query);
}



// ==================================================== fuctions untuk panel berita populer =======================================================

// read data
function tampil_berita_populer($tampil_populer) {
	global $conn;
	$result_populer = mysqli_query($conn, $tampil_populer);

	$rows = [];
	while ($row = mysqli_fetch_assoc($result_populer)) {
		$rows[] = $row;
	}
	return $rows;
}

// tambah data 
function tambah_berita_populer($tambah_populer) {
	global $conn;
	$id_user_populer = htmlspecialchars($tambah_populer['id_user_populer']);
	// upload gambar
	  $gambar_berita_populer = uploadPopuler();
	  if (!$gambar_berita_populer) {
	  	return false;
	  }
	$judul_berita_populer = htmlspecialchars($tambah_populer['judul_berita_populer']);
	$detail_berita_populer = htmlspecialchars($tambah_populer['detail_berita_populer']);
	$isi_berita_populer = htmlspecialchars($tambah_populer['isi_berita_populer']);
	$tgl_berita_populer = htmlspecialchars($tambah_populer['tgl_berita_populer']);

	$queryPopuler = ("INSERT INTO tb_post_populer VALUES('', '$id_user_populer', '$gambar_berita_populer', '$judul_berita_populer', '$detail_berita_populer', '$isi_berita_populer', '$tgl_berita_populer')");
	mysqli_query($conn, $queryPopuler);

	return mysqli_affected_rows($conn);
}

// hapus data
function hapus_berita_populer($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_post_populer WHERE id = $id");

	return mysqli_affected_rows($conn);
}

// ubah data
function ubah_berita_populer($ubah_populer) {
	global $conn;
	$id = $ubah_populer['id'];
	$id_user_populer = htmlspecialchars($ubah_populer['id_user_populer']);
	$gambarLama = htmlspecialchars($ubah_populer['gambarLama']);
	// cek apakah user pilih gambar baru atau tidak
	if ($_FILES['gambar_berita_populer']['error'] === 4) {
		$gambar_berita_populer = $gambarLama;
	} else {
		$gambar_berita_populer = uploadPopuler();
	}
	$judul_berita_populer = htmlspecialchars($ubah_populer['judul_berita_populer']);
	$detail_berita_populer = htmlspecialchars($ubah_populer['detail_berita_populer']);
	$isi_berita_populer = htmlspecialchars($ubah_populer['isi_berita_populer']);
	$tgl_berita_populer = htmlspecialchars($ubah_populer['tgl_berita_populer']);

	$queryUbahPopuler = "UPDATE tb_post_populer SET
							id_user_populer = '$id_user_populer',
							gambar_berita_populer = '$gambar_berita_populer',
							judul_berita_populer = '$judul_berita_populer',
							detail_berita_populer = '$detail_berita_populer',
 							isi_berita_populer = '$isi_berita_populer',
 							tgl_berita_populer = '$tgl_berita_populer'
 							WHERE id = $id
						";
	mysqli_query($conn, $queryUbahPopuler);
	return mysqli_affected_rows($conn);	
}

// functuons upload
function uploadPopuler() {
	$namaFile = $_FILES['gambar_berita_populer']['name'];
	$ukuranFile = $_FILES['gambar_berita_populer']['size'];
	$error = $_FILES['gambar_berita_populer']['error'];
	$tmpName = $_FILES['gambar_berita_populer']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if ($error === 4) {
		echo "
				<script>
					alert('pilih gambar terlebih dahulu');
				</script>
			";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "
				<script>
					alert('yang anda aploud bukan gambar!');
				</script>
			";
		return false;
	}

	// cek ukurannya terlalu besar
	if ($ukuranFile > 3000000) {
		echo "
				<script>
					alert('ukuran gambar terlalu besar!');
				</script>
			";
		return false;
	}

	// lolos pengecekan, gambar siap di upload
	// generate nama gambar baru

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;


	move_uploaded_file($tmpName, '../vendor/img/' . $namaFileBaru);

	return $namaFileBaru; 

}

// functions cari data
function cariPopuler($keyword) {
	$query = "SELECT * FROM tb_post_populer WHERE
				id_user_populer LIKE '%$keyword%' OR
				judul_berita_populer LIKE '%$keyword%' OR
				detail_berita_populer LIKE '%$keyword%' OR
				isi_berita_populer LIKE '%$keyword%'
	";
	return tampil_berita_populer($query);
}


// =================================== email berlangganan =================================
// tampil data
function tampil_berlangganan($emailBerlangganan) {
	global $conn;
	$result_berlangganan = mysqli_query($conn, $emailBerlangganan);

	$rows = [];
	while ($row = mysqli_fetch_assoc($result_berlangganan)) {
	    $rows[] = $row;
	}
	return $rows;
}

// hapus data
function hapus_berlangganan($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_berlangganan where id = $id");

	return mysqli_affected_rows($conn);
}


// ================================== registrasi dan login ==================================
// fuctions registrasi
function registrasi($data) {
	global $conn;
	$id_user = htmlspecialchars($data['id_user']);
	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data['password']);
	$password2 = mysqli_real_escape_string($conn, $data['password2']);
	$nama_lengkap = htmlspecialchars($data['nama_lengkap']);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "
				<script>
					alert('username yang di pilih udah terdaftar');
				</script>
		";
		return false;
	}


	// cek konfirmasi password
	if ($password !== $password2) {
		echo "
				<script>
					alert('konfirmasi password tidak sesuai');
				</script>
		";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO tb_user VALUES('','$id_user', '$username', '$password', '$nama_lengkap')");

	return mysqli_affected_rows($conn);

}

?>


