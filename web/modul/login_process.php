<?php
error_reporting(0);
// Memulai session.
//session_start();

// Jika ditemukan session, maka user akan otomatis dialihkan ke halaman admin.
if (isset($_SESSION['username'])) {
    header("location:../web/main.php?page=login");
}

// Include koneksi database.
include "../../config/koneksi.php";

// Jika tombol login ditekan, maka akan mengirimkan variabel yang berisi username dan password.
if (isset($_POST['login'])) {

    $email = $_POST['useremail'];
    $userpass = md5($_POST['password']); // password yang di inputkan oleh user lewat form login.

    // Query ke database.
    $sql = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email' AND password='$userpass' AND status = 'aktif'");
    $ketemu=mysqli_num_rows($sql);
    $r=mysqli_fetch_array($sql);
    $sql2 = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email' AND password='$userpass' AND status = 'nonaktif'");
    $ketemu2=mysqli_num_rows($sql2);

    if ($ketemu > 0){
    session_start();
    include "timeout.php";
        
        $_SESSION['id_user']  = $r['id_user'];
        $_SESSION['nama']     = $r['nama'];
        $_SESSION['email']    = $r['email'];
        $_SESSION['no_hp']    = $r['no_hp'];
        $_SESSION['password'] = $r['password'];
        $_SESSION['alamat']   = $r['alamat'];
        $_SESSION['status']   = $r['status'];
        $_SESSION['role']    = $r['role'];
        
        if ($r['role']=='member'){
            // var_dump($_SESSION);
            header('location:../main.php');
            // echo"Ini page member";
            // var_dump($_SESSION['role']);
        } elseif ($r['role']=='pelelang') {
            // .....
            header('location:../../admin/production/page.php?module=dashboard');
        } elseif ($r['role']=='admin') {
            header('location:../../admin/production/page.php?module=dashboard');
            // echo"Ini page admin";
            // var_dump($_SESSION['role']);
        }
    }
    elseif ($ketemu2 > 0){
    echo "<script>alert('Anda tidak lagi memiliki akses ke dalam Sistem!');history.go(-1)</script>";
    }
    else{
    echo "<script>alert('Username atau Password yang anda masukkan salah!');history.go(-1)</script>";
    }

}
?>