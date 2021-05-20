<?php
$post = "modul/mod_kategori/action.php?act=add";
?>
<div class="card card-primary">
<div class="card-header">
    <h3 class="card-title">Tambah Data Kategori</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
<form method="POST" action="<?= $post ?>" enctype="multipart/form-data">
<div class="card-body">
    <div class="form-group col-6">
        <label for="kategori">Kategori</label>
        <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Masukkan Kategori">
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