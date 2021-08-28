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
            <h1 class="h3 mb-0 text-gray-800">Data Lelang</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Lelang</li>
              <li class="breadcrumb-item active" aria-current="page">Data Lelang</li>
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
    <th>Nama Barang</th>
    <th>Kategori</th>
    <th>Tanggal Buka</th>
    <th>Tanggal Tutup</th>
    <th>Harga Buka</th>
    <th>Status</th>
    <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php
        if($_SESSION['role']=='pelelang'){
        $qry = "SELECT * FROM barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori WHERE id_user='$_SESSION[id_user]' AND status='open' order by tgl_buka DESC";
        } else {
            $qry = "SELECT * FROM barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori WHERE status='open' order by tgl_buka DESC";
        }
        $execute = mysqli_query($koneksi,$qry); 
        $no = 1;
        while($list = mysqli_fetch_array($execute)){
        ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$list['nama_barang']?></td>
            <td><?=$list['kategori']?></td>
            <td><?=$list['tgl_buka']?></td>
            <td><?=$list['tgl_tutup']?></td>
            <td><?=$list['harga_buka']?></td>
            <td><?=$list['status']?></td>
            <td align="center">
                <div class="btn-group">
                    <?php
                    $date = date('Y-m-d');
                    if ($date>=$list['tgl_tutup']) {
                    ?>
                    <?php
                    if($_SESSION['role']=='pelelang'){
                    ?>
                    <a href="action_lelang.php?&id=<?=$list['id_barang']?>&act=win" class="btn btn-sm btn-success" onClick="return confirm('Apakah anda yakin ingin mengakhiri lelang dan menentukan pemenang lelang ?')">Tentukan Pemenang</a> &nbsp;
                    <?php
                    }
                    ?>
                    <?php
                    }
                    ?>                    
                    <a href="data_lelang_berjalan.php?id=<?=$list['id_barang']?>" class="btn btn-sm btn-primary">Info Bidder</a> &nbsp;
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