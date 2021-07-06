<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Bayar Top Up</h1>
                <nav class="d-flex align-items-center">
                    <a href="#">Home<span class="lnr lnr-arrow-right"></span></a>
                    
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
                <div class="head">Data Bayar</div>
                <?php
                    include "sidebar.php";
                ?>
            </div>
            
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Filter Bar -->
            <div class="sidebar-filter mt-0">
				<div class="top-filter-head">Jumlah Pembayaran</div>
			</div>
            <!-- End Filter Bar -->
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">

                <?php
                $query = "SELECT * FROM users INNER JOIN saldo ON saldo.id_users=users.id_user WHERE users.id_user='$_SESSION[id_user]' ORDER BY id_saldo DESC LIMIT 1";
                $execute = mysqli_query($koneksi,$query);

                $data = mysqli_fetch_array($execute);
                ?>
           <!--================Order Details Area =================-->
                <div class="container mt-4">
                    <div class="row order_d_inner">
                        <div class="col-lg-12">
                            <div class="details_item">
                               
                                <h5 class="ml-3 mt-5"><?php echo"$data[nama]"; ?></h5>
                                <ul class="list mt-3">
                                    <li><a href="#"><span>Jumlah Pembelian</span> : <?php echo"$data[saldos]"; ?></a></li>
                                    <li><a href="#"><span>Nomor HP</span> : <?php echo"$data[no_hp]"; ?></a></li>
                                    <li><a href="#"><span>Alamat</span> : <?php echo"$data[alamat]"; ?></a></li>
                                    <li><a href="#"><span>Role</span> : <?php echo"$data[order_id]"; ?></a></li>
                                </ul>
                                <input type="hidden" class="form-control" id="total_semua" name="total_semua" value="<?php echo"$data[saldos]"; ?>" placeholder="Masukkan Nomor Rekening" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Jumlah Saldo'" required>
                                <input type="hidden" class="form-control" id="nilai" name="nilai" value="<?php echo"$data[order_id]"; ?>" placeholder="Masukkan Nomor Rekening" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Jumlah Saldo'" required>
                                
                                <input type="hidden" class="form-control" id="id_saldo" name="id_saldo" value="<?php echo"$data[id_saldo]"; ?>" placeholder="Masukkan Nomor Rekening" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Jumlah Saldo'" required>
                            </div>
                            <button  type="button" class="btn btn-warning"  ml-3 id="pay-button" >Bayar</button>
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