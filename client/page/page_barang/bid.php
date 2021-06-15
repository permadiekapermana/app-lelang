<?php 
error_reporting(0);
include_once "../../../config/koneksi.php";

// query get data post
$id             = $_POST['id'];
$harga_tawar  = trim($_POST['harga_tawaran']);
$id_user = $_POST['id_user'];

// query get data detail member
$query_member = "SELECT * FROM detail_member JOIN users ON users.id_user = detail_member.id_user WHERE detail_member.id_user = '$id_user'";
$execute = mysqli_query($koneksi,$query_member); //var_dump($execute);
$user = mysqli_fetch_array($execute);
$saldo = $user['saldo'];

// query get data last bid
$query_lastbid = "SELECT * FROM lelang WHERE id_barang = $id AND status='pending'";
$execute2 = mysqli_query($koneksi,$query_lastbid);
$item2 = mysqli_fetch_array($execute2);
$lastbid = mysqli_num_rows($execute2);
$user_lastbid = $item2['id_user'];

// query get data saldo user last bid
$query_userlastbid = "SELECT * FROM detail_member WHERE id_user='$user_lastbid'";
$execute3 = mysqli_query($koneksi,$query_userlastbid);
$item3 = mysqli_fetch_array($execute3);
$total_saldo = $item3['saldo'] + $item2['harga_tawar'];

// var_dump($user_lastbid);

if(empty($harga_tawar)){
    echo "<script>alert('Lengkapi Data Anda.');window.location='../../menu.php?page=item&id=$id';</script>";
} else {

    if ($saldo>=$harga_tawar){
    // query insert data lelang
    $query = "INSERT INTO lelang (harga_tawar, status ,id_user, id_barang) VALUES (        
        '$harga_tawar',
        'pending',
        '$id_user',
        '$id'
    )"; 
    
    // ada lebih dari 0 pelelang
    if ($lastbid>0) {
        $query_changelastbid = "UPDATE lelang SET status='refund' WHERE id_user = $user_lastbid";        
        $excute_lastbid = mysqli_query($koneksi,$query_changelastbid);

        $query_refund = "UPDATE detail_member SET saldo='$total_saldo' WHERE id_user='$user_lastbid'";        
        $excute_refund = mysqli_query($koneksi,$query_refund);
    }
    
    $excute = mysqli_query($koneksi,$query);

    $query_member5 = "SELECT * FROM detail_member JOIN users ON users.id_user = detail_member.id_user WHERE detail_member.id_user = '$id_user'";
    $execute5 = mysqli_query($koneksi,$query_member5); //var_dump($execute);
    $user5 = mysqli_fetch_array($execute5);
    $saldo5 = $user5['saldo'];

    // query update data saldo member
    $update_balance = $saldo5 - $harga_tawar;
    $query_updatesaldo = "UPDATE detail_member SET saldo='$update_balance' WHERE id_user='$id_user'";    
    $excute_updatesaldo = mysqli_query($koneksi,$query_updatesaldo);
    // var_dump($saldo);
    // var_dump($harga_tawar);
    // var_dump($update_balance);
    if($excute_updatesaldo){
        echo "<script>alert('Tawaran Masuk Antrian.');window.location='../../menu.php?page=item&id=$id';</script>";
    }
    
    } else {
        echo "<script>alert('Saldo anda tidak cukup!');window.location='../../menu.php?page=item&id=$id';</script>";
    }
}
?>