<?php 
include "config/koneksi.php";

$page = $_GET['page'];


if( $page == 'barang'){
  include "modul/barang.php";
}

if($page == 'login'){
  include "modul/login.php";
    if($_GET['message'] == 'failregis')
    {
      echo "<script>
        alert('Registrasi Gagal');
      </script>";
    }
}

if($page == 'kontak') {
  include "modul/kontak.php";
}

if($page == 'item'){
  include "modul/item.php";
}

if($page == ''){
  include "modul/main-page2.php";
}

if($page == 'riwayat'){
  include "modul/riwayat.php";
}

?>