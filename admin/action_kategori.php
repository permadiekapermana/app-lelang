<?php
error_reporting(0);
session_start();
$act = $_GET['act'];
include 'includes/koneksi.php';

if($act == 'add') {

    $kategori       = $_POST['kategori'];

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
        echo "<script>alert('Data berhasil ditambah.');window.location='admin_kategori.php';</script>";
    }

}
elseif($act == 'update') {

    $id         = $_POST['id'];
    $kategori   = $_POST['kategori'];

    $query  = "UPDATE kategori SET kategori='$kategori' WHERE id_kategori='$id'";
    $result = mysqli_query($koneksi, $query);
    // periska query apakah ada error
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
    } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('Data berhasil diubah.');window.location='admin_kategori.php';</script>";
    }

}
elseif($act == 'delete') {

    $id = $_GET['id'];
    $query = "DELETE FROM kategori WHERE id_kategori = '$id'";
    $execute = mysqli_query($koneksi,$query);

    if($execute){
        echo "<script>alert('Data berhasil dihapus.');window.location='admin_kategori.php';</script>";
    }

}

?>