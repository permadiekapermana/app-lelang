<?php
namespace Midtrans;
require_once 'Midtrans.php';
Config::$serverKey = 'SB-Mid-server-MlZEweTajvVFnRDf4NMHiTqq';

  ?>
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
<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php
  include "includes/sidebar.php";

  ?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
       <?php include "includes/topbar.php" ?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Top Up Saldo</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Saldo</li>
              <li class="breadcrumb-item active" aria-current="page">Data Saldo</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>NO</th>
                        <th scope="col">Informasi Pembayaran</th>
                        <th scope="col">Order ID</th>
                        <th scope="col">Total Pembelian</th>
                        <th scope="col">Status</th>
                        <th>Nama</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                    <th>NO</th>
                    <th scope="col">Informasi Pembayaran</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Total Pembelian</th>
                    <th scope="col">Status</th>
                    <th>Nama</th>
                    <th>Opsi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php
                $query = "SELECT * FROM riwayat_saldo INNER JOIN users ON riwayat_saldo.id_user=users.id_user WHERE status_bayar='Menunggu Pembayaran' ORDER BY id_saldo DESC";
                $execute = mysqli_query($koneksi,$query);
                $no = 1;
               while( $data = mysqli_fetch_array($execute)){
                ?>
                      <tr>
        <td><?=$no++?></td>
      <td>
      <?php



if (strpos(Config::$serverKey, 'your ') != false ) {
    echo "<code>";
    echo "<h4>Please set your server key from sandbox</h4>";
    echo "In file: " . __FILE__;
    echo "<br>";
    echo "<br>";
    echo htmlspecialchars('Config::$serverKey = \'<your server key>\';');
    die();
}

$orderId = $data['order_id'];

// Get transaction status to Midtrans API
try {
    $status = Transaction::status($orderId);
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}
//var_dump($status);
//var_dump(get_object_vars($status));
//echo '<pre>';
//echo json_encode($status);
$WorkingArray = json_decode(json_encode($status),true);
//$character = json_decode($status);

if($WorkingArray['payment_type']=='bank_transfer'){
echo "BANK : ".$WorkingArray['va_numbers'][0]['bank'];
echo "</br>";
echo "VA : ".$WorkingArray['va_numbers'][0]['va_number'];
}
if($WorkingArray['payment_type']=='echannel'){
echo "Bill Key : ".$WorkingArray['bill_key'];
echo "</br>";
echo "Biller Code : ".$WorkingArray['biller_code'];
}
if($WorkingArray['payment_type']=='gopay'){
echo "Informasi : Gopay";
}
if($WorkingArray['payment_type']=='bca_klikbca'){
echo "Approval Code : ".$WorkingArray['approval_code'];

}
if($WorkingArray['payment_type']=='cstore'){
echo "Tempat : ".$WorkingArray['store'];
echo "</br>";
echo "Kode  : ".$WorkingArray['payment_code'];

}

//echo '<pre>'; print_r($WorkingArray); echo '</pre>';
//$yummy = json_decode($status);
//echo "Iki lo".$yummy;
// Approve a transaction that is in Challenge status
// $approve = Transaction::approve($orderId);
// var_dump($approve);

// Cancel a transaction
// $cancel = Transaction::cancel($orderId);
// var_dump($cancel);

// Expire a transaction
// $expire = Transaction::expire($orderId);
// var_dump($expire);

?>
</td>
      <td><?php echo $data['order_id'];?></td>
      <td><?php echo"Rp. ".number_format ($WorkingArray['gross_amount']). " ,-"; 
?></td>
<td><?php echo $WorkingArray['transaction_status'];?></td>
<td><?php echo $data['nama'];?></td>   

<td>
                <div class="btn-group">
                    <a href="konfirmasi_topup.php?id=<?=$data['id_saldo']?>" class="btn btn-sm btn-warning">Konfirmasi</a> &nbsp;
                   
                </div>
            </td>  
        </tr>  
        
       <?php
        }
        ?>
                    

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- DataTable with Hover -->
            
          </div>
          <!--Row-->
        <!---Container Fluid-->
      </div>
      
      <!-- Footer -->
     <?php include "includes/footer.php"?>
       <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
 
     </body>
</html>