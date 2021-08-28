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
            <h1 class="h3 mb-0 text-gray-800">Data Member</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Member</li>
              <li class="breadcrumb-item active" aria-current="page">Data Member</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <!-- <a href="admin_add_kategori.php"><button type="button" class="btn btn-outline-primary mb-1">Tambah Data</button></a>-->
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                    <tr>
    <th>No.</th>
    <th>Nama</th>
    <th>Email</th>
    <th>No. HP</th>
    <th>Alamat</th>
    <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $qry = "SELECT * FROM users WHERE role = 'member' order by id_user desc";
        $execute = mysqli_query($koneksi,$qry); 
        $no = 1;
        while($list = mysqli_fetch_array($execute)){
        ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$list['nama']?></td>
            <td><?=$list['email']?></td>
            <td><?=$list['no_hp']?></td>
            <td><?=$list['alamat']?></td>
            <td align="center">
                <div class="btn-group">
                    <!-- <a href="?module=admin&&method=edit&id=<?=$list['id_user']?>" class="btn btn-sm btn-primary">Edit</a> &nbsp;
                    <a href="modul/mod_admin/action.php?act=delete&&id=<?=$list['id_user']?>" class="btn btn-sm btn-danger" onClick="return confirm('Yakin ingin hapus data ? Data yang dihapus tidak dapat dipulihkan !')">Hapus</a> -->
                    <a href="detail_member.php?id=<?=$list['id_user']?>" class="btn btn-sm btn-success">Detail</a>
                </div>
            </td>
        </tr>  
        <?php

        }
    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- DataTable with Hover -->
            
          </div>
          <!--Row-->
        <!---Container Fluid-->
      </div>
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