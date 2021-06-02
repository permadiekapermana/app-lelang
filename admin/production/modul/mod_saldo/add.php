<?php
$post = "modul/mod_saldo/action.php?act=add";
?>
<div class="card card-primary">
<div class="card-header">
    <h3 class="card-title">Upload Bukti Transfer</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
<form method="POST" action="<?= $post ?>" enctype="multipart/form-data">
<div class="card-body">
    <h3>Transfer Ke Nomor Rekening Berikut</h3> <br>
    <?php
        // get id user
        $sql = mysqli_query($koneksi, "SELECT * FROM riwayat_saldo WHERE id_riwayatsaldo = '$_GET[id]'");
        $r=mysqli_fetch_array($sql);

        // get user + rekening
        $sql2 = mysqli_query($koneksi, "SELECT * FROM rekening INNER JOIN users ON rekening.id_user=users.id_user WHERE rekening.id_user = '$r[id_user]'");
        $r2=mysqli_fetch_array($sql2);
    ?>
    <div class="form-group col-6">
        <label for="nama_barang">Nama</label>
        <input type="hidden" value="<?=$_GET['id']?>" name="id">
        <h5><?=$r2['nama']?></h5>
    </div>
    <div class="form-group col-6">
        <label for="nama_barang">Nomor Rekening</label>
        <h5><?=$r2['norek']?></h5>
    </div>
    <div class="form-group col-6">
        <label for="nama_barang">Bank</label>
        <h5><?=$r2['bank']?></h5>
    </div>
    <div class="form-group col-6">
        <label for="barang">Bukti Transfer</label>
        <input type="file" class="form-control" name="barang" id="barang" required>
        <p class="help-block">*Format JPG/PNG.</p>
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button class='btn btn-secondary' type='button' onclick=self.history.back()>Cancel</button>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
<!-- /.card-body -->
</div>