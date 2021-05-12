<div class="site-section">
    <div class="container">
    <div class="row">
        <div class="col-md-3">
        <div class="side-box mb-5">
            <h3>Riwayat Lelang</h3>
            <ul class="list-unstyled auction-categories">
                <?php
                $date = date('Y-m-d');
                $query = "SELECT * FROM barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori WHERE status='close' order by tgl_buka DESC";
                $execute = mysqli_query($koneksi,$query);
                $total_brg = mysqli_num_rows($execute);

                $query2 = "SELECT DISTINCT barang.id_barang, barang.nama_barang, barang.harga_buka, barang.tgl_tutup, barang.foto, kategori.kategori FROM barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori INNER JOIN lelang ON barang.id_barang=lelang.id_barang INNER JOIN users ON users.id_user=lelang.id_user WHERE barang.status='close' AND lelang.id_user='$_SESSION[id_user]' order by tgl_buka DESC";
                $execute2 = mysqli_query($koneksi,$query2);
                $total_brg_user = mysqli_num_rows($execute2);
                ?>
                <li><a href="?page=riwayat">Riwayat Seluruh Lelang <span><?php echo"$total_brg"; ?></span></a></li>
                <li><a href="?page=riwayat_user">Riwayat Lelang Saya <span><?php echo"$total_brg_user"; ?></span></a></li>
            </ul>
        </div>
        
        </div>
        <div class="col-md-9">
        <div class="row auctions-entry">

        <?php 
            $date = date('Y-m-d');
            $query = "SELECT DISTINCT barang.id_barang, barang.nama_barang, barang.harga_buka, barang.tgl_tutup, barang.foto, kategori.kategori FROM barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori INNER JOIN lelang ON barang.id_barang=lelang.id_barang INNER JOIN users ON users.id_user=lelang.id_user WHERE barang.status='close' AND lelang.id_user='$_SESSION[id_user]' order by tgl_buka DESC";
            $execute = mysqli_query($koneksi,$query);

            while($data = mysqli_fetch_array($execute)){
        ?>
            <div class="col-6 col-md-4 col-lg-4">
            <div class="item">
                <div>
                
                <a href="main.php?page=item&&id=<?=$data['id_barang']?>"><img width="300px" src="../img/<?=$data['foto']?>" alt="Image" class="img-fluid"></a>
                </div>
                <div class="p-4">
                <h3><a href="main.php?page=item&id=<?=$data['id_barang']?>"><?=$data['nama_barang']?></a></h3>
                <div class="d-flex mb-2">
                    <span><?=$data['kategori']?></span>
                    <span class="ml-auto">Rp. <?=number_format($data['harga_buka'])?></span>
                </div>
                <div class="d-flex mb-2">
                    <span>Sampai</span>
                    <span class="ml-auto"><?=$data['tgl_tutup']?></span>
                </div>
                <a href="main.php?page=item&id=<?=$data['id_barang']?>" class="btn  btn-primary">Lihat Detail</a>
                </div>

            </div>
            </div>
        <?php } ?>
            
            
            
        </div>
    </div>

    </div>
</div>