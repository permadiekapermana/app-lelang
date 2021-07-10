<div class="card">
<div class="card-header">
    <h3 class="card-title">Saldo</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
<table id="example2" class="table table-bordered table-hover">
  
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
                $query = "SELECT * FROM saldo INNER JOIN users ON saldo.id_users=users.id_user ORDER BY id_saldo DESC";
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

if($WorkingArray[payment_type]=='bank_transfer'){
echo "BANK : ".$WorkingArray[va_numbers][0][bank];
echo "</br>";
echo "VA : ".$WorkingArray[va_numbers][0][va_number];
}
if($WorkingArray[payment_type]=='echannel'){
echo "Bill Key : ".$WorkingArray[bill_key];
echo "</br>";
echo "Biller Code : ".$WorkingArray[biller_code];
}
if($WorkingArray[payment_type]=='gopay'){
echo "Informasi : Gopay";
}
if($WorkingArray[payment_type]=='bca_klikbca'){
echo "Approval Code : ".$WorkingArray[approval_code];

}
if($WorkingArray[payment_type]=='cstore'){
echo "Tempat : ".$WorkingArray[store];
echo "</br>";
echo "Kode  : ".$WorkingArray[payment_code];

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
      <td><?php echo"Rp. ".number_format ($fata[saldos]). " ,-";?></td>
<td><?php echo $WorkingArray[transaction_status];?></td>
<td><?php echo $data['nama'];?></td>     
        </tr>  
       <?php
        }
        ?>

    </tbody>
</table>
</div>
<!-- /.card-body -->
</div>