<div class="card">
<div class="card-header">
    <h3 class="card-title">Data Barang</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
<table id="example2" class="table table-bordered table-hover">
    <a href="?module=barang&&method=add"><button class="btn btn-primary">Tambah</button></a>
    <thead>
    <tr>
    <th>No.</th>
    <th>Nama Barang</th>
    <th>Kategori</th>
    <th>Tanggal Buka</th>
    <th>Tanggal Tutup</th>
    <th>Harga Buka</th>
    <th>Status</th>
    <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $qry = "SELECT * FROM barang
        INNER JOIN kategori ON barang.id_kategori=kategori.id_kategori WHERE id_user='$_SESSION[id_user]' order by id_barang desc";
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
            <td><?=$list['harga_buka']?></td>
            <td><?=$list['status']?></td>
            <td align="center">
                <div class="btn-group">
                    <a href="?module=barang&&method=edit&id=<?=$list['id_barang']?>" class="btn btn-sm btn-primary">Edit</a> &nbsp;
                    <a href="modul/mod_barang/action.php?act=delete&&id=<?=$list['id_barang']?>" class="btn btn-sm btn-danger" onClick="return confirm('Yakin ingin hapus data ? Data yang dihapus tidak dapat dipulihkan !')">Hapus</a>
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