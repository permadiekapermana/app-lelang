<?php
error_reporting(0);
session_start();
$act = $_GET['act'];
include 'includes/koneksi.php';

if($act == 'add') {

    $nama_barang    = $_POST['nama_barang'];
    $id_kategori    = $_POST['id_kategori'];
    $tgl_buka       = $_POST['tgl_buka'];
    $tgl_tutup      = $_POST['tgl_tutup'];
    $harga_buka     = $_POST['harga_buka'];
    $keterangan     = $_POST['keterangan'];
    $gambar_produk  = $_FILES['barang']['name'];
    $status         = 'open';
    $id_user        = $_SESSION['id_user'];

    if($gambar_produk != "") 
    {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar_produk); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['barang']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; //menggabungkan angka acak dengan nama file sebenarnya
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                    move_uploaded_file($file_tmp, '../img/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                    // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                    $query = "INSERT INTO barang (nama_barang, id_kategori, keterangan, tgl_buka, tgl_tutup, harga_buka, status, foto, id_user) VALUES 
                    ('$nama_barang', '$id_kategori', '$keterangan', '$tgl_buka', '$tgl_tutup', '$harga_buka', '$status', '$nama_gambar_baru', $id_user)";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                            " - ".mysqli_error($koneksi));
                    } else {
                        //tampil alert dan akan redirect ke halaman index.php
                        //silahkan ganti index.php sesuai halaman yang akan dituju
                        echo "<script>alert('Data berhasil ditambah.');window.location='pelelang_barang.php';</script>";
                    }

                } else {     
                //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='pelelang_add_barang.php';</script>";
                }
    } 

}
elseif($act == 'update') {

    $id             = $_POST['id'];
    $nama_barang    = $_POST['nama_barang'];
    $id_kategori    = $_POST['id_kategori'];
    $tgl_buka       = $_POST['tgl_buka'];
    $tgl_tutup      = $_POST['tgl_tutup'];
    $harga_buka     = $_POST['harga_buka'];
    $keterangan     = $_POST['keterangan'];
    // $gambar_produk  = $_FILES['barang']['name'];

    $query  = "UPDATE barang SET nama_barang='$nama_barang', id_kategori='$id_kategori', tgl_buka='$tgl_buka', tgl_tutup='$tgl_tutup', harga_buka='$harga_buka' WHERE id_barang='$id'";
    $result = mysqli_query($koneksi, $query);
    // periska query apakah ada error
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
    } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('Data berhasil diubah.');window.location='pelelang_barang.php';</script>";
    }

}
elseif($act == 'delete') {

    $id = $_GET['id'];
    $query = "DELETE FROM barang WHERE id_barang = '$id'";
    $execute = mysqli_query($koneksi,$query);

    if($execute){
        echo "<script>alert('Data berhasil dihapus.');window.location='pelelang_barang.php';</script>";
    }

}

?>