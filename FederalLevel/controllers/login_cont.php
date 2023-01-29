<?php 
	#   Author of the script
	#   Name: 
	#   Email : 
	#   Date created: 24/01/2023 
	#   Date modified: 24/01/2023  

	include_once( 'models/AccountInfo.php' );
	
	//Creating instances
	$acct_info = new AccountInfo(); 

	if ( isset( $_POST[ 'login_btn' ] ) ) 
	{
		// Getting user values
		$uname = $_POST[ 'uname' ];
		$pword = $_POST[ 'pword' ]; 

		//Validating inputs
		if ( $uname && $pword ) 
		{
			$dt_01 = [ $uname ];
			$acct_dt = $acct_info->getLogin( $dt_01 );

			if ( $acct_dt ) 
			{
				$pwordx = $acct_dt[ 'password' ];
				//Match user password
				$match_pword = $acct_info->decPword( $pword, $pwordx );
				if ( $match_pword ) 
				{  
					$id = $acct_dt[ 'id' ];
					//set session and cookie
					$time_out = time() + 3500;
					$_SESSION[ 'account_id' ] = $id;
					//collect user id
					setcookie( 'acct_id', $id, $time_out );
					//redirect to products
					header( "Location: ./dashboard", true, 301 );
					exit();
				} 
				else 
				{
					$msg = $web_app->showAlertMsg( 'danger', 'Sorry, Incorect username or password!' ); 
				}
			}
			else 
			{
				$msg = $web_app->showAlertMsg( 'danger', 'Sorry, Incorect username or password!' );
			}
		}
		else 
		{  
			$msg = $web_app->showAlertMsg( 'info', 'Please, Enter Username And Password.' ); 	
		}
	}

	//login interface
	include_once( 'views/login.php' );

?>