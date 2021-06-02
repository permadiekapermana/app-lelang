<div class="card">
<div class="card-header">
    <h3 class="card-title">Saldo</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
<table id="example2" class="table table-bordered table-hover">
    <?php
        if($_SESSION['role']=='pelelang'){
    ?>
    <a href="modul/mod_saldo/action.php?act=withdraw&&id=<?=$_SESSION['id_user']?>"><button class="btn btn-primary">Tarik Saldo</button></a>
    <?php
        }
    ?>
    <thead>
    <tr>
    <th>No.</th>
    <th>ID User</th>
    <th>Nominal</th>
    <th>Status</th>
    <th>Jenis</th>
    <th>Bukti Transfer</th>
    <?php
        if($_SESSION['role']=='admin'){
    ?>
    <th>Aksi</th>
    <?php
        }
    ?>
    </tr>
    </thead>
    <tbody>
    <?php
        if($_SESSION['role']=='pelelang'){
        $qry = "SELECT * FROM riwayat_saldo WHERE id_user='$_SESSION[id_user]' ORDER BY id_riwayatsaldo DESC";
        } else {
            $qry = "SELECT * FROM riwayat_saldo ORDER BY id_riwayatsaldo DESC";
        }
        $execute = mysqli_query($koneksi,$qry); 
        $no = 1;
        while($list = mysqli_fetch_array($execute)){
        ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$list['id_user']?></td>
            <td><?=$list['nominal']?></td>
            <td><?=$list['status']?></td>
            <td><?=$list['jenis']?></td>
            <?php
            if($list['bukti_transfer']==NULL) {
            ?>
            <td>Belum Ada</td>
            <?php
            } else {
            ?>
            <td><?=$list['bukti_transfer']?></td>
            <?php
            }
            ?>
            <?php
            if($_SESSION['role']=='admin'){
            
            if($list['bukti_transfer']==NULL) {
            ?>
            <td><a href="?module=saldo&&method=add&id=<?=$list['id_riwayatsaldo']?>" class="btn btn-sm btn-primary">Input Bukti Transfer</a></td>
            <?php
            } else {
            ?>
            <td>Selesai</td>
            <?php
            }
        }
            ?>
        </tr>  
        <?php

        }
    ?>
    </tbody>
</table>
</div>
<!-- /.card-body -->
</div>