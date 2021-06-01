<?php
include "../config/koneksi.php";
session_start();
?>

<header class="site-navbar py-4 site-navbar-target" role="banner">

<div class="container">
  <div class="d-flex align-items-center">
    <div class="site-logo">
      <a href="main.php" class="d-block">
        Lelang Online
      </a>
    </div>
    <div class="mr-auto">
      <nav class="site-navigation position-relative text-right" role="navigation">
        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
          <li>
            <a href="main.php" class="nav-link text-left">Home</a>
          </li>
          <li>
            <a href="main.php?page=barang" class="nav-link text-left">Lelang Berlangsung</a>
          </li>
          <li>
            <a href="main.php?page=riwayat" class="nav-link text-left">Riwayat Lelang</a>
          </li>                               
          <!-- <li>
            <a href="main.php?page=kontak" class="nav-link text-left">Kontak</a>
          </li> -->
        </ul>                                                                
      </nav>

    </div>
    <div class="ml-auto">

      <div class="social-wrap">
        <?php
        if (empty($_SESSION['id_user']) AND empty($_SESSION['password'])){
        $sql    = mysqli_query($koneksi, "SELECT * FROM users ORDER BY id_user DESC LIMIT 1");
        $ketemu = mysqli_fetch_array($sql);

        $last_id = $ketemu['id_user'];
        ?>
          <a href="main.php?page=login" class="text-white">Sign In / Register</a>
        <?php
        } else {
          $sql    = mysqli_query($koneksi, "SELECT * FROM detail_member WHERE id_user=$_SESSION[id_user]");
          $ketemu = mysqli_fetch_array($sql);
          $saldo  = $ketemu['saldo'];
        ?>
          <h6 class="text-white"><b>Saldo</b> : Rp. <?=$saldo?> |  <button class="btn-sm btn-success"><a href="?page=akun" class="text-white">Akun Saya</a></button><button class="btn-sm btn-danger"> <a href="modul/logout.php" class="text-white" onClick="return confirm('Are you sure ?')">Logout</a> </button></h6>
        <?php
        }
        ?>
        

        <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
          class="icon-menu h3 text-white" style="position: relative; top: 7px;"></span></a>
        </div>
      </div>

    </div>
  </div>

</header>