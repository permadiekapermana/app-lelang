<?php

    include "../config/koneksi.php";
    session_start();

    $id = $_GET['id'];
    $query = "SELECT * FROM barang JOIN users ON users.id_user = barang.id_user WHERE barang.id_barang = $id";
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

<div class="site-section">
<div class="container">
    <div class="row">
    <div class="col-lg-4 order-lg-2">
        <div class="side-box mb-4">
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
        <form action="bid.php" method="post">
            <div class="mb-4">
            <input type="hidden" name="id" value="<?=$_GET['id']?>">
            <input type="hidden" name="id_user" value="<?=$_SESSION['id_user']?>">
            <input type="hidden" name="owner" value="<?=$item['id_user']?>">
            <input type="number" min="<?=$harga_tawar_last?>" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Harga Tawaran Harus Melebihi Harga Lelang')" name="harga_tawaran" class="form-control mb-2" placeholder="Nilai Tawaran" required>
            <p>* Nilai tawaran tidak kurang dari<br>
            Rp. <?=number_format($harga_tawar_last)?></p>
            <button type="submit" class="btn btn-block btn-primary" <?=$status?>>Tawar</button>
            </div>
        </form>
        </div>
        <div class="side-box text-center">
        <img src="images/person_3.jpg" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
        <h3 class="h5 text-black"><?=$item['nama']?></h3>
        <span class="mb-3 d-block text-muted">Pelelang</span>
        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil repudiandae recusandae, incidunt possimus provident vel facilis!</p> -->
        </div>
    </div>
    <div class="col-lg-8 pr-lg-5">
        <div class="owl-carousel slide-one-item mb-5">
        <img src="../img/<?=$item['foto']?>" alt="Image" class="img-fluid mb-54">
        </div>
        <?=$item['keterangan']?>
        

        <h2 class="my-4">Peserta Lelang</h2>
        <?php $no = 1; while($bidders = mysqli_fetch_array($execute2)){?>
        <?php
        // var_dump($bidders[status]);
        ?>
        <ul class="list-unstyled bidders">
        <li class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
            <span class="mr-2"><?=$no++?>.</span>
            <div class="d-flex align-items-center">
                <span><?=$bidders['nama']?> - [<?=$bidders['status']?>]</span>
                <span></span>
            </div>
            </div>
            <span class="price">Rp. <?=number_format($bidders['harga_tawar'])?></span>
        </li>
        </ul>
        <?php } ?>
    </div>
    </div>
</div>
</div>