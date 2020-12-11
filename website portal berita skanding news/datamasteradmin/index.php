<?php 

require 'fuctionsberita.php';

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");

	// cek username
	if (mysqli_num_rows($result) === 1) {
		// cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row['password']) ) {
			echo "
				<script>
					alert('selamat datang admin');
					document.location.href = 'content.php';
				</script>
			";
			return false;
		}
	}

	$error = true;	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - Skanding News Admin</title>
	<link rel="stylesheet" href="../vendor/bootstrap/bootstrap.css">
	<link rel="stylesheet" href="../vendor/fontawesome/fontawesome.css">
	<link rel="stylesheet" href="../vendor/aos/aos.css">
	<link rel="stylesheet" href="styleadmi.css">
</head>
<body>
	<!-- ======================= bagian navbar =================================== -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light bg-primarys fixed-top">
	  <a class="navbar-brand text-white" href="#">SKANDING NEWS PANEL ADMIN</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	</nav>
	<div class="container" style="margin-top: 100px;width: 600px;">
		<ul class="list-group">
		  <li class="list-group-item active bg-primarys border-0 text-center">Login Sistem</li>
		  <li class="list-group-item">
		  	<form action="" method="post">
		  		<?php if (isset($error)) :?>
					<p style="color: red; font-style: italic;">username atau password salah</p>
				<?php endif; ?>
			  <div class="form-group">
			    <label for="username">Username </label>
			    <input type="text" name="username" class="form-control" id="username">
			  </div>
			  <div class="form-group">
			    <label for="password">Password </label>
			    <input type="password" name="password" class="form-control" id="password">
			  </div>
			  <button type="submit" name="login" class="btn btn-primary">Login</button>
			</form>
		  </li>
		</ul>
	</div>
</body>
	<script src="../ydadmin/particles.js"></script>
	<script src="../ydadmin/app.js"></script>
	<script src="../vendor/bootstrap/jquery.js"></script>
	<script src="../vendor/bootstrap/bootstrap.js"></script>
	<script src="../vendor/fontawesome/fontawesome.js"></script>
	<script src="../vendor/aos/aos.js"></script>
	<script>
	  AOS.init();
	</script>
</html>