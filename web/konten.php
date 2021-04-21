<?php 
include "../config/koneksi.php";

$page = $_GET['page'];


if( $page == 'barang'){
  include "modul/barang.php";
}

if($page == 'login'){
  if (!empty($_SESSION['id_user'])){
    echo "<script>alert('Anda sudah login!'); window.location = '../web/main.php'</script>";
  } else {
    include "modul/login.php";
  }
}

if($page == 'kontak') {
  include "modul/kontak.php";
}

if($page == 'item'){
  include "modul/item.php";
}

if($page == ''){
  include "modul/main.php";
}

if($page == 'riwayat'){
  include "modul/riwayat.php";
}

?>