<?php 
error_reporting(0);
$koneksi = mysqli_connect('localhost','root','','db_lelang');

	// membuat query max

    $pel    = "PLG-";
    $y      = substr($pel,0,4);
    $qry    = "SELECT * FROM saldo WHERE substr(order_id,1,4)='$y' ORDER BY order_id DESC LIMIT 0,1";
    $query  = mysqli_query($koneksi,$qry); 
    $row    = mysqli_num_rows($query);
    $data   = mysqli_fetch_array($query);
    if ($row>0){
        $no = substr($data['order_id'],-6)+1;
    }
    else{
    $no = 1;
    }
    $nourut         = 1000000+$no;
    $kode_otomatis  = $pel.substr($nourut,-6);

// menangkap data yang di kirim dari form
$now      = date("dmy");
$order_id = $kode_otomatis;
// $order_id .= "$now";
// echo"$order_id";
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