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
            <h1 class="h3 mb-0 text-gray-800">Data Pelelang</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Pelelang</li>
              <li class="breadcrumb-item active" aria-current="page">Data Pelelang</li>
            </ol>
          </div>

          <!-- Row -->
          <?php
$post = "modul/mod_admin/action.php?act=update";

$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id_user = '$id'";
$execute = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($execute);
$query2 = "SELECT * FROM rekening WHERE id_user = '$id'";
$execute2 = mysqli_query($koneksi,$query2);
$data2 = mysqli_fetch_array($execute2);
?>
<div class="card card-info">
<div class="card-header bg-primary text-white">
    <h3 class=" text-white-100 big ">Info Data Pelelang</h3>
</div>
<!-- /.card-header -->
<div class="card card-info">
<div class="card-body">
<form method="POST" action="<?= $post ?>" enctype="multipart/form-data">
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
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button class='btn btn-secondary' type='button' onclick=self.history.back()>Kembali</button>
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