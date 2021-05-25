<div class="card card-info">
<div class="card-header">
    <h3 class="card-title">Info Bidder Lelang</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
<table class="table table-bordered table-hover">
    <!-- <a href="?module=barang&&method=add"><button class="btn btn-primary">Tambah</button></a> -->
    <thead>
    <tr>
    <th>No.</th>
    <th>Nama</th>
    <th>Harga Tawar</th>
    <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $qry = "SELECT lelang.harga_tawar, lelang.status, users.nama FROM lelang INNER JOIN users ON lelang.id_user=users.id_user WHERE id_barang='$_GET[id]' ORDER BY id_lelang DESC";
        $execute = mysqli_query($koneksi,$qry); 
        $no = 1;
        while($list = mysqli_fetch_array($execute)){
        ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$list['nama']?></td>
            <td><?=$list['harga_tawar']?></td>
            <td><?=$list['status']?></td>
        </tr>  
        <?php

        }
    ?>
    </tbody>
</table>
</div>
<!-- /.card-body -->
</div>