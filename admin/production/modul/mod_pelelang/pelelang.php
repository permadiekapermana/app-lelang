<div class="card">
<div class="card-header">
    <h3 class="card-title">Data Pelelang</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
<table id="example2" class="table table-bordered table-hover">
    <!-- <a href="?module=pelelang&&method=add"><button class="btn btn-primary">Tambah</button></a> -->
    <thead>
    <tr>
    <th>No.</th>
    <th>Nama</th>
    <th>Email</th>
    <th>No. HP</th>
    <th>Alamat</th>
    <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $qry = "SELECT * FROM users WHERE role = 'pelelang' order by id_user desc";
        $execute = mysqli_query($koneksi,$qry); 
        $no = 1;
        while($list = mysqli_fetch_array($execute)){
        ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$list['nama']?></td>
            <td><?=$list['email']?></td>
            <td><?=$list['no_hp']?></td>
            <td><?=$list['alamat']?></td>
            <td align="center">
                <div class="btn-group">
                    <!-- <a href="?module=admin&&method=edit&id=<?=$list['id_user']?>" class="btn btn-sm btn-primary">Edit</a> &nbsp;
                    <a href="modul/mod_admin/action.php?act=delete&&id=<?=$list['id_user']?>" class="btn btn-sm btn-danger" onClick="return confirm('Yakin ingin hapus data ? Data yang dihapus tidak dapat dipulihkan !')">Hapus</a> -->
                    <a href="?module=pelelang&&method=detail&id=<?=$list['id_user']?>" class="btn btn-sm btn-success">Detail</a>
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