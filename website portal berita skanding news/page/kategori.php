<!-- ================================ kategori berita ==================================== -->
					<div class="mx-auto kategori-berita-judul" data-aos="zoom-in">
						<h6 class="font-weight-bold text-center">KATEGORI BERITA</h6>
					</div>
					<hr class="hr-judul" style="width: 210px;" data-aos="zoom-in">
					<ul class="list-group list-group-flush text-left" data-aos="zoom-in">
						<?php foreach ($kategori_berita as $kb) :?>
							<a href="index.php?id=<?=$kb['id_kat'];?>&&page=kategoriberita" style="text-decoration: none;color: #444;">
								<li class="list-group-item d-flex justify-content-between align-items-center list-group-item list-group-item-action">
									<?= $kb['kategori_post'];?> 
									<span class="badge badge-primary badge-pill">
										<!-- histung jumlah setiap kategori -->
										<?php 
				                            $data1 = mysqli_query($koneksi, "select * from tb_post where id_kat='$kb[id_kat]'");
				                            $jml=mysqli_num_rows($data1); echo $jml;?>
									</span>
								</li>
							</a>
						<?php endforeach; ?>
						<hr>
					</ul>