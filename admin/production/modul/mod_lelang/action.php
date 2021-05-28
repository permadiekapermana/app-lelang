<?php

error_reporting(0);
session_start();
$act = $_GET['act'];
include '../../../../config/koneksi.php';

if($act == 'win') {

    $id       = $_GET['id'];
    $status   = 'Menunggu Pengiriman';

    $winner  = "SELECT * FROM lelang WHERE id_barang='$id' AND status='pending'";
    $qwinner = mysqli_query($koneksi,$winner);
    $winner  = mysqli_fetch_array($qwinner);

    $qupdatestatus = "UPDATE lelang SET status='terpilih' WHERE id_lelang='$winner[id_lelang]'";
    $rqupdatestatus = mysqli_query($koneksi, $qupdatestatus);

    $qupdatebarang = "UPDATE barang SET status='close' WHERE id_barang='$id'";
    $rqupdatebarang = mysqli_query($koneksi, $qupdatebarang);

    // var_dump($winner['id_lelang']);

    // echo"Query OK";

    $query = "INSERT INTO kirim_barang (id_lelang, status_kirim) VALUES 
    ('$winner[id_lelang]', '$status')";
    $result = mysqli_query($koneksi, $query);
    // periska query apakah ada error
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
    } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('Lelang Selesai! Silahkan Kirim barang ke pemenang!');window.location='page.php?module=pengiriman&&method=';</script>";
    }

}

?>