<div class="content">
  <?php 
	if(isset($_GET['page'])){

		$page = $_GET['page'];
 
		switch ($page) {
			case 'home':
				include "beranda.php";
				break;
			case 'titl':
				include "titl.php";
				break;
			case 'rpl':
				include "rpl.php";
                break;
            case 'tkr':
				include "tkr.php"; 
                break;
            case 'tp':
				include "tp.php";
                break;	
            case 'tb':
				include "tb.php";
				break;
			case 'selengkapnya':
				include "selengkapnya.php";
				break;
			case 'selengkapnya_populer':
				include "selengkapnya_populer.php";
				break;
			case 'visimisi':
				include "visimisi.php";
				break;
			case 'profil':
				include "profil.php";
				break;
			case 'ekstra':
				include "ekstra.php";
				break;
			case 'kategori':
				include "kategori.php";
				break;
			case 'kategoriberita':
				include "kategoriberita.php";
				break;		
			default:
				echo "
						<script>
							alert('jangan coba coba lakukan lagi');
							document.location.href = 'index.php';
						</script>
				";
				break;
		}
		
		}else{
			include "page/beranda.php";
		}
 	?>
</div>