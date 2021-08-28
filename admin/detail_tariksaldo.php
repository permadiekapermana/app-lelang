<?php
include "includes/koneksi.php"

  ?>
<?php  include "includes/header.php";?>
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
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tarik Saldo</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Saldo</li>
              <li class="breadcrumb-item active" aria-current="page">Tarik</li>
            </ol>
          </div>

          <!-- Row -->
          <?php


$id = $_GET['id'];
$query = "SELECT * FROM tarik_saldo
INNER JOIN users ON tarik_saldo.id_user=users.id_user INNER JOIN rekening ON tarik_saldo.id_rekening=rekening.id_rekening  WHERE id_tariksaldo = '$id'";
$execute = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($execute);

?>
<div class="card card-info">
<div class="card-header bg-primary text-white">
    <h3 class=" text-white-100 big ">Konfirmasi Tarik Saldo</h3>
</div>
<!-- /.card-header -->
<div class="card card-info">
<div class="card-body">

<div class="table align-items-center table-flush">
    <table class='table table-striped'>
    <div class="card-body">
                <form method="POST" action="action_konfirmasitariksaldo.php" enctype="multipart/form-data">
                <div class="form-group">
        <label for="nama_barang">Nama User</label>
        <input type="hidden" class="form-control" name="id_tariksaldo" id="nama_barang" value="<?= $data['id_tariksaldo'] ?>" placeholder="Masukkan Nama Barang" required>
        <input type="text" class="form-control" name="nama" id="nama_barang" value="<?= $data['nama'] ?>" placeholder="Masukkan Nama Barang" readonly required>
    </div>
    <div class="form-group">
        <label for="nama_barang">Jumlah Tarik Saldo</label>
        
        <input type="text" class="form-control" name="nama" id="nama_barang" value="<?= "Rp. ".number_format($data['nominal']). " ,-";?>" placeholder="Masukkan Nama Barang" readonly required>
    </div>
                <div class='form-group'>
        <label for='id_kategori'>Status</label>
        <select name='status_tarik' id='id_kategori' class='form-control' required>
            <option value='' selected>-- Pilih Status --</option>
            <option value='Konfirmasi' selected>Konfirmasi</option>
            <option value='Tolak' selected>Tolak</option>
        </select> 
    </div>
   
    <div class="form-group">
        <label for="barang">Bukti Transfer</label>
        <input type="file" class="form-control" name="bukti" id="barang" required>
        <p class="help-block">*Format JPG/PNG.</p>
    </div>
                   
                  
                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                  </form>
                </div>
              </div>
    </table>
   
</div>
</div>
</div>
<!-- /.card-body -->
</div>
      </div>
      <br>
      <!-- Footer -->
     <?php include "includes/footer.php"?>
       <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

     </body>
</html>