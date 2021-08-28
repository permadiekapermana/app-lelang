<?php if($_SESSION['role'] == 'admin'){?>
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">Aplikasi Lelang</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Menu
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Data User</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data User</h6>
            <a class="collapse-item" href="admin_dataadmin.php">Admin</a>
            <a class="collapse-item" href="admin_view_pelelang.php">Pelelang</a>
            <a class="collapse-item" href="admin_view_member.php">Member</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_kategori.php">
          <i class="fas fa-fw fa-palette"></i>
          <span>Data Kategori</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fas fa-shopping-cart"></i>
          <span>Transaksi Lelang</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Transaksi Lelang</h6>
            <a class="collapse-item" href="data_lelang.php">Lelang Berlangsung
            <?php
            $qry = "SELECT * FROM barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori WHERE status='open' order by tgl_buka DESC";
            $execute = mysqli_query($koneksi,$qry);
            $sum_lelangongoing = mysqli_num_rows($execute);
            ?>
            <span class="badge badge-info right"><?= $sum_lelangongoing ?></span>
            </a>
            <a class="collapse-item" href="pengiriman_barang.php">Pengiriman Barang
            <?php
            $qry2 = "SELECT * FROM kirim_barang INNER JOIN lelang ON kirim_barang.id_lelang=lelang.id_lelang INNER JOIN users ON lelang.id_user=users.id_user INNER JOIN barang ON lelang.id_barang=barang.id_barang WHERE (status_kirim='Menunggu Pengiriman' OR status_kirim='Dalam Pengiriman')";
            $execute2 = mysqli_query($koneksi,$qry2);
            $sum_kirim = mysqli_num_rows($execute2);
            ?>
            <span class="badge badge-info right"><?= $sum_kirim ?></span>
            </a>
            <a class="collapse-item" href="pengiriman_selesai.php">Lelang Selesai
            <?php
            $qry3 = "SELECT * FROM kirim_barang INNER JOIN lelang ON kirim_barang.id_lelang=lelang.id_lelang INNER JOIN users ON lelang.id_user=users.id_user INNER JOIN barang ON lelang.id_barang=barang.id_barang WHERE (status_kirim='Selesai')";
            $execute3 = mysqli_query($koneksi,$qry3);
            $sum_selesai = mysqli_num_rows($execute3);
            ?>
            <span class="badge badge-info right"><?= $sum_selesai ?></span>
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Saldo</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Saldo</h6>
            <a class="collapse-item" href="saldo.php">Pembelian Saldo</a>
            <a class="collapse-item" href="tariksaldo_user.php">Tarik Saldo User</a>
          </div>
        </div>
      </li>
      
      
    </ul>
    <?php } else { ?>
      <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">Aplikasi Lelang</div>
      </a>
      <hr class="sidebar-divider my-0">
      
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Menu Pelelang
      </div>
      <li class="nav-item">
        <a class="nav-link" href="pelelang_barang.php">
          <i class="fas fa-fw fa-palette"></i>
          <span>Data Barang</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fas fa-shopping-cart"></i>
          <span>Transaksi Lelang</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Transaksi Lelang</h6>
            <a class="collapse-item" href="data_lelang.php">Lelang Berlangsung
            <?php
            $qry = "SELECT * FROM barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori WHERE status='open' order by tgl_buka DESC";
            $execute = mysqli_query($koneksi,$qry);
            $sum_lelangongoing = mysqli_num_rows($execute);
            ?>
            <span class="badge badge-info right"><?= $sum_lelangongoing ?></span>
            </a>
            <a class="collapse-item" href="pengiriman_barang.php">Pengiriman Barang
            <?php
            $qry2 = "SELECT * FROM kirim_barang INNER JOIN lelang ON kirim_barang.id_lelang=lelang.id_lelang INNER JOIN users ON lelang.id_user=users.id_user INNER JOIN barang ON lelang.id_barang=barang.id_barang WHERE (status_kirim='Menunggu Pengiriman' OR status_kirim='Dalam Pengiriman')";
            $execute2 = mysqli_query($koneksi,$qry2);
            $sum_kirim = mysqli_num_rows($execute2);
            ?>
            <span class="badge badge-info right"><?= $sum_kirim ?></span>
            </a>
            <a class="collapse-item" href="pengiriman_selesai.php">Lelang Selesai
            <?php
            $qry3 = "SELECT * FROM kirim_barang INNER JOIN lelang ON kirim_barang.id_lelang=lelang.id_lelang INNER JOIN users ON lelang.id_user=users.id_user INNER JOIN barang ON lelang.id_barang=barang.id_barang WHERE (status_kirim='Selesai')";
            $execute3 = mysqli_query($koneksi,$qry3);
            $sum_selesai = mysqli_num_rows($execute3);
            ?>
            <span class="badge badge-info right"><?= $sum_selesai ?></span>
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Saldo</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Saldo</h6>
            <a class="collapse-item" href="tarik_saldo.php"> Saldo</a>
          </div>
        </div>
      </li>
      
      
    </ul>
    <?php }  ?>