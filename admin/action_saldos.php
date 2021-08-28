<?php
error_reporting(0);
// Include koneksi database.
include "includes/koneksi.php";

$id_saldo         = $_POST['id_saldo'];
$nominal = $_POST['nominal'];
$id_user = $_POST['id_user'];

// var_dump($i['id_user']);

$saldo_member= mysqli_query($koneksi, "SELECT * FROM detail_member WHERE id_user='$id_user'");
$s=mysqli_fetch_array($saldo_member);

// var_dump($s['saldo']);

$total_saldo = $nominal + $s['saldo'];

// var_dump($total_saldo);



$query  = "UPDATE riwayat_saldo SET status_bayar='Konfirmasi' WHERE id_saldo='$id_saldo'";
$result = mysqli_query($koneksi, $query);

$query2  = "UPDATE detail_member SET saldo=$total_saldo  WHERE id_user='$id_user'";
$result2 = mysqli_query($koneksi, $query2);
// periska query apakah ada error
if(!$result){
    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
        " - ".mysqli_error($koneksi));
} else {
    //tampil alert dan akan redirect ke halaman index.php
    //silahkan ganti index.php sesuai halaman yang akan dituju
    echo "<script>alert('Berhasil Di Konfirmasi.');window.location='saldo.php';</script>";
}

?>