<?php
error_reporting(0);
// Include koneksi database.
include "../../config/koneksi.php";

$id         = $_POST['id'];

$lelang = mysqli_query($koneksi, "SELECT * FROM lelang INNER JOIN kirim_barang ON lelang.id_lelang=kirim_barang.id_lelang WHERE id_barang='$id'");
$l=mysqli_fetch_array($lelang);

// var_dump($l['id_lelang']);

$harga_tawar = $l['harga_tawar'];

// var_dump($harga_tawar);

$id_pelelang = mysqli_query($koneksi, "SELECT * FROM barang INNER JOIN users ON barang.id_user=users.id_user WHERE id_barang='$l[id_barang]'");
$i=mysqli_fetch_array($id_pelelang);

// var_dump($i['id_user']);

$saldo_pelelang = mysqli_query($koneksi, "SELECT * FROM detail_member WHERE id_user='$i[id_user]'");
$s=mysqli_fetch_array($saldo_pelelang);

// var_dump($s['saldo']);

$total_saldo = $harga_tawar + $s['saldo'];

// var_dump($total_saldo);



$query  = "UPDATE kirim_barang SET status_kirim='Selesai' WHERE id_kirim='$l[id_kirim]'";
$result = mysqli_query($koneksi, $query);

$query2  = "UPDATE detail_member SET saldo=$total_saldo WHERE id_user='$i[id_user]'";
$result2 = mysqli_query($koneksi, $query2);
// periska query apakah ada error
if(!$result){
    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
        " - ".mysqli_error($koneksi));
} else {
    //tampil alert dan akan redirect ke halaman index.php
    //silahkan ganti index.php sesuai halaman yang akan dituju
    echo "<script>alert('Lelang Selesai, Terima Kasih!');history.go(-1);</script>";
}

?>