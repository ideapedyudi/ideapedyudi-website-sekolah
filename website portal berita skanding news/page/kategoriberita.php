<?php 
    include "koneksi.php";
    //@$id=$_GET['id'];
    $detail = kategori_pilih();
    // panggil functions dan query tampil post populer
    $post_populer = query("SELECT * FROM tb_post_populer,tb_user WHERE tb_post_populer.id_user_populer=tb_user.id_user");
    $kategori_berita = kategori_berita("SELECT * FROM tb_kategoripost ORDER BY id_kat");
?>
<div class="container">
    <!-- ========================== isi berita =================================== -->
        <section class="post-berita mt-3">
            <div class="row">
                <div class="col-lg-7 text-left mt-1" style="font-size: 12px;">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li aria-current="page"><i class="fas fa-home"></i> &nbsp;</li>
                        <li class="breadcrumb-item"><a href="index.php" style="color: #00a5af;">Home </a></li>
                        <?php foreach ($detail as $value) : ?>
                            <li class="detail-breadcrumb" aria-current="page">&nbsp; › &nbsp;Kategori Berita <?php echo $value['kategori_berita']; ?></li>
                            <?php break; ?>
                        <?php endforeach; ?>
                      </ol>
                    </nav>
                   <section>
                    <?php foreach ($detail as $d) :?>
                        <div class="container mt-3">
                            <div class="row ">
                               <div class="col-md-4">
                                <img src="vendor/img/<?= $d['gambar_berita']; ?>" class="card-img post-img" alt="..." style="width: 220px; height: 140px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body mt-n4">
                                    <a href="index.php?id=<?=$d['id_post'];?>&&page=selengkapnya" class="postbaru">
                                        <h5 class="card-title" style="color: #00a5af; text-decoration: none;"><?= $d['judul_berita'];?></h5>
                                    </a>
                                    <p class="card-text"><?php echo $d['deskripsi_berita']; ?></p>
                                    <p class="card-text" style="font-size: 15px;">
                                        <small class="text-muted mut text-kategori"><?php echo $d['kategori_berita']; ?></small>
                                    </p>
                                </div>
                            </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </section>
                </div>
                <div class="col-lg-4 text-center ml-5 mx-auto">
    <!-- =============================== populer post =========================== -->
                    <div class="mx-auto kategori-berita-judul">
                            <h6 class="font-weight-bold text-center">POPULAR POSTS</h6>
                    </div>
                    <hr class="hr-judul" style="width: 210px;">
                    <?php foreach ($post_populer as $populer) : ?>
                    <div class="card mb-3 mt-4 border-0" style="max-width: 640px;"  data-aos="zoom-in">
                        <div class="row no-gutters" style="display: flex;">
                            <div class="col-md-4">
                                <img src="vendor/img/<?php echo $populer['gambar_berita_populer']; ?>" class="card-img img-sub" alt="..." style="width: 120px; height: 80px;">
                            </div>
                            <div class="col-md-8 col-sm-3">
                                <div class="card-body mt-n4">
                                    <a href="">
                                        <p class="postst mt-2"><?php echo $populer['judul_berita_populer']; ?></p>
                                    </a>
                                    <p class="card-text mt-n3 ml-n2 text-populer" style="text-align: left;padding: -10px;"><?php echo $populer['detail_berita_populer']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
   <!-- ================================ kategori berita ======================================= -->
                    <?php require "kategori.php"; ?>
    <!-- ========================= berlanganan berita ===================================== -->
                    <div class="card subcribe"  data-aos="zoom-in">
                        <div class="card-body">
                            <h5 class="card-title">Berlangganan Artikel Baru</h5>
                            <p class="card-text">Berlangganan Buletin Kami untuk Dapatkan Pembaruan Kualitas di Email Anda. Gratis!</p>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email.." style="height: 40px; font-size: 13px;">
                            <a href="#" class="card-link btn btn-primary btn-block mt-2 bg-primarys">Berlangganan sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>