<?php
                                     namespace Midtrans;
                                     require_once 'Midtrans.php';
                                     Config::$serverKey = 'SB-Mid-server-MlZEweTajvVFnRDf4NMHiTqq';
                                     ?>

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Riwayat Saldo</h1>
                <nav class="d-flex align-items-center">
                    <a href="#">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">Riwayat Saldo</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banne r Area -->
<div class="container">
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="sidebar-categories">
                <div class="head">Akun Saya</div>
                <?php
                    include "sidebar.php";
                ?>
            </div>
            
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Filter Bar -->
            <div class="sidebar-filter mt-0">
				<div class="top-filter-head">Riwayat Saldo</div>
			</div>
            <!-- End Filter Bar -->
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">

                
                
                <!--================Order Details Area =================-->
                <div class="container mt-4">
                    <div class="row order_d_inner">
                        <div class="col-lg-12">
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Nominal</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Bukti Transfer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                     

                                       $query = "SELECT * FROM riwayat_saldo INNER JOIN users ON riwayat_saldo.id_user=users.id_user WHERE users.id_user='$_SESSION[id_user]' ORDER BY id_saldo DESC";
                                        $execute = mysqli_query($koneksi,$query); 
                                        $no = 1;
                                        while($data = mysqli_fetch_array($execute)){
                                    ?>
                                    <tr>
                                        <td>
                                            <h5><?=$no++?></h5>
                                        </td>
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
                                        <td>
                                            <?php echo $data['order_id'];?>
                                        </td>
                                        <td>
                                            <h5><?php echo $WorkingArray['transaction_status'];?></h5>
                                        </td>
                                        <td>
                                            <h5><?php echo $data['status']?></h5>
                                        </td>
                                        
                                        
                                        
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->
                        </div>
                    </div>
                    
                </div>
                <!--================End Order Details Area =================-->
    
                </div>
            </section>
            <!-- End Best Seller -->

        </div>
    </div>
</div>