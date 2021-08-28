<?php
include("includes/connection.php");

 include('includes/function.php');
	$data = array(
			  'order_id'  =>  $_GET['order_id'],
			  'status'  =>  'dibayar'
     	);
	

 
		$qry = Update('tbl_pembelian', $data, "WHERE id_user = '".$_SESSION['id_user']."' AND status='cart'");

		
		
			header("location:pesanan.php");	 
			exit;
?>