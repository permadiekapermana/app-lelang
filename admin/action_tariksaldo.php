<?php
error_reporting(0);
// Include koneksi database.
include "includes/koneksi.php";

$id_detailmember = $_POST['id_detailmember'];
$id_user = $_POST['id_user'];
$nominal = $_POST['nominal'];
$id_rekening = $_POST['id_rekening'];
// var_dump($i['id_user']);


// var_dump($total_saldo);



$query  = "INSERT INTO tarik_saldo (id_user, nominal, id_rekening, status_tarik) VALUES 
('$id_user', '$nominal', '$id_rekening','Tarik')";
$result = mysqli_query($koneksi, $query);

$query2  = "UPDATE detail_member SET saldo='0'  WHERE id_detailmember='$id_detailmember'";
$result2 = mysqli_query($koneksi, $query2);
// periska query apakah ada error
if(!$result){
    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
        " - ".mysqli_error($koneksi));
} else {
    //tampil alert dan akan redirect ke halaman index.php
    //silahkan ganti index.php sesuai halaman yang akan dituju
    echo "<script>alert('Berhasil Di Konfirmasi.');window.location='tarik_saldo.php';</script>";
}

?>