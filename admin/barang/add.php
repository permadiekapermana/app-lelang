<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="barang/act.php?act=add" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="nama">Nama Barang</label>
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Input Nama Barang" required>
                </div>
                <div class="form-group">
                  <label for="kategori">Kategori Barang</label>
                  <select name="kategori" class="form-control" id="kategori" required>
                   <option disabled selected>--Pilih Kategori--</option>
                   <option value="motor">Motor</option>
                   <option value="mobil">Mobil</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="keterangan" class="textarea" placeholder="Keterangan"
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
                <div class="form-group">
                  <label for="tgl_tutup">Tanggal Tutup</label>
                  <input type="date" name="tgl_tutup" class="form-control" id="tgl_tutup" required>
                </div>
                <div class="form-group">
                  <label for="harga_buka">Harga Buka</label>
                  <input type="text" name="harga_buka" class="form-control" id="harga_buka" placeholder="Input Harga" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Input Gambar</label>
                  <input type="file" name="barang" id="exampleInputFile" required>
                  <p class="help-block">*Format JPG/PNG.</p>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
        </div>
    </div>
</div>