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
            <h1 class="h3 mb-0 text-gray-800">Data Tarik Saldo</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Saldo</li>
              <li class="breadcrumb-item active" aria-current="page">Data Tarik Saldo</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No.</th>
                        <th>Nama </th>
                        <th>Role</th>
                        <th>Bank</th>
                        <th>Norek</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                    <?php
        $qry = "SELECT * FROM tarik_saldo
        INNER JOIN users ON tarik_saldo.id_user=users.id_user INNER JOIN rekening ON tarik_saldo.id_rekening=rekening.id_rekening  order by id_tariksaldo desc";
        $execute = mysqli_query($koneksi,$qry); 
        $no = 1;
        while($list = mysqli_fetch_array($execute)){
        ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$list['nama']?></td>
            <td><?=$list['role']?></td>
            <td><?=$list['bank']?></td>
            <td><?=$list['norek']?></td>
            <td><?=$list['nominal']?></td>
            <td><?=$list['status_tarik']?></td>
            <td align="center">
                <div class="btn-group">
                    <a href="detail_tariksaldo.php?id=<?=$list['id_tariksaldo']?>" class="btn btn-sm btn-primary">Detail</a> &nbsp;
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