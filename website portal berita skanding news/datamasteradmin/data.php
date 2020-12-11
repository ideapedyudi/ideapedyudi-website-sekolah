<div class="content">
  <?php 
	if(isset($_GET['page'])){

		$page = $_GET['page'];
 
		switch ($page) {
			case 'berita_terkini':
				include "panel_berita_terkini.php";
				break;
			case 'berita_populer':
				include "panel_berita_populer.php";
				break;
			case 'dashboard':
				include "dashboard.php";
                break;	
			default:
				echo "
				<center><h3>Maaf. page tidak di temukan !</h3></center>

				";
				break;
		}
		
		}else{
			include "dashboard.php";
		}
 	?>
</div>