<?php

error_reporting(0);
session_start();
$act = $_GET['act'];
include '../../../../config/koneksi.php';

if($act == 'win') {

    $id       = $_GET['id'];

    $query = "INSERT INTO kategori (kategori) VALUES 
    ('$kategori')";
    $result = mysqli_query($koneksi, $query);
    // periska query apakah ada error
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
    } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('Data berhasil ditambah.');window.location='../../page.php?module=pengiriman&&method=';</script>";
    }

}

?>