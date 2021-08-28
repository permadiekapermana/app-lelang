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
$post = "action_resi.php?act=resi";
?>
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Resi</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Resi</li>
              <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Resi</h6>
                </div>
                <div class="card-body">
                <form method="POST" action="<?= $post ?>" enctype="multipart/form-data">
                  
                 
                     
                <div class="form-group">
        <label for="jasa_ekspedisi">Jasa Ekspedisi</label>
        <input type="hidden" class="form-control" name="id" id="id" value="<?=$_GET['id']?>">
        <input type="text" class="form-control" name="jasa_ekspedisi" id="jasa_ekspedisi" placeholder="Masukkan Jasa Ekspedisi">
        <label for="no_resi">Nomor Resi</label>
        <input type="text" class="form-control" name="no_resi" id="no_resi" placeholder="Masukkan Nomor Resi">
    </div>
                    
                   
                  <br>
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