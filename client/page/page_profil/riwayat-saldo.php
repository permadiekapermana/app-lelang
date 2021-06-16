<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Riwayat Saldo</h1>
                <nav class="d-flex align-items-center">
                    <a href="#">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">Riwayat Saldo</a>
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
                <?php
                    include "sidebar.php";
                ?>
            </div>
            
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Filter Bar -->
            <div class="sidebar-filter mt-0">
				<div class="top-filter-head">Riwayat Saldo</div>
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
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Nominal</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Bukti Transfer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $qry = "SELECT * FROM riwayat_saldo WHERE id_user='$_SESSION[id_user]' ORDER BY id_riwayatsaldo DESC";
                                        $execute = mysqli_query($koneksi,$qry); 
                                        $no = 1;
                                        while($list = mysqli_fetch_array($execute)){
                                    ?>
                                    <tr>
                                        <td>
                                            <h5><?=$no++?></h5>
                                        </td>
                                        <td>
                                            <h5><?=$list['jenis']?></h5>
                                        </td>
                                        <td>
                                            <h5><?=$list['nominal']?></h5>
                                        </td>
                                        <td>
                                            <h5><?=$list['status']?></h5>
                                        </td>
                                        <?php
                                            if($list['bukti_transfer']!=NULL) {
                                        ?>
                                        <td>
                                            <img width="200px" src="../img/<?=$list['bukti_transfer']?>" alt="">
                                        </td>
                                        <?php
                                            } else {
                                        ?>
                                        <td>Belum Ada</td>
                                        <?php
                                            }
                                        ?>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->
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