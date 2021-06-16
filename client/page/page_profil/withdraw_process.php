<?php
session_start();
error_reporting(0);
// Include koneksi database.
include "../../../config/koneksi.php";

$id_user = $_SESSION['id_user'];

// select user
$sql = mysqli_query($koneksi, "SELECT * FROM detail_member WHERE id_user = '$id_user'");
$r=mysqli_fetch_array($sql);

// jika saldo != 0
if ($r['saldo']!=0) {

    // proses request withdraw
    $request_tariksaldo = mysqli_query($koneksi,
    "INSERT INTO riwayat_saldo (id_user, nominal, status, jenis) VALUES ('$id_user', '$r[saldo]', 'Permintaan Withdraw Diterima', 'Withdraw')"
    );

    // set saldo user ke 0
    $kurangi_saldouser = mysqli_query($koneksi,
    "UPDATE detail_member SET saldo=0 WHERE id_user = '$id_user'"
    );

    if($request_tariksaldo) {
    echo"<script>alert('Request Withdraw Berhasil!');history.go(-1);</script>";
    // echo "<script type='text/javascript'>alert('Registrasi Berhasil, silahkan login!');</script>";
    // header('location:../main.php?page=login');
    } else {
    echo"<script>alert('Request Withdraw Gagal!');history.go(-1);</script>";
    }

} else {
    // jika saldo = 0
    echo"<script>alert('Saldo Anda 0!');history.go(-1);</script>";
}

?>