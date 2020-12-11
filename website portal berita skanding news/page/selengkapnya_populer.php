<?php 
    include "koneksi.php";
    $id = $_GET['id'];
    $detail=mysqli_query($koneksi,"Select * from tb_post_populer where id='".$_GET['id']."'");
    $d=mysqli_fetch_array($detail);
    // cek id ada apa tidak di databases / mencegah xss
    if (isset($id) == $d) {
    echo '
        ';
    } else {
        echo "
                <script>
                    alert('jangan coba coba lakukan ini lagi');
                    document.location.href = 'index.php';
                </script>
            ";
    }

    // panggil functions dan query tampil post populer
    $post_populer = mysqli_query($koneksi, "SELECT * FROM tb_post_populer,tb_user WHERE tb_post_populer.id_user_populer=tb_user.id_user order by id='".$_GET['id']."' desc");

    $kategori_berita = kategori_berita("SELECT * FROM tb_kategoripost ORDER BY id_kat");
?>
<div class="container">
        <section class="post-berita mt-3">
            <div class="row">
                <div class="col-lg-7 text-left mt-1" style="font-size: 12px;">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li aria-current="page"><i class="fas fa-home"></i> &nbsp;</li>
                        <li class="breadcrumb-item"><a href="index.php" style="color: #00a5af;">Home </a></li>
                        <li class="detail-breadcrumb" aria-current="page">&nbsp; › &nbsp;<?= $d['judul_berita_populer'];?></li>
                      </ol>
                    </nav>
                   <section>
                        <div class="container">
                            <div class="row ">
                                <div class="col-md-12 mobile_selengkapnya">
                                    <table >
                                        <tr>
                                            <td class=""><h4 class="text-center"><?= $d['judul_berita_populer'];?></h4></td>
                                        </tr>
                                        <tr>

                                            <td>
                                                <img class="rounded" src="vendor/img/<?= $d['gambar_berita_populer']; ?>" style="float:left;padding:5px 10px 5px 10px;width:450px;margin-top:35px;padding-bottom: 10px;margin-left: 12%;">
                                            </td>
                                                <p class="card-text">
                                                    <?php foreach ($post_populer as $value) :?>
                                                    <small class="text-muted">Diposting oleh : <?php echo $value['nama_lengkap']; ?>  </small>
                                                    <?php break; ?>
                                                    <?php endforeach; ?>
                                                    <small class="text-muted">, <?= date("M d, Y", strtotime($d['tgl_berita_populer']))?>  </small>
                                                </p>
                                        </tr><br><br>
                                        <tr>
                                            <td style="font-size: 14px;text-align: justify;"><?= $d['isi_berita_populer'];?></td>
                                        </tr>
                                    </table>
                                            <br><br><br><br><br><br>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-4 text-center ml-5 mx-auto">
    <!-- =============================== populer berita ======================================= -->
                    <div class="mx-auto kategori-berita-judul">
                            <h6 class="font-weight-bold text-center">BERITA POPULER</h6>
                    </div>
                    <hr class="hr-judul" style="width: 210px;">
                    <?php foreach ($post_populer as $populer) : ?>
                    <div class="card mb-3 mt-4 border-0" style="max-width: 640px;" data-aos="zoom-in">
                        <div class="row no-gutters" style="display: flex;">
                            <div class="col-md-4">
                                <img src="vendor/img/<?php echo $populer['gambar_berita_populer']; ?>" class="card-img img-sub" alt="..." style="width: 120px; height: 80px;">
                            </div>
                            <div class="col-md-8 col-sm-3">
                                <div class="card-body mt-n4">
                                    <a class="font-weight-bold" href="index.php?id=<?=$populer['id'];?>&&page=selengkapnya_populer">
                                        <p class="postst mt-9"><?php echo $populer['judul_berita_populer']; ?></p>
                                    </a>
                                    <p class="card-text mt-n3 ml-n2 text-populer" style="text-align: left;padding: -10px;"><?php echo $populer['detail_berita_populer']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
    <!-- ================================ kategori berita ======================================= -->
                    <?php require "kategori.php"; ?>
                    <!-- subcribe now -->
                    <div class="card subcribe" data-aos="zoom-in">
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