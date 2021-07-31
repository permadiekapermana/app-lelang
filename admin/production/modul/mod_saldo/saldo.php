<?php

namespace Midtrans;
require_once 'Midtrans.php';
Config::$serverKey = 'SB-Mid-server-MlZEweTajvVFnRDf4NMHiTqq';
$koneksi = mysqli_connect('localhost','root','','db_lelang');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <!-- Bootstrap CSS -->
   
    <title>Hello, world!</title>
  </head>
  <body>
      <div class="container-fluid mb-2 mt-3">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
  <thead>
    
    <tr>
      <th>NO</th>
      <th scope="col">Informasi Pembayaran</th>
      <th scope="col">Order ID</th>
      <th scope="col">Total Pembelian</th>
      <th scope="col">Status</th>
      <th>Nama</th>
    </tr>
    </thead>
    <tbody>
    <?php
                $query = "SELECT * FROM riwayat_saldo INNER JOIN users ON riwayat_saldo.id_user=users.id_user ORDER BY id_saldo DESC";
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
        </tr>  
       <?php
        }
        ?>

    </tbody>
        
    </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
   $(document).ready(function() {
    $('#example').DataTable();
} );
</script>  
  
  
  </body>
</html>