<?php 
	#   Author of the script
	#   Name: 
	#   Email : 
	#   Date created: 25/01/2023
   #   Date modified: 25/01/2023 

	//auth
	include_once( 'admin_auth.php' );
	include_once ('models/Customer.php');
	include_once ('models/BusinessInfo.php');
	$cus = new Customer();
	$busi = new BusinessInfo();

	include_once ('models/PaymentRecord.php');
	$payment_record = new PaymentRecord();

	if ( isset( $_POST['customer_btn'] ) ) 
	{
		$full_name = $_POST['name'];
		$phone_num = $_POST['phone_num'];
		$description = $_POST['description'];

		if ( $full_name && $phone_num && $description ) 
		{
				$dt_01 = [ $full_name, $phone_num, $description, $username ];
				$add_user = $cus->addNew( $dt_01 );

				if ( $add_user ) 
				{
					$msg = $web_app->showAlertMsg( 'success', 'Record Added' );
				} 
				else 
				{
					$msg = $web_app->showAlertMsg( 'danger', 'Record Not Added' );

				}
							
		} 
		else 
		{
			$msg = $web_app->showAlertMsg( 'danger', 'Please, Enter All Required Field!' );
		}
		
	}



	$customer_dt = $cus->getCustomer( [] );

	if ( !$customer_dt ) 
	{
		$msg = $web_app->showAlertMsg( 'info', 'No Record Found!' ); 
	}



	
	//Dashboard interface
	include_once( 'views/dashboard.php' );


 ?>