<?php 
	#   Author of the script
	#   Name: 
	#   Email : 
	#   Date created: 25/01/2023
   #   Date modified: 25/01/2023 

	//auth
	include_once( 'admin_auth.php' );
	include_once ('models/Customer.php');
	$customer = new Customer();

	$customer_dt = $customer->getCustomer( [] );

	if ( !$customer_dt ) 
	{
		$msg = $web_app->showAlertMsg( 'info', 'No Record Found!' ); 
	}



	
	//Dashboard interface
	include_once( 'views/customer.php' );


 ?>