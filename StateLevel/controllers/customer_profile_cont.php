<?php 
	#   Author of the script
	#   Name: 
	#   Email : 
	#   Date created: 25/01/2023
   #   Date modified: 25/01/2023 

	//auth
	include_once( 'admin_auth.php' );
	include_once ('models/Customer.php');
	include_once ('models/PaymentRecord.php');

	$customer = new Customer();
	$payment_record = new PaymentRecord();

	$id = $_REQUEST['id'];

	$customer_dt = $customer->getById( [ $id ] );

	$org_name = $customer_dt['business_name'];
	$full_name = $customer_dt['full_name'];
	$phone_num = $customer_dt['phone_num'];

	$payment_dt = $payment_record->getCustomerPaymentLog( [ $id ] );

	if ( !$payment_dt ) 
	{
		$msg = $web_app->showAlertMsg( 'info', 'No Record Found!' ); 
	}





	
	//Dashboard interface
	include_once( 'views/customer_profile.php' );


 ?>