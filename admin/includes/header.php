<?php error_reporting(0) ?>
<?php
include_once "includes/koneksi.php";
session_start();
if ($_SESSION['role']=='member'){
  echo "<script>alert('Hak akses untuk admin sistem dan pelelang!'); window.location = '../web/main.php'</script>";
}
elseif (empty($_SESSION['id_user']) AND empty($_SESSION['id_user'])){
  echo "<script>alert('Untuk akses sistem, anda harus login!'); window.location = '../web/main.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Lelang Sepatu</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>