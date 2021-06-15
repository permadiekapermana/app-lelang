<?php

error_reporting(0);
include "../../../config/koneksi.php";

$nama       = $_POST['name'];
$nope       = $_POST['hp'];
$email      = $_POST['email'];
$alamat     = $_POST['alamat'];
$password   = $_POST['password'];
$password2  = $_POST['password2'];
$level      = $_POST['level'];
$bank      = $_POST['bank'];
$norek      = $_POST['norek'];

if($password == $password2)
{
    $fpassword = md5($password);
    $insert =  mysqli_query($koneksi,
    "
        INSERT INTO users (nama,email,password,no_hp,alamat,status,role) VALUES (
            '$nama','$email','$fpassword','$nope','$alamat','aktif', '$level'
        )
    ");

    $sql    = mysqli_query($koneksi, "SELECT * FROM users ORDER BY id_user DESC LIMIT 1");
    $ketemu = mysqli_fetch_array($sql);

    $last_id = $ketemu['id_user'];

    $insert_detail = mysqli_query($koneksi,
        "INSERT INTO detail_member (id_user, saldo) VALUES (
        '$last_id', 0)"
    );

    $insert_bank = mysqli_query($koneksi,
        "INSERT INTO rekening (id_user, bank, norek) VALUES (
        '$last_id', '$bank', '$norek')"
    );

    if($insert) {
        echo"<script>alert('Registrasi Berhasil, silahkan login!');history.go(-1);</script>";
        // echo "<script type='text/javascript'>alert('Registrasi Berhasil, silahkan login!');</script>";
        // header('location:../main.php?page=login');
    } else {
        echo"<script>alert('Registrasi Gagal!');history.go(-1);</script>";
    }
} 
else 
{
    echo"<script>alert('Password dan Konfirmasi Password Tidak Sesuai!');history.go(-1);</script>";
}


?>