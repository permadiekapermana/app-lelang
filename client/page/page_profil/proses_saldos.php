<?php 
error_reporting(0);
$koneksi = mysqli_connect('localhost','root','','db_lelang');

	// membuat query max

	$query = mysqli_query($koneksi, "SELECT max(id_saldo) from saldo");
	$data = mysqli_fetch_array($query);
	$kodeBarang = $data['order_id'];
 
	$urutan = (int) substr($kodeBarang, 3, 3);
 
    $urutan++;
    
	$huruf = "PL-";
	$kode_otomatis = $huruf . sprintf("%03s", $urutan);

// menangkap data yang di kirim dari form
$order_id = $kode_otomatis;
$id_user = $_POST['id_user'];
$saldos = $_POST['saldos'];
$stat =$_POST['stat'];

 
 $query = "INSERT INTO saldo (order_id, id_users, saldos, stat) VALUES 
                    ('$order_id', '$id_user', '$saldos','$stat')";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                            " - ".mysqli_error($koneksi));
                    }else {
                        //tampil alert dan akan redirect ke halaman index.php
                        //silahkan ganti index.php sesuai halaman yang akan dituju
                        echo "<script>alert('Data berhasil ditambah.');window.location='../../menu.php?page=bayar';</script>";
                    }
?>