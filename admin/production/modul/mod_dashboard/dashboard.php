<div class="card-header">
    <h3 class="card-title">Dashboard</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
    <div class="row">
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
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
            <h3><?=$sum_barang?></h3>

            <p>Jumlah Total Barang</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="?module=barang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
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
                <h3><?= $sum_lelangongoing ?></h3>

                <p>Lelang Berlangsung</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="?module=lelang-ongoing" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
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
                <h3><?= $sum_kirim ?></h3>

                <p>Pengiriman Barang</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="?module=pengiriman" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
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
                <h3><?= $sum_selesai ?></h3>

                <p>Lelang Selesai</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="?module=pengiriman-selesai" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
    </div>
</div>
<!-- /.card-body -->
