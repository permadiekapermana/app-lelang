<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Profil</h1>
                <nav class="d-flex align-items-center">
                    <a href="#">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">Profil</a>
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
                <div class="head">Akun Saya</div>
                <ul class="main-categories">
                    <li class="main-nav-list"><a href="menu.php?page=profil">Profil</a>
                    </li>
                    <li class="main-nav-list"><a href="#">Riwayat Saldo</a>
                    </li>
                    <li class="main-nav-list"><a href="#"><span
                                class="lnr lnr-arrow-right"></span>Notifikasi Menang Lelang<span class="number">(53)</span></a>
                    </li>
                    <li class="main-nav-list"><a href="#"><span
                                class="lnr lnr-arrow-right"></span>Barang Dalam Pengiriman<span class="number">(53)</span></a>
                    </li>
                    <li class="main-nav-list"><a href="#"><span
                                class="lnr lnr-arrow-right"></span>Lelang Selesai<span class="number">(53)</span></a>
                    </li>
                </ul>
            </div>
            
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Filter Bar -->
            <div class="sidebar-filter mt-0">
				<div class="top-filter-head">Profil</div>
			</div>
            <!-- End Filter Bar -->
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">

                <?php
                $query = "SELECT * FROM users INNER JOIN detail_member ON detail_member.id_user=users.id_user WHERE users.id_user='$_SESSION[id_user]'";
                $execute = mysqli_query($koneksi,$query);

                $data = mysqli_fetch_array($execute);
                ?>
                
                <!--================Order Details Area =================-->
                <div class="container mt-4">
                    <div class="row order_d_inner">
                        <div class="col-lg-12">
                            <div class="details_item">
                                <h4>Saldo : </h4>
                                <a href="?page=topup" class="btn btn-sm btn-primary ml-3 mb-1">Top Up Saldo</a> <a href="page/page_profil/withdraw_process.php" class="btn btn-sm btn-secondary mb-1">Tarik Saldo</a>
                                <h5 class="ml-3 mt-5"><?php echo"$data[nama]"; ?></h5>
                                <ul class="list mt-3">
                                    <li><a href="#"><span>Email</span> : <?php echo"$data[email]"; ?></a></li>
                                    <li><a href="#"><span>Nomor HP</span> : <?php echo"$data[no_hp]"; ?></a></li>
                                    <li><a href="#"><span>Alamat</span> : <?php echo"$data[alamat]"; ?></a></li>
                                    <li><a href="#"><span>Role</span> : <?php echo"$data[role]"; ?></a></li>
                                </ul>
                            </div>
                            <a href="?page=edit-profil" class="btn btn-sm btn-success  ml-3">Ubah Profil</a>
                        </div>
                    </div>
                    
                </div>
                <!--================End Order Details Area =================-->
    
                </div>
            </section>
            <!-- End Best Seller -->

        </div>
    </div>
</div>