<?php
  include "includes/koneksi.php";

  ?>

  
<?php
  include "includes/header.php";

  ?>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php
  include "includes/sidebar.php";

  ?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
       <?php include "includes/topbar.php" ?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <!-- Row -->
        
             <!-- Container Fluid-->
             <?php
$post = "action_barang.php?act=add";
?>
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Barang</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Barang</li>
              <li class="breadcrumb-item active" aria-current="page">Tamnbah Data</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Data Barang</h6>
                </div>
                <div class="card-body">
                <form method="POST" action="<?= $post ?>" enctype="multipart/form-data">
                <div class="form-group">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Masukkan Nama Barang" required>
    </div>
                <div class='form-group'>
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
    <div class="form-group">
        <label for="tgl_buka">Tanggal Buka</label>
        <input type="date" class="form-control" name="tgl_buka" id="tgl_buka" required>
    </div>
    <div class="form-group">
        <label for="tgl_tutup">Tanggal Tutup</label>
        <input type="date" class="form-control" name="tgl_tutup" id="tgl_tutup" required>
    </div>
    <div class="form-group">
        <label for="harga_buka">Harga Buka</label>
        <input type="number" class="form-control" name="harga_buka" id="harga_buka" placeholder="Masukkan Harga Buka" required>
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan" required></textarea>
    </div>
    <div class="form-group">
        <label for="barang">Foto Barang</label>
        <input type="file" class="form-control" name="barang" id="barang" required>
        <p class="help-block">*Format JPG/PNG.</p>
    </div>
                   
                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>

              <!-- Form Sizing -->
              
            </div>

           
          </div>
          <!--Row-->

         
        <!---Container Fluid-->
          <!--Row-->
        <!---Container Fluid-->
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
      <!-- Footer -->
     <?php include "includes/footer.php"?>

     </body>
</html>