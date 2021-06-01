<?php
error_reporting(0);
// Include koneksi database.
include "../../config/koneksi.php";

$id_user       = $_POST['id_user'];
$nama       = $_POST['nama'];
$no_hp       = $_POST['no_hp'];
$alamat       = $_POST['alamat'];

    $update_user = mysqli_query($koneksi,
        "UPDATE users SET nama='$nama', no_hp='$no_hp', alamat='$alamat' WHERE id_user='$id_user'"
    );

    if($update_user) {
        echo"<script>alert('Update Profil Berhasil!');history.go(-1);</script>";
        // echo "<script type='text/javascript'>alert('Registrasi Berhasil, silahkan login!');</script>";
        // header('location:../main.php?page=login');
    } else {
        echo"<script>alert('Update Profil Gagal!');history.go(-1);</script>";
    }

?>