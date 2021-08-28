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
$post = "action_barang.php?act=update";

$id = $_GET['id'];
$query = "SELECT * FROM barang
INNER JOIN kategori ON barang.id_kategori=kategori.id_kategori WHERE id_barang = '$id'";
$execute = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($execute);
?>
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Admin</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Data Admin</h6>
                </div>
                <div class="card-body">
                <form method="POST" action="<?= $post ?>" enctype="multipart/form-data">
                  
                 
                     
                <div class="form-group">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="<?= $data['nama_barang'] ?>" placeholder="Masukkan Nama Barang">
        <input type="hidden" class="form-control" name="id" id="id" value="<?= $_GET['id'] ?>">
    </div>
    <div class='form-group'>
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
    <div class="form-group">
        <label for="tgl_buka">Tanggal Buka</label>
        <input type="date" class="form-control" value="<?= $data['tgl_buka'] ?>" name="tgl_buka" id="tgl_buka" required>
    </div>
    <div class="form-group">
        <label for="tgl_tutup">Tanggal Tutup</label>
        <input type="date" class="form-control" name="tgl_tutup" value="<?= $data['tgl_tutup'] ?>" id="tgl_tutup" required>
    </div>
    <div class="form-group">
        <label for="harga_buka">Harga Buka</label>
        <input type="number" class="form-control" name="harga_buka" value="<?= $data['harga_buka'] ?>" id="harga_buka" placeholder="Masukkan Harga Buka" required>
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan"><?= $data['keterangan'] ?></textarea>
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
      
      <!-- Footer -->
     <?php include "includes/footer.php"?>

     </body>
</html>