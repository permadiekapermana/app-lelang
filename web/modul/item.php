<?php

    $id = $_GET['id'];
    $query = "SELECT * FROM barang JOIN users ON users.id_user = barang.id_user WHERE barang.id_barang = $id";
    $execute = mysqli_query($koneksi,$query); //var_dump($execute);
    $item = mysqli_fetch_array($execute);

    $query2 = "SELECT * FROM lelang INNER JOIN users ON lelang.id_user=users.id_user WHERE id_barang = $id";
    $execute2 = mysqli_query($koneksi,$query2);
    
    $query3 = "SELECT * FROM lelang WHERE id_barang = $id AND status = 'terpilih'";
    $check = mysqli_query($koneksi,$query3);

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
    <div class="col-lg-3 order-lg-2">
        <div class="side-box mb-4">
        <p>
            <table>
            <tr>
                <td>Harga Buka</td><td>: <strong class="text-black">Rp. <?=number_format($item['harga_buka'])?></strong></td>
            </tr>
            <tr>
                <td>Tanggal Tutup</td><td>: <strong class="text-black"><?=date('d/m/Y',strtotime($item['tgl_tutup']))?></strong></td>
            </tr>
            <!-- <tr>
                <td>Jumlah Kandidat</td><td>: <strong class="text-black">4</strong></td>  
            </tr> -->
            </table>
        </p>
        <form action="bid.php" method="post">
            <div class="mb-4">
            <input type="hidden" name="id" value="<?=$_GET['id_barang']?>">
            <input type="hidden" name="owner" value="<?=$item['id_user']?>">
            <input type="text" name="kandidat" class="form-control mb-2" placeholder="Input Nama Anda" required>
            <input type="text" name="nope" class="form-control mb-2" placeholder="Input Nomor HP/WA Anda" required> 
            <input type="number" min="<?=$item['harga_buka']?>" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Harga Tawaran Harus Melebihi Harga Lelang')" name="harga_tawaran" class="form-control mb-2" placeholder="Nilai Tawaran" required>
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