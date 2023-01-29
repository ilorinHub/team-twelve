<?php 
	#   Author of the script
	#   Name: 
	#   Email : 
	#   Date created: 24/01/2023 
	#   Date modified: 24/01/2023  

	include_once ('models/Customer.php');
	$cus = new Customer();

	include_once ('models/Category.php');

	$payment_cat = new Category();

	$payment_category = $payment_cat->getCategories( [] );


	$id = $_REQUEST['id'];

	$customer_dt = $cus->getById( [ $id ] );

	$full_name = $customer_dt['full_name'];
	$org_name = $customer_dt['business_name'];
	$customer_id = $customer_dt['id'];
	
	//Payment interface
	include_once( 'views/payment.php' );

?>