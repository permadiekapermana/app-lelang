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
$post = "action_admin.php?act=add";
?>
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Admin</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Data Admin</h6>
                </div>
                <div class="card-body">
                <form method="POST" action="<?= $post ?>" enctype="multipart/form-data">
                  
                 
                     
                    <div class="form-group ">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
    </div>
    <div class="form-group ">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
    </div>
    <div class="form-group ">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email">
    </div>
    <div class="form-group ">
        <label for="no_hp">Nomor HP</label>
        <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan Nomor HP">
    </div>
    <div class="form-group ">
        <label for="alamat">Alamat</label>
        <textarea type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat"></textarea>
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
      
      <!-- Footer -->
     <?php include "includes/footer.php"?>

     </body>
</html>