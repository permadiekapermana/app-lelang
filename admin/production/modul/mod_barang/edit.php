<?php
$post = "modul/mod_barang/action.php?act=update";

$id = $_GET['id'];
$query = "SELECT * FROM barang
INNER JOIN kategori ON barang.id_kategori=kategori.id_kategori WHERE id_barang = '$id'";
$execute = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($execute);
?>
<div class="card card-success">
<div class="card-header">
    <h3 class="card-title">Edit Data Barang</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
<form method="POST" action="<?= $post ?>" enctype="multipart/form-data">
<div class="card-body">
    <div class="form-group col-6">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="<?= $data['nama_barang'] ?>" placeholder="Masukkan Nama Barang">
        <input type="hidden" class="form-control" name="id" id="id" value="<?= $_GET['id'] ?>">
    </div>
    <div class='form-group col-6'>
        <label for='id_kategori'>Nama Kategori</label>
        <select name='id_kategori' id='id_kategori' class='form-control' required>
            <option value='' selected>-- Pilih Kategori --</option>
            <?php
            $query = "SELECT * FROM kategori ORDER BY id_kategori";
            $execute = mysqli_query($koneksi,$query);
            if ($data['kategori']==''){
            echo "<option value='' selected>-- Pilih Kategori --</option>";
            }   

            while($w = mysqli_fetch_array($execute)){
            if ($data['kategori']==$w['kategori']){
            echo "<option value=$w[id_kategori] selected>$w[kategori]</option>";
            }
            else{
            echo "<option value=$w[id_kategori]>$w[kategori]</option>";
            }
            }
            ?>
        </select> 
    </div>
    <div class="form-group col-6">
        <label for="tgl_buka">Tanggal Buka</label>
        <input type="date" class="form-control" value="<?= $data['tgl_buka'] ?>" name="tgl_buka" id="tgl_buka" required>
    </div>
    <div class="form-group col-6">
        <label for="tgl_tutup">Tanggal Tutup</label>
        <input type="date" class="form-control" name="tgl_tutup" value="<?= $data['tgl_tutup'] ?>" id="tgl_tutup" required>
    </div>
    <div class="form-group col-6">
        <label for="harga_buka">Harga Buka</label>
        <input type="number" class="form-control" name="harga_buka" value="<?= $data['harga_buka'] ?>" id="harga_buka" placeholder="Masukkan Harga Buka" required>
    </div>
    <div class="form-group col-6">
        <label for="keterangan">Keterangan</label>
        <textarea type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan"><?= $data['keterangan'] ?></textarea>
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