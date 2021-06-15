<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
	<div class="container">
		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first">
				<h1>Login/Daftar</h1>
				<nav class="d-flex align-items-center">
					<a href="?page=dashboard">Beranda<span class="lnr lnr-arrow-right"></span></a>
					<a href="?page=register">Login/Daftar</a>
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
		
			<h3>Registrasi Pengguna Baru</h3> <br><br>
					<form class="row contact_form" action="page/page_login/aksi_register.php" method="post" enctype="multipart/form-data">
								<div class="col-md-7">
									<div class="form-group">
										<h5>Nama Lengkap</h5>
										<input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Lengkap" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Nama Lengkap'" required>
									</div>
								</div>
								<div class="col-md-7">
									<div class="form-group">
										<h5>Nomor HP/WA</h5>
										<input type="text" class="form-control" id="hp" name="hp" placeholder="Masukkan Nomor HP/WA" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Nomor HP/WA'" required>
									</div>
								</div>
								<div class="col-md-7">
									<div class="form-group">
										<h5>E-mail</h5>
										<input type="email" class="form-control" id="email" name="email" placeholder="Masukkan E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan E-mail'" required>
									</div>
								</div>
								<div class="col-md-7">
									<div class="form-group">
										<h5>Alamat Lengkap</h5>
										<textarea class="form-control" name="alamat" id="alamat" rows="1" placeholder="Masukkan Alamat Lengkap" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Alamat Lengkap'" required></textarea>
									</div>
								</div>
								<div class="col-md-7">
									<div class="form-group">
										<h5>Hak Akses</h5>
										<select name="level" class="form-control form-control-lg" required>
											<option value="">-- Pilih Hak Akses</option>
											<option value="pelelang">Pelelang</option>
											<option value="member">Member</option>
										</select>
									</div>
								</div><br>
								<div class="col-md-7">
									<div class="form-group">
										<h5>Password</h5>
										<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Password'" required>
									</div>
								</div>
								<div class="col-md-7">
									<div class="form-group">
										<h5>Masukkan Ulang Password</h5>
										<input type="password" class="form-control" id="password" name="password2" placeholder="Masukkan Ulang Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Ulang Password'" required>
									</div>
								</div>
								<div class="col-md-7">
									<div class="form-group">
										<h5>Bank</h5>
										<select name="bank" class="form-control form-control-lg" required>
											<option value="">-- Pilih Bank</option>
											<option value="BNI">BNI</option>
											<option value="BRI">BRI</option>
											<option value="BTN">BTN</option>
											<option value="Mandiri">Mandiri</option>
											<option value="BCA">BCA</option>
										</select>
									</div>
								</div><br>
								<div class="col-md-7">
									<div class="form-group">
										<h5>Nomor Rekening</h5>
										<input type="text" class="form-control" id="norek" name="norek" placeholder="Masukkan Nomor Rekening" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Nomor Rekening'" required>
										<font color='red'>* Nama Pemilik Rekening Harus Sama Dengan Nama Akun</font>
									</div>
								</div>
								<div class="col-md-7 text-left">
									<button type="submit" value="submit" class="primary-btn">Daftar</button>
								</div>
							</form>
				</div>
			</div>
	
</section>
<!--================End Login Box Area =================-->