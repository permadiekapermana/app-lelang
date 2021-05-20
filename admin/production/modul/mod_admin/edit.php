<?php
$post = "modul/mod_admin/action.php?act=update";

$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id_user = '$id'";
$execute = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($execute);
?>
<div class="card card-success">
<div class="card-header">
    <h3 class="card-title">Edit Data Admin</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
<form method="POST" action="<?= $post ?>" enctype="multipart/form-data">
<div class="card-body">
    <div class="form-group col-6">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" value="<?= $data['nama'] ?>" placeholder="Masukkan Nama">
        <input type="hidden" class="form-control" name="id" id="id" value="<?= $_GET['id'] ?>">
    </div>
    <div class="form-group col-6">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password (Kosongkan Jika tidak ingin diubah)">
    </div>
    <div class="form-group col-6">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="<?= $data['email'] ?>" id="email" placeholder="Masukkan Email">
    </div>
    <div class="form-group col-6">
        <label for="no_hp">Nomor HP</label>
        <input type="number" class="form-control" name="no_hp" value="<?= $data['no_hp'] ?>" id="no_hp" placeholder="Masukkan Nomor HP">
    </div>
    <div class="form-group col-6">
        <label for="alamat">Alamat</label>
        <textarea type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat"><?= $data['alamat'] ?></textarea>
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button class='btn btn-secondary' type='button' onclick=self.history.back()>Cancel</button>
    <button type="submit" class="btn btn-success">Submit</button>
</div>
</form>
</div>
<!-- /.card-body -->
</div>