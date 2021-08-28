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
            <h1 class="h3 mb-0 text-gray-800">Data Pelelang Dan Saldo</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Pelelang</li>
              <li class="breadcrumb-item active" aria-current="page">Data Pelelang Dan Saldo</li>
            </ol>
          </div>

          <!-- Row -->
          <?php


$id = $_SESSION['id_user'];
$query = "SELECT * FROM users WHERE id_user = '$id'";
$execute = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($execute);
$query2 = "SELECT * FROM rekening WHERE id_user = '$id'";
$execute2 = mysqli_query($koneksi,$query2);
$data2 = mysqli_fetch_array($execute2);
$query3 = "SELECT * FROM detail_member WHERE id_user = '$id'";
$execute3 = mysqli_query($koneksi,$query3);
$data3 = mysqli_fetch_array($execute3);
$query4 = "SELECT * FROM tarik_saldo WHERE id_user = '$id'";
$execute4 = mysqli_query($koneksi,$query4);
$data4 = mysqli_fetch_array($execute4);
?>
<div class="card card-info">
<div class="card-header bg-primary text-white">
    <h3 class=" text-white-100 big ">Info Data Member</h3>
</div>
<!-- /.card-header -->
<div class="card card-info">
<div class="card-body">

<div class="table align-items-center table-flush">
    <h3>A. Data Pribadi</h3>
    <table class='table table-striped'>
        <tr>
            <th width="20%">Nama</th>
            <td width="1%">:</td>
            <td><?= $data['nama'] ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td>:</td>
            <td><?= $data['email'] ?></td>
        </tr>
        <tr>
            <th>Nomor HP</th>
            <td>:</td>
            <td><?= $data['no_hp'] ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>:</td>
            <td><?= $data['alamat'] ?></td>
        </tr>
    </table>
    <h3 class="mt-3">B. Data Rekening</h3>
    <table class='table table-striped'>
        <tr>
            <th width="20%">Bank</th>
            <td width="1%">:</td>
            <td><?= $data2['bank'] ?></td>
        </tr>
        <tr>
            <th>Nomor Rekening</th>
            <td>:</td>
            <td><?= $data2['norek'] ?></td>
        </tr>
    </table>
    <h3 class="mt-3">C. Data Saldo</h3>
    <table class='table table-striped'>
        <tr>
            <th width="20%">Jumlah Saldo</th>
            <td width="1%">:</td>
            <?php
            if($data3['saldo']=='0' AND $_SESSION['role']=='pelelang') {
            ?>
            <td><span class="badge badge-danger right"><?= $data4['status_tarik'] ?></span></td> <br>
            <td><img src="../img/<?=$data4['bukti']?>" class="rounded" width="30px"></td>
           
            <?php
            } else {
            ?>
            <td><?= "Rp. ".number_format($data3['saldo']). " ,-";?></td>
            <?php
            }
            ?>
             
        </tr>
        
        
    </table>
</div>
<!-- /.card-body -->

<div class="card-footer">
<form method="POST" action="action_tariksaldo.php" enctype="multipart/form-data">
                  
                  <div class="form-group">
                   
                    
                   <input type="hidden" class="form-control" name="id_detailmember" id="kategori" value="<?= $data3['id_detailmember'] ?>" placeholder="Masukkan Kategori">
                   <input type="hidden" class="form-control" name="id_user" id="kategori" value="<?= $data['id_user'] ?>" placeholder="Masukkan Kategori">
                   <input type="hidden" class="form-control" name="nominal" id="kategori" value="<?= $data3['saldo'] ?>" placeholder="Masukkan Kategori">
                   <input type="hidden" class="form-control" name="id_rekening" id="kategori" value="<?= $data2['id_rekening'] ?>" placeholder="Masukkan Kategori">
                  </div>
                 
                
                  <button type="submit" class="btn btn-primary">Tarik Saldo</button>
                </form>
</div>
</div>
</div>
<!-- /.card-body -->
</div>
      </div>
      <br>
      <br>
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