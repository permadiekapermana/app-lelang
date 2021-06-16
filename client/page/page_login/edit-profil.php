	<!-- Start Banner Area -->
	<?php
  include "../config/koneksi.php";
  error_reporting(0);
  session_start(0); 
  if (empty($_SESSION['id_user']) AND empty($_SESSION['password'])){
    echo "<script>alert('Untuk mengakses sistem, Anda harus login'); window.location = '../client/index.php'</script>";
  }
  ?>
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Profil</h1>
					<nav class="d-flex align-items-center">
						<a href="?page=dashboard">Beranda<span class="lnr lnr-arrow-right"></span></a>
						<a href="?page=profil">Profil</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">				
			
				<h3>Ubah Profil</h3> <br><br>
				<?php
				$query = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
				$execute = mysqli_query($koneksi,$query);
				$r 		= mysqli_fetch_array($execute);
				?>
						<form class="row contact_form" action="page/page_login/aksi_profil.php" method="post" enctype="multipart/form-data">
									<div class="col-md-7">
										<div class="form-group">
											<h5>Email</h5>
											<input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email" value='<?php echo"$r[email]"; ?>' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan email'" disabled>
											<input type="hidden" class="form-control" id="email" name="email" placeholder="Masukkan email" value='<?php echo"$r[email]"; ?>' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan email'">
										</div>
									</div>
									<div class="col-md-7">
										<div class="form-group">
											<h5>Nama Lengkap</h5>
											<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Nama Lengkap'" value='<?php echo"$r[nama]"; ?>' required>
										</div>
									</div>
									<div class="col-md-7">
										<div class="form-group">
											<h5>Nomor Handphone</h5>
											<input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor HP" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Nomor HP'" value='<?php echo"$r[no_hp]"; ?>' required>
										</div>
									</div>									
									<div class='col-md-7' id="kota"></div>
									<div class="col-md-7">
										<div class="form-group">
											<h5>Alamat Lengkap</h5>
											<textarea class="form-control" name="alamat" id="alamat" rows="1" placeholder="Masukkan Alamat Lengkap" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Alamat Lengkap'" required><?php echo"$r[alamat]"; ?></textarea>
										</div>
									</div>
									<div class="col-md-7 text-left">
										<button type="submit" value="submit" class="primary-btn">Ubah Profil</button>
									</div>
								</form>
					</div>
				</div>
		
	</section>
	<!--================End Login Box Area =================-->

