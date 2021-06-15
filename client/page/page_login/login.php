	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login/Daftar</h1>
					<nav class="d-flex align-items-center">
						<a href="?page=dashboard">Beranda<span class="lnr lnr-arrow-right"></span></a>
						<a href="?page=login">Login/Daftar</a>
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
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>Pengguna baru ?</h4>
							<a class="primary-btn" href="?page=register">Buat Akun</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Silahkan Login untuk melanjutkan</h3>
						<form class="row login_form" action="page/page_login/cek_login.php" method="POST" id="contactForm">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="useremail" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required>
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="name" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required>
							</div>
							<div class="col-md-12 form-group">
								<input type="submit" name="login" value="Login" class="primary-btn">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->