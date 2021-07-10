<?php



 
namespace Midtrans;
require_once 'Midtrans.php';
Config::$serverKey = 'SB-Mid-server-ujNuylyikeqYZVp8flDewnJn';
 include "config/koneksi.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <?php
                $query = "SELECT * FROM saldo ORDER BY id_saldo ASC";
                $execute = mysqli_query($koneksi,$query);
                $data = mysqli_fetch_array($execute);
                ?>
    <tr>
      <th scope="row">1</th>
      <td><?php



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

?></td>
      <td><?php echo $data['order_id'];?></td>
      <td><?php echo"Rp. ".number_format ($WorkingArray[gross_amount]). " ,-";?></td>
<td><?php 

echo $WorkingArray[transaction_status];
?></td>
    </tr>
    
  </tbody>
</table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-4w3qtEm6LFpL8CN6"></script>
<script type="text/javascript">
  document.getElementById('pay-button').onclick = function(){
    // This is minimal request body as example.
    // Please refer to docs for all available options: https://snap-docs.midtrans.com/#json-parameter-request-body
    // TODO: you should change this gross_amount and order_id to your desire. 
    var vartotal_semua = $("#total_semua").val();
    var varid_saldo = $("#id_saldo").val();
    var requestBody = 
    {
      transaction_details: {
        gross_amount: vartotal_semua,
        // as example we use timestamp as order ID
        order_id: 'T-'+Math.round((new Date()).getTime() / 1000)
      }
    } 
    
    getSnapToken(requestBody, function(response){
      var response = JSON.parse(response);
      console.log("new token response", response);
      // Open SNAP payment popup, please refer to docs for all available options: https://snap-docs.midtrans.com/#snap-js
      snap.pay(response.token);
    })
  };
  /**
  * Send AJAX POST request to checkout.php, then call callback with the API response
  * @param {object} requestBody: request body to be sent to SNAP API
  * @param {function} callback: callback function to pass the response
  */
  function getSnapToken(requestBody, callback) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
      if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        callback(xmlHttp.responseText);
      }
    }
    xmlHttp.open("post", "http://localhost/lelang/checkout.php");
    xmlHttp.send(JSON.stringify(requestBody));
  }
</script>
  </body>
</html>
