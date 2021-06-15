<?php

    session_start();

    $id = $_GET['id'];
    $query = "SELECT * FROM barang INNER JOIN kategori ON barang.id_kategori=kategori.id_kategori INNER JOIN users ON users.id_user = barang.id_user WHERE barang.id_barang = $id";
    $execute = mysqli_query($koneksi,$query); //var_dump($execute);
    $item = mysqli_fetch_array($execute);

    // var_dump($execute);[7]

    $query2 = "SELECT A.id_lelang, A.harga_tawar, A.status, A.id_user, A.id_barang, B.id_user, B.nama, B.email, B.no_hp, B.alamat FROM lelang A INNER JOIN users B ON A.id_user=B.id_user WHERE A.id_barang = $id ORDER BY A.harga_tawar DESC";
    $execute2 = mysqli_query($koneksi,$query2);

    // var_dump($execute2);
    
    $query3 = "SELECT * FROM lelang WHERE id_barang = $id AND status = 'terpilih'";
    $check = mysqli_query($koneksi,$query3);

    $query4 = "SELECT COUNT(*) as total_kandidat FROM lelang A INNER JOIN users B ON A.id_user=B.id_user WHERE A.id_barang = $id ORDER BY A.harga_tawar DESC";
    $execute4 = mysqli_query($koneksi,$query4);
    $item4 = mysqli_fetch_array($execute4);

    $query5 = "SELECT A.id_lelang, A.harga_tawar, A.status, A.id_user, A.id_barang, B.id_user, B.nama, B.email, B.no_hp, B.alamat FROM lelang A INNER JOIN users B ON A.id_user=B.id_user WHERE A.id_barang = $id ORDER BY A.harga_tawar DESC LIMIT 1";
    $execute5 = mysqli_query($koneksi,$query5);
    $item5 = mysqli_fetch_array($execute5);
    $count_jumlah_lelang = mysqli_num_rows($execute5);

    // var_dump($count_jumlah_lelang);

    if ($count_jumlah_lelang>0) {
        $harga_tawar_last = $item5['harga_tawar'];
    } else {
        $harga_tawar_last = $item['harga_buka'];
    }

    // var_dump($item5);


    $status = '';
    $terima = mysqli_num_rows($check);
    
    $mulai = date('Y-m-d'); // waktu mulai
    $expr = $item['tgl_tutup']; // batas waktu
    if ($mulai >= $expr) {
    $exp = 1;
    } else {
    $exp = 0;
    }

    
    if($terima > 0 || $exp > 0){
    $status = 'disabled';
    }

?>

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Detail Items</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="single-product.html">Detail Items</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                    <div class="single-prd-item">
                        <img class="img-fluid" src="../img/<?=$item['foto']?>" alt="">
                    </div>
                    <!-- <div class="single-prd-item">
                        <img class="img-fluid" src="img/category/s-p1.jpg" alt="">
                    </div>
                    <div class="single-prd-item">
                        <img class="img-fluid" src="img/category/s-p1.jpg" alt="">
                    </div> -->
            </div>
            <!-- <div class="col-lg-5 offset-lg-1"> -->
                <!-- form submit bid -->
                <form action="page/page_barang/bid.php" class="col-lg-5" method="post">
                    <div class="mb-4 ml-5">
                    <input type="hidden" name="id" value="<?=$_GET['id']?>">
                    <input type="hidden" name="id_user" value="<?=$_SESSION['id_user']?>">
                    <input type="hidden" name="owner" value="<?=$item['id_user']?>">
                    <input type="number" min="<?=$harga_tawar_last?>" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Harga Tawaran Harus Melebihi Harga Lelang')" name="harga_tawaran" class="form-control mb-2" placeholder="Nilai Tawaran" required>
                    <p>* Nilai tawaran tidak kurang dari<br>
                    Rp. <?=number_format($harga_tawar_last)?></p>
                    <button type="submit" class="btn btn-block btn-primary" <?=$status?>>Tawar</button>
                    </div>
                </form>
                <!-- end form submit bid -->
            <!-- </div>             -->
            <div class="s_product_text col-lg-5 offset-lg-4">
                <h3><?=$item['nama_barang']?></h3>
                <h2>Rp. <?=number_format($item['harga_buka'])?></h2>
                <ul class="list">
                    <li><a class="active" href="#"><span>Kategori</span> : <?=$item['kategori']?></a></li>
                </ul>
                <p><?=$item['keterangan']?></p>
                <div class="card_area d-flex align-items-center">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Keterangan Lelang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                    aria-selected="true">Peserta Lelang</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                    aria-selected="false">Comments</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                    aria-selected="false">Pelelang</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p>
                    <table>
                    <tr>
                        <td>Harga Buka</td><td>: <strong class="text-black">Rp. <?=number_format($item['harga_buka'])?></strong></td>
                    </tr>
                    <tr>
                        <td>Harga Tertinggi</td><td>: <strong class="text-black">Rp. <?=number_format($harga_tawar_last)?></strong></td>
                    </tr>
                    <tr>
                        <td>Tanggal Tutup</td><td>: <strong class="text-black"><?=date('d/m/Y',strtotime($item['tgl_tutup']))?></strong></td>
                    </tr>
                    <tr>
                        <td>Jumlah Kandidat</td><td>: <strong class="text-black"><?=$item4['total_kandidat']?></strong></td>  
                    </tr>
                    </table>
                </p>
            </div>
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <h2 class="my-4">Peserta Lelang</h2>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <?php $no = 1; while($bidders = mysqli_fetch_array($execute2)){?>
                            <?php
                            // var_dump($bidders[status]);
                            ?>
                            <tr>
                                <td>
                                    <h5><?=$no++?>. <?=$bidders['nama']?> - [<?=$bidders['status']?>]</h5>
                                </td>
                                <td>
                                    <h5>Rp. <?=number_format($bidders['harga_tawar'])?></h5>
                                </td>
                            </tr>
                            <?php } ?>                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="comment_list">
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/review-1.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <h5>12th Feb, 2018 at 05:56 pm</h5>
                                        <a class="reply_btn" href="#">Reply</a>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo</p>
                            </div>
                            <div class="review_item reply">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/review-2.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <h5>12th Feb, 2018 at 05:56 pm</h5>
                                        <a class="reply_btn" href="#">Reply</a>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo</p>
                            </div>
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/review-3.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <h5>12th Feb, 2018 at 05:56 pm</h5>
                                        <a class="reply_btn" href="#">Reply</a>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="review_box">
                            <h4>Post a comment</h4>
                            <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="submit" value="submit" class="btn primary-btn">Submit Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="review_list">
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/review-1.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4><?=$item['nama']?></h4>
                                        <p>Pelelang</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Product Description Area =================-->