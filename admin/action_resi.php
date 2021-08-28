<?php

error_reporting(0);
session_start();
$act = $_GET['act'];
include 'includes/koneksi.php';

if($act == 'resi') {

    $id               = $_POST['id'];
    $jasa_ekspedisi   = $_POST['jasa_ekspedisi'];
    $no_resi          = $_POST['no_resi'];
    $status_kirim     = 'Dalam Pengiriman';

    $query = "UPDATE kirim_barang SET jasa_ekspedisi='$jasa_ekspedisi', no_resi='$no_resi', status_kirim='$status_kirim' WHERE id_kirim='$id'";
    $result = mysqli_query($koneksi, $query);
    // periska query apakah ada error
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
    } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('Resi berhasil diinput!');window.location='pengiriman_selesai.php';</script>";
    }

}

?>