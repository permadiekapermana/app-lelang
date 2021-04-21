<div class="site-section">
    <div class="container">
    <div class="row">
        <div class="col-md-3">
        <div class="side-box mb-5">
            <h3>Categories</h3>
            <?=$_SESSION['nama']?>
            <ul class="list-unstyled auction-categories">
            <?php 
            $query = "SELECT * FROM kategori order by id_kategori DESC";
            $execute = mysqli_query($koneksi,$query);            

            while($data = mysqli_fetch_array($execute)){
            $jml_brg = mysqli_query($koneksi,"SELECT * FROM barang WHERE id_kategori = '$data[id_kategori]'");
            
            $jml = mysqli_num_rows($jml_brg);
            ?>
                <li><a href="#"><?= $data['kategori'] ?> <span><?=$jml?></span></a></li>
            <?php } ?>
            </ul>
        </div>
        
        </div>
        <div class="col-md-9">
        <div class="row auctions-entry">

        <?php 
            $date = date('Y-m-d');
            $query = "SELECT * FROM barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori WHERE $date <= tgl_tutup AND status='open' order by tgl_buka DESC";
            $execute = mysqli_query($koneksi,$query);

            while($data = mysqli_fetch_array($execute)){
        ?>
            <div class="col-6 col-md-4 col-lg-4">
            <div class="item">
                <div>
                
                <a href="main.php?page=item&&id=<?=$data['id_barang']?>"><img width="300px" src="../img/<?=$data['foto']?>" alt="Image" class="img-fluid"></a>
                </div>
                <div class="p-4">
                <h3><a href="main.php?page=item&&id=<?=$data['id']?>"><?=$data['nama_barang']?></a></h3>
                <div class="d-flex mb-2">
                    <span><?=$data['kategori']?></span>
                    <span class="ml-auto">Rp. <?=number_format($data['harga_buka'])?></span>
                </div>
                <div class="d-flex mb-2">
                    <span>Sampai</span>
                    <span class="ml-auto"><?=$data['tgl_tutup']?></span>
                </div>
                <a href="main.php?page=item&&id=<?=$data['id_barang']?>" class="btn  btn-primary">Input Penawaran</a>
                </div>

            </div>
            </div>
        <?php } ?>
            
            
            
        </div>
    </div>

    </div>
</div>