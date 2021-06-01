<div class="site-section">
    <div class="container">
    <div class="row">
        <div class="col-md-3">
        <div class="side-box mb-5">
            <h3 class="mb-2">Akun Saya</h3>
            <ul class="list-unstyled auction-categories">
                <?php
                include "sidebar.php";
                ?>
            </ul>
        </div>
        
        </div>
        <div class="col-md-9">
        <div class="row auctions-entry">

        <?php
        $query = "SELECT * FROM users INNER JOIN detail_member ON detail_member.id_user=users.id_user WHERE users.id_user='$_SESSION[id_user]'";
        $execute = mysqli_query($koneksi,$query);

        $data = mysqli_fetch_array($execute);
        ?>

        <div class="card" style="width: 60rem;">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">          
            <h5 class="card-title">Lelang Sedang Diproses</h5>
            <table class='table'>
                <thead>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Tanggal Buka</th>
                    <th>Tanggal Tutup</th>                    
                    <th>Status</th>
                </thead>
                <tbody>
                <?php
                    $qry = "SELECT * FROM kirim_barang INNER JOIN lelang ON kirim_barang.id_lelang=lelang.id_lelang INNER JOIN barang ON lelang.id_barang=barang.id_barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori WHERE lelang.status='terpilih' AND lelang.id_user='$_SESSION[id_user]' AND status_kirim='Menunggu Pengiriman'";
                    $execute = mysqli_query($koneksi,$qry); 
                    $no = 1;
                    while($list = mysqli_fetch_array($execute)){
                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$list['nama_barang']?></td>
                        <td><?=$list['kategori']?></td>
                        <td><?=$list['tgl_buka']?></td>
                        <td><?=$list['tgl_tutup']?></td>
                        <td><?=$list['status_kirim']?></td>
                    </tr>  
                    <?php

                    }
                ?>
                </tbody>
            </table>
        </div>
        </div>
            
            
            
        </div>
    </div>

    </div>
</div>