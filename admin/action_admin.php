<?php
error_reporting(0);
session_start();
$act = $_GET['act'];
include 'includes/koneksi.php';

if($act == 'add') {

    $nama       = $_POST['nama'];
    $password   = md5($_POST['password']);
    $email      = $_POST['email'];
    $alamat     = $_POST['alamat'];
    $no_hp      = $_POST['no_hp'];
    $status     = 'aktif';
    $role       = 'admin';

    $query = "INSERT INTO users (nama, email, password, no_hp, alamat, status, role) VALUES 
    ('$nama', '$email', '$password', '$no_hp', '$alamat', '$status','$role')";
    $result = mysqli_query($koneksi, $query);
    // periska query apakah ada error
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
    } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('Data berhasil ditambah.');window.location='admin_dataadmin.php';</script>";
    }

}
elseif($act == 'update') {

    $id         = $_POST['id'];
    $nama       = $_POST['nama'];
    $password   = md5($_POST['password']);
    $email      = $_POST['email'];
    $alamat     = $_POST['alamat'];
    $no_hp      = $_POST['no_hp'];

    if ($password!=NULL) {
        $query  = "UPDATE users SET nama='$nama', password='$password', email='$email', alamat='$alamat', no_hp='$no_hp' WHERE id_user='$id'";
    } else {
        $query  = "UPDATE users SET nama='$nama', email='$email', alamat='$alamat', no_hp='$no_hp' WHERE id_user='$id'";
    }

    $result = mysqli_query($koneksi, $query);
    // periska query apakah ada error
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
    } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('Data berhasil diubah.');window.location='admin_dataadmin.php';</script>";
    }

}
elseif($act == 'delete') {

    $id = $_GET['id'];
    $query = "DELETE FROM users WHERE id_user = '$id'";
    $execute = mysqli_query($koneksi,$query);

    if($execute){
        echo "<script>alert('Data berhasil dihapus.');window.location='admin_dataadmin.php';</script>";
    }

}

?>