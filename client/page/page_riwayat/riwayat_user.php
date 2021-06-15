<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
	<div class="container">
		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first">
				<h1>Riwayat Lelang</h1>
				<nav class="d-flex align-items-center">
					<a href="#">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="#">Riwayat Lelang</a>
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
					$date = date('Y-m-d');
					$query = "SELECT * FROM barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori WHERE status='close' order by tgl_buka DESC";
					$execute = mysqli_query($koneksi,$query);
					$total_brg = mysqli_num_rows($execute);

					$query2 = "SELECT DISTINCT barang.id_barang, barang.nama_barang, barang.harga_buka, barang.tgl_tutup, barang.foto, kategori.kategori FROM barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori INNER JOIN lelang ON barang.id_barang=lelang.id_barang INNER JOIN users ON users.id_user=lelang.id_user WHERE barang.status='close' AND lelang.id_user='$_SESSION[id_user]' order by tgl_buka DESC";
					$execute2 = mysqli_query($koneksi,$query2);
					$total_brg_user = mysqli_num_rows($execute2);
					?>
					<li class="main-nav-list"><a class="border-bottom-0"  href="?page=riwayat"><span class="lnr lnr-arrow-right"></span>Riwayat Seluruh Lelang <span class="number">(<?php echo"$total_brg"; ?>)</span></a>
					</li>
					<li class="main-nav-list"><a class="border-bottom-0" href="?page=riwayat_user"  ><span class="lnr lnr-arrow-right"></span>Riwayat Lelang Saya <span class="number">(<?php echo"$total_brg_user"; ?>)</span></a>
					</li>				
				</ul>
			</div>
			
		</div>
		<div class="col-xl-9 col-lg-8 col-md-7">
			<!-- Start Filter Bar -->
			<div class="sidebar-filter mt-0">
				<div class="top-filter-head">Riwayat Lelang</div>
			</div>
			<!-- End Filter Bar -->
			<!-- Start Best Seller -->
			<section class="lattest-product-area pb-40 category-list">
				<div class="row">
					<!-- single product -->
					<?php 
						$date = date('Y-m-d');
						$query = "SELECT DISTINCT barang.id_barang, barang.nama_barang, barang.harga_buka, barang.tgl_tutup, barang.foto, kategori.kategori FROM barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori INNER JOIN lelang ON barang.id_barang=lelang.id_barang INNER JOIN users ON users.id_user=lelang.id_user WHERE barang.status='close' AND lelang.id_user='$_SESSION[id_user]' order by tgl_buka DESC";
						$execute = mysqli_query($koneksi,$query);

						$total_brg = mysqli_num_rows($execute);

						if ($total_brg<=0) {
						echo"<h1 class='ml-5 mt-5'>Tidak ada lelang yang diikuti</h1>";
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