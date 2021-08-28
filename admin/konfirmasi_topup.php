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

$id = $_GET['id'];
$query = "SELECT * FROM riwayat_saldo
INNER JOIN users ON riwayat_saldo.id_user=users.id_user WHERE id_saldo = '$id'";
$execute = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($execute);
?>
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Top Up Konfirmasi</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Saldo</li>
              <li class="breadcrumb-item active" aria-current="page">Konfirmasi</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Konfirmasi Top Up</h6>
                </div>
                <div class="card-body">
                <form method="POST" action="action_saldos.php" enctype="multipart/form-data">
                  
                 
                     
                <div class="form-group ">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" value="<?= $data['nama'] ?>" placeholder="Masukkan Nama" readonly>
        <input type="hidden" class="form-control" name="id_saldo" id="id" value="<?= $_GET['id'] ?>">
    </div>
    <div class="form-group ">
        <label for="email">Pembelian Saldo</label>
        <input type="email" class="form-control" name="nominal" value="<?= $data['nominal'] ?>" id="nominal" placeholder="Masukkan Email" readonly>
    </div>
    <div class="form-group ">
        
        <input type="hidden" class="form-control" name="id_user" value="<?= $data['id_user'] ?>" id="id_user" placeholder="Masukkan Nomor HP">
    </div>
    <div class="form-group ">
        <label for="alamat">Order Id</label>
        <input type="text" class="form-control" name="order_id" id="order_id" placeholder="Masukkan order_id" value="<?= $data['order_id'] ?>" readonly>
        <input type="hidden" class="form-control" name="status" id="status" placeholder="Masukkan status" value="konfirmasi">
    </div>
                    
                   
                  
                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
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