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
$post = "action_kategori.php?act=add";
?>
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Kategori</li>
              <li class="breadcrumb-item active" aria-current="page">Tamnbah Data</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kategori</h6>
                </div>
                <div class="card-body">
                <form method="POST" action="<?= $post ?>" enctype="multipart/form-data">
                  
                    <div class="form-group">
                     
                      <label for="kategori">Kategori</label>
                     <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Masukkan Kategori">
                     
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
      <br>
      <br>
      <br>
      <br>
      <br>
      <!-- Footer -->
     <?php include "includes/footer.php"?>

     </body>
</html>