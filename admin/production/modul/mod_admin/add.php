<?php
$post = "modul/mod_admin/action.php?act=add";
?>
<div class="card card-primary">
<div class="card-header">
    <h3 class="card-title">Tambah Data Admin</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
<form method="POST" action="<?= $post ?>" enctype="multipart/form-data">
<div class="card-body">
    <div class="form-group col-6">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
    </div>
    <div class="form-group col-6">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
    </div>
    <div class="form-group col-6">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email">
    </div>
    <div class="form-group col-6">
        <label for="no_hp">Nomor HP</label>
        <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan Nomor HP">
    </div>
    <div class="form-group col-6">
        <label for="alamat">Alamat</label>
        <textarea type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat"></textarea>
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