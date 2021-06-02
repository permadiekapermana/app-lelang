<?php

error_reporting(0);
session_start();
$act = $_GET['act'];
include '../../../../config/koneksi.php';

if($act == 'add') {

    $id               = $_POST['id'];
    $gambar_produk  = $_FILES['barang']['name'];

    if($gambar_produk != "") 
    {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar_produk); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['barang']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; //menggabungkan angka acak dengan nama file sebenarnya
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                    move_uploaded_file($file_tmp, '../../../../img/bukti/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                    // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                    $query = "UPDATE riwayat_saldo SET status='Sukses Ditransfer', bukti_transfer='$nama_gambar_baru' WHERE id_riwayatsaldo='$id'";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                            " - ".mysqli_error($koneksi));
                    } else {
                        //tampil alert dan akan redirect ke halaman index.php
                        //silahkan ganti index.php sesuai halaman yang akan dituju
                        echo "<script>alert('Data berhasil disimpan.');window.location='../../page.php?module=saldo&&method=';</script>";
                    }

                } else {     
                //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../../page.php?module=saldo&&method=';</script>";
                }
    } 

}

if($act == 'withdraw') {

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
        echo"<script>alert('Request Withdraw Berhasil!');window.location='../../page.php?module=saldo&&method=';</script>";
        // echo "<script type='text/javascript'>alert('Registrasi Berhasil, silahkan login!');</script>";
        // header('location:../main.php?page=login');
        } else {
        echo"<script>alert('Request Withdraw Gagal!');window.location='../../page.php?module=saldo&&method=';</script>";
        }
    
    } else {
        // jika saldo = 0
        echo"<script>alert('Saldo Anda 0!');window.location='../../page.php?module=saldo&&method=';</script>";
    }

}

?>