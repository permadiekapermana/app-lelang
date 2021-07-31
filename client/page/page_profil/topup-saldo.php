<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Halaman Top Up Saldo</h1>
                <nav class="d-flex align-items-center">
                    <a href="?page=dashboard">Beranda<span class="lnr lnr-arrow-right"></span></a>
                   
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
    <div class="container mr-5">
        <div class="row">             
        
           
                    <form class="row contact_form" action="page/page_profil/proses_saldos.php" method="post" enctype="multipart/form-data">
                               
                                
                                    <div class="form-group mr-5">
                                        <h5>Isi Jumlah Saldo</h5>
                                        <input type="text" class="form-control" id="saldos" name="saldos" placeholder="Masukkan Nomor Rekening" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Jumlah Saldo'" required>
                                        <font color='red'>* Nb.  Pembelian Saldo Minimal Rp. 200.000</font>
                                    </div>
                                    <?php
                $query = "SELECT * FROM users WHERE users.id_user='$_SESSION[id_user]'";
                $execute = mysqli_query($koneksi,$query);

                $data = mysqli_fetch_array($execute);
                ?> 
                                 <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo"$data[id_user]"; ?>" placeholder="Masukkan Nomor Rekening" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Jumlah Saldo'" required>
                               
                                <div class="col-md-7 text-left">
                                    <button type="submit" value="submit" class="primary-btn">TopUp</button>
                                </div>
                            </form>
                </div>
            </div>
    </div>
</section>
<!--================End Login Box Area =================-->