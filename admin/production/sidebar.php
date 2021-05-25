<?php if($_SESSION['role'] == 'admin'){?>
<!-- Sidebar Menu -->
<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
    <li class="nav-item">
    <a href="?module=dashboard" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
        Dashboard
        </p>
    </a>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
        Users
        <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="?module=admin&&method=" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Data Admin</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="?module=pelelang&&method=" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Data Pelelang</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="?module=member&&method=" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Data Member</p>
        </a>
        </li>
    </ul>
    </li>
    <li class="nav-item">
    <a href="?module=kategori&&method=" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
        Data Kategori
        </p>
    </a>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cart"></i>
        <p>
        Data Lelang
        <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="../index2.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Lelang Berlangsung</p>
            <?php
            $qry = "SELECT * FROM barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori WHERE status='open' order by tgl_buka DESC";
            $execute = mysqli_query($koneksi,$qry);
            $sum_lelangongoing = mysqli_num_rows($execute);
            ?>
            <span class="badge badge-info right"><?= $sum_lelangongoing ?></span>
        </a>
        </li>
        <li class="nav-item">
        <a href="../index3.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Lelang Selesai</p>
        </a>
        </li>
    </ul>
    </li>
    
</ul>
</nav>
<!-- /.sidebar-menu -->
<?php } else { ?>

<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
    <li class="nav-item">
    <a href="?module=dashboard" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
        Dashboard
        </p>
    </a>
    </li>
    <li class="nav-item">
    <a href="?module=barang" class="nav-link">
        <i class="nav-icon fas fa-xxx"></i>
        <p>
        Data Barang
        </p>
    </a>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cart"></i>
        <p>
        Transaksi Lelang
        <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="?module=lelang-ongoing" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Lelang Berlangsung</p>
            <?php
            $qry = "SELECT * FROM barang INNER JOIN kategori ON kategori.id_kategori=barang.id_kategori WHERE id_user='$_SESSION[id_user]' AND status='open' order by tgl_buka DESC";
            $execute = mysqli_query($koneksi,$qry);
            $sum_lelangongoing = mysqli_num_rows($execute);
            ?>
            <span class="badge badge-info right"><?= $sum_lelangongoing ?></span>
        </a>
        </li>
        <li class="nav-item">
        <a href="?module=lelang-ongoing" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Pengiriman Barang</p>
            <span class="badge badge-info right">0</span>
        </a>
        </li>
        <li class="nav-item">
        <a href="../index3.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Lelang Selesai</p>
            <span class="badge badge-info right">0</span>
        </a>
        </li>
    </ul>
    </li>
    <li class="nav-item">
    <a href="?module=dashboard" class="nav-link">
        <i class="nav-icon fas fa-xxx"></i>
        <p>
        Invoice Lelang
        </p>
    </a>
    </li>

</ul>
</nav>

<?php } ?>