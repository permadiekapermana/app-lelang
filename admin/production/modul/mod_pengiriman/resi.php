<?php
$post = "modul/mod_pengiriman/action.php?act=resi";
?>
<div class="card card-primary">
<div class="card-header">
    <h3 class="card-title">Input Nomor Resi</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
<form method="POST" action="<?= $post ?>" enctype="multipart/form-data">
<div class="card-body">
    <div class="form-group col-6">
        <label for="jasa_ekspedisi">Jasa Ekspedisi</label>
        <input type="text" class="form-control" name="jasa_ekspedisi" id="jasa_ekspedisi" placeholder="Masukkan Jasa Ekspedisi">
        <input type="hidden" class="form-control" name="id" id="id" value="<?=$_GET['id']?>">
        <label for="no_resi">Nomor Resi</label>
        <input type="text" class="form-control" name="no_resi" id="no_resi" placeholder="Masukkan Nomor Resi">
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