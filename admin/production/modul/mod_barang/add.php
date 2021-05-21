<?php
$post = "modul/mod_barang/action.php?act=add";
?>
<div class="card card-primary">
<div class="card-header">
    <h3 class="card-title">Tambah Data Barang</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
<form method="POST" action="<?= $post ?>" enctype="multipart/form-data">
<div class="card-body">
    <div class="form-group col-6">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Masukkan Nama Barang" required>
    </div>
    <div class='form-group col-6'>
        <label for='id_kategori'>Nama Kategori</label>
        <select name='id_kategori' id='id_kategori' class='form-control' required>
            <option value='' selected>-- Pilih Kategori --</option>
            <?php
            $query = "SELECT * FROM kategori ORDER BY id_kategori";
            $execute = mysqli_query($koneksi,$query);
            while($data = mysqli_fetch_array($execute)){
            ?>
            <option value="<?= $data['id_kategori'] ?>"><?= $data['kategori'] ?></option>
            <?php
            }
            ?>
        </select> 
    </div>
    <div class="form-group col-6">
        <label for="tgl_buka">Tanggal Buka</label>
        <input type="date" class="form-control" name="tgl_buka" id="tgl_buka" required>
    </div>
    <div class="form-group col-6">
        <label for="tgl_tutup">Tanggal Tutup</label>
        <input type="date" class="form-control" name="tgl_tutup" id="tgl_tutup" required>
    </div>
    <div class="form-group col-6">
        <label for="harga_buka">Harga Buka</label>
        <input type="number" class="form-control" name="harga_buka" id="harga_buka" placeholder="Masukkan Harga Buka" required>
    </div>
    <div class="form-group col-6">
        <label for="keterangan">Keterangan</label>
        <textarea type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan" required></textarea>
    </div>
    <div class="form-group col-6">
        <label for="barang">Foto Barang</label>
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