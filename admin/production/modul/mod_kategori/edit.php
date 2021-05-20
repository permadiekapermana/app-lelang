<?php
$post = "modul/mod_kategori/action.php?act=update";

$id = $_GET['id'];
$query = "SELECT * FROM kategori WHERE id_kategori = '$id'";
$execute = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($execute);
?>
<div class="card card-success">
<div class="card-header">
    <h3 class="card-title">Edit Data Kategori</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
<form method="POST" action="<?= $post ?>" enctype="multipart/form-data">
<div class="card-body">
    <div class="form-group col-6">
        <label for="kategori">Kategori</label>
        <input type="text" class="form-control" name="kategori" id="kategori" value="<?= $data['kategori'] ?>" placeholder="Masukkan Kategori">
        <input type="hidden" class="form-control" name="id" id="id" value="<?= $_GET['id'] ?>">
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