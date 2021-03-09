<div class="site-section">
    <div class="container">
    <div class="row mb-4">
        <div class="col-md-7 mb-5 text-center mx-auto">
        <span class="caption">Lelang</span>
        <h2 class="text-black">Daftar <strong>Lelang</strong></h2>
        </div>
    </div>
    <div class="row auctions-entry">
    <?php 
            $query = "SELECT * FROM barang INNER JOIN kategori ON kategori.id_kategori = barang.id_kategori WHERE status='open' order by tgl_buka asc";
            $execute = mysqli_query($koneksi,$query);

            while($data = mysqli_fetch_array($execute)){
        ?>
            <div class="col-6 col-md-4 col-lg-4">
            <div class="item">
                <div>
                
                <a href="main.php?page=item&&id=<?=$data['id_barang']?>"><img width="300px" src="../img/<?=$data['foto']?>" alt="Image" class="img-fluid"></a>
                </div>
                <div class="p-4">
                <h3><a href="main.php?page=item&&id=<?=$data['id_barang']?>"><?=$data['nama_barang']?></a></h3>
                <div class="d-flex mb-2">
                    <span><?=$data['kategori']?></span>
                    <span class="ml-auto">Rp. <?=number_format($data['harga_buka'])?></span>
                </div>
                <a href="main.php?page=item&&id=<?=$data['id_barang']?>" class="btn  btn-primary">Input Penawaran</a>
                </div>

            </div>
            </div>
        <?php } ?>
    </div>
    </div>
</div>