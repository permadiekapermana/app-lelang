<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
	<div class="container">
		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first">
				<h1>Lelang berlangsung</h1>
				<nav class="d-flex align-items-center">
					<a href="#">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="#">Lelang Berlangsung</a>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- End Banner Area -->
<div class="container">
	<div class="row">
		<div class="col-xl-3 col-lg-4 col-md-5">
			<div class="sidebar-categories">
				<div class="head">Kategori</div>
				<ul class="main-categories">
					<?php 
					$query = "SELECT * FROM kategori order by id_kategori DESC";
					$execute = mysqli_query($koneksi,$query);            

					while($data = mysqli_fetch_array($execute)){
					$jml_brg = mysqli_query($koneksi,"SELECT * FROM barang WHERE NOW() >= tgl_buka AND NOW() <= tgl_tutup AND id_kategori = '$data[id_kategori]'");
					
					$jml = mysqli_num_rows($jml_brg);
					?>
						<li class="main-nav-list"><a class="border-bottom-0" data-toggle="collapse" href="#babyCare" aria-expanded="false"
							aria-controls="babyCare"><span class="lnr lnr-arrow-right"></span><?= $data['kategori'] ?><span class="number">(<?=$jml?>)</span></a>
						</li>
					<?php } ?>					
				</ul>
			</div>
			
		</div>
		<div class="col-xl-9 col-lg-8 col-md-7">
			<!-- Start Filter Bar -->
			<div class="sidebar-filter mt-0">
				<div class="top-filter-head">Daftar Barang</div>
			</div>
			<!-- End Filter Bar -->
			<!-- Start Best Seller -->
			<section class="lattest-product-area pb-40 category-list">
				<div class="row">
					<!-- single product -->
					<?php 
						$date = date('Y-m-d');
						$query = "SELECT * FROM barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori WHERE NOW() >= tgl_buka AND NOW() <= tgl_tutup order by tgl_buka DESC";
						$execute = mysqli_query($koneksi,$query);

						$total_brg = mysqli_num_rows($execute);

						if ($total_brg<=0) {
						echo"<h1 class='ml-5 mt-5'>Tidak ada lelang berlangsung</h1>";
						}

						while($data = mysqli_fetch_array($execute)){
					?>
					<!-- Item Barang -->
					<div class="col-lg-4 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="../img/<?=$data['foto']?>" alt="">
							<div class="product-details">
								<h6><?=$data['nama_barang']?></h6>
								<div class="price">
									<h6><?=$data['kategori']?></h6>
									<h6>Rp. <?=number_format($data['harga_buka'])?></h6>
								</div>
								<div class="price">
									<h6>Sampai</h6>
									<h6><?=$data['tgl_tutup']?></h6>
								</div>
								<div class="prd-bottom">
								<?php
								if (empty($_SESSION['id_user']) AND empty($_SESSION['password'])){
								?>
									<a href="" onClick="return alert('Anda harus login terlebih dahulu!')" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">Bid</p>
									</a>
								
								<?php
								} else {
								?>
									<a href="?page=item&id=<?=$data['id_barang']?>" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">Bid</p>
									</a>
								<?php
								}
								?>
								</div>
							</div>
						</div>
					</div>
					<!-- End Item Barang -->

					<?php } ?>

					

				</div>
			</section>
			<!-- End Best Seller -->
		</div>
	</div>
</div>