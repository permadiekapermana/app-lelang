<div class="card">
<div class="card-header">
    <h3 class="card-title">Data Pengiriman</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
<table id="example2" class="table table-bordered table-hover">
    <!-- <a href="?module=barang&&method=add"><button class="btn btn-primary">Tambah</button></a> -->
    <thead>
    <tr>
    <th>No.</th>
    <th>Nama Barang</th>
    <th>Jasa Ekspedisi</th>
    <th>Nomor Resi</th>
    <th>Status</th>
    <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $qry = "SELECT * FROM kirim_barang INNER JOIN lelang ON kirim_barang.id_lelang=lelang.id_lelang INNER JOIN barang ON lelang.id_barang=barang.id_barang WHERE (status_kirim='Selesai') AND barang.id_user='$_SESSION[id_user]'";
        $execute = mysqli_query($koneksi,$qry); 
        $no = 1;
        while($list = mysqli_fetch_array($execute)){
        ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$list['nama_barang']?></td>
            <?php
            if($list['jasa_ekspedisi']==NULL) {
            ?>
            <td>Belum Diinput</td>
            <?php
            } else {
            ?>
            <td><?=$list['jasa_ekspedisi']?></td>
            <?php
            }
            ?>
            <?php
            if($list['no_resi']==NULL) {
            ?>
            <td><a href="?module=pengiriman&&method=resi&id=<?=$list['id_kirim']?>" class="btn btn-sm btn-primary">Input Nomor Resi</a></td>
            <?php
            } else {
            ?>
            <td><a href="http://cekresi.com" target="_blank"><?=$list['no_resi']?></a></td>
            <?php
            }
            ?>
            <td><?=$list['status_kirim']?></td>
            <td align="center">
                <div class="btn-group">                 
                    <a href="?module=lelang-ongoing&&method=info-bidder&id=<?=$list['id_barang']?>" class="btn btn-sm btn-primary">Info Bidder</a> &nbsp;
                    <a href="modul/mod_invoice/cetak_invoice.php" target="_blank" class="btn btn-sm btn-success">Invoice</a> &nbsp;                    
                </div>
            </td>
        </tr>  
        <?php

        }
    ?>
    </tbody>
</table>
</div>
<!-- /.card-body -->
</div>