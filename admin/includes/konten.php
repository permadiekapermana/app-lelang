<br>
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Barang</div>
                      <?php
                      if($_SESSION['role']=='admin'){
              $qry4 = "SELECT * FROM barang";
              $execute4 = mysqli_query($koneksi,$qry4);
              $sum_barang = mysqli_num_rows($execute4);
            } else {
              $qry4 = "SELECT * FROM barang WHERE barang.id_user='$_SESSION[id_user]'";
              $execute4 = mysqli_query($koneksi,$qry4);
              $sum_barang = mysqli_num_rows($execute4);
            }
            ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$sum_barang?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Lelang Berlangsung</div>
                      <?php
              if($_SESSION['role']=='admin'){
                $qry = "SELECT * FROM barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori WHERE status='open' order by tgl_buka DESC";
                $execute = mysqli_query($koneksi,$qry);
                $sum_lelangongoing = mysqli_num_rows($execute);
              } else {
                $qry = "SELECT * FROM barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori WHERE id_user='$_SESSION[id_user]' AND status='open' order by tgl_buka DESC";
                $execute = mysqli_query($koneksi,$qry);
                $sum_lelangongoing = mysqli_num_rows($execute);
              }
              ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sum_lelangongoing ?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                      
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shopping-cart fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Barang Dikirim</div>
                      <?php
              if($_SESSION['role']=='admin'){
                $qry2 = "SELECT * FROM kirim_barang INNER JOIN lelang ON kirim_barang.id_lelang=lelang.id_lelang INNER JOIN users ON lelang.id_user=users.id_user INNER JOIN barang ON lelang.id_barang=barang.id_barang WHERE (status_kirim='Menunggu Pengiriman' OR status_kirim='Dalam Pengiriman')";
                $execute2 = mysqli_query($koneksi,$qry2);
                $sum_kirim = mysqli_num_rows($execute2);
              } else {
                $qry2 = "SELECT * FROM kirim_barang INNER JOIN lelang ON kirim_barang.id_lelang=lelang.id_lelang INNER JOIN users ON lelang.id_user=users.id_user INNER JOIN barang ON lelang.id_barang=barang.id_barang WHERE (status_kirim='Menunggu Pengiriman' OR status_kirim='Dalam Pengiriman') AND barang.id_user='$_SESSION[id_user]'";
                $execute2 = mysqli_query($koneksi,$qry2);
                $sum_kirim = mysqli_num_rows($execute2);
              }
              ?>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $sum_kirim ?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Lelang Selesai</div>
                      <?php
                      if($_SESSION['role']=='admin'){
                $qry3 = "SELECT * FROM kirim_barang INNER JOIN lelang ON kirim_barang.id_lelang=lelang.id_lelang INNER JOIN users ON lelang.id_user=users.id_user INNER JOIN barang ON lelang.id_barang=barang.id_barang WHERE (status_kirim='Selesai')";
                $execute3 = mysqli_query($koneksi,$qry3);
                $sum_selesai = mysqli_num_rows($execute3);
              } else {
                $qry3 = "SELECT * FROM kirim_barang INNER JOIN lelang ON kirim_barang.id_lelang=lelang.id_lelang INNER JOIN users ON lelang.id_user=users.id_user INNER JOIN barang ON lelang.id_barang=barang.id_barang WHERE (status_kirim='Selesai') AND barang.id_user='$_SESSION[id_user]'";
                $execute3 = mysqli_query($koneksi,$qry3);
                $sum_selesai = mysqli_num_rows($execute3);
              }
              ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sum_selesai ?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                       
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          

          <!-- Modal Logout -->
          

        </div>