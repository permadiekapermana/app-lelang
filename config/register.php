<?php 
include "koneksi.php";

$nama       = $_POST['name'];
$nope       = $_POST['hp'];
$email      = $_POST['email'];
$alamat     = $_POST['alamat'];
$password   = $_POST['password'];
$password2  = $_POST['password2'];
$level      = $_POST['level'];

if($password == $password2)
{
    $fpassword = md5($password);
    $insert =  mysqli_query($koneksi,
    "
        INSERT INTO users (nama,email,password,no_hp,alamat,status,level) VALUES (
            '$nama','$email','$fpassword','$nope','$alamat','aktif', '$level'
        ) 
    ");

    if($insert) {
        echo "<script type='text/javascript'>alert('Registrasi Berhasil, silahkan login!');</script>";
        header('location:../web/main.php?page=login');
    } else {
        echo "<script type='text/javascript'>alert('Registrasi Gagal!');</script>";
        header('location:../web/main.php?page=login');
    }
} 
else 
{
    echo "<script type='text/javascript'>alert('Password dan Konfirmasi Password Tidak Sesuai!');</script>";
    header('location:../web/main.php?page=login');
}

?>