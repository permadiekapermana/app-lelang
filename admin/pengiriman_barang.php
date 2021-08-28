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
            <h1 class="h3 mb-0 text-gray-800">Data Pengiriman Barang</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Pengiriman</li>
              <li class="breadcrumb-item active" aria-current="page">Data Pengiriman</li>
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
    <th>Jasa Ekspedisi</th>
    <th>Nomor Resi</th>
    <th>Status</th>
    <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php
        if($_SESSION['role']=='pelelang'){
        $qry = "SELECT * FROM kirim_barang INNER JOIN lelang ON kirim_barang.id_lelang=lelang.id_lelang INNER JOIN barang ON lelang.id_barang=barang.id_barang WHERE (status_kirim='Menunggu Pengiriman' OR status_kirim='Dalam Pengiriman') AND barang.id_user='$_SESSION[id_user]'";
        } else {
            $qry = "SELECT * FROM kirim_barang INNER JOIN lelang ON kirim_barang.id_lelang=lelang.id_lelang INNER JOIN barang ON lelang.id_barang=barang.id_barang WHERE (status_kirim='Menunggu Pengiriman' OR status_kirim='Dalam Pengiriman')";
        }
        $execute = mysqli_query($koneksi,$qry); 
        $no = 1;
        while($list = mysqli_fetch_array($execute)){
        ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$list['nama_barang']?></td>
            <?php
            if($list['jasa_ekspedisi']==NULL) {
            ?>
            <td>Belum Diinput</td>
            <?php
            } else {
            ?>
            <td><?=$list['jasa_ekspedisi']?></td>
            <?php
            }
            ?>
            <?php
            if($list['no_resi']==NULL AND $_SESSION['role']=='pelelang') {
            ?>
            <td><a href="data_resi.php?=resi&id=<?=$list['id_kirim']?>" class="btn btn-sm btn-primary">Input Nomor Resi</a></td>
            <?php
            } else {
            ?>
            <td><a href="http://cekresi.com" target="_blank"><?=$list['no_resi']?></a></td>
            <?php
            }
            ?>
            <td><?=$list['status_kirim']?></td>
            <td align="center">
                <div class="btn-group">                 
                    <a href="data_lelang_berjalan.php?&id=<?=$list['id_barang']?>" class="btn btn-sm btn-primary">Info Bidder</a> &nbsp;
                    <form action="mod_invoice/cetak_invoice.php" enctype='multipart/form-data' method="POST" target="_blank">
                        <input type="hidden" name="id" value="<?=$list['id_barang']?>">
                        <button type="submit" id="submit" name="submit" class="btn btn-sm btn-success">Invoice</button>
                    </form>
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