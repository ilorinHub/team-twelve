<?php 
	#   Author of the script
	#   Name: 
	#   Email : 
	#   Date created: 24/01/2023 
	#   Date modified: 24/01/2023  

	include_once( 'models/Agent.php' );
	
	//Creating instances
	$agent = new Agent(); 

	if ( isset( $_POST[ 'login_btn' ] ) ) 
	{
		// Getting user values
		$uname = $_POST[ 'uname' ];
		$pword = $_POST[ 'pword' ]; 

		//Validating inputs
		if ( $uname && $pword ) 
		{
			$dt_01 = [ $uname ];
			$agent_dt = $agent->getLogin( $dt_01 );

			if ( $agent_dt ) 
			{
				$pwordx = $agent_dt[ 'password' ];
				//Match user password
				$match_pword = $agent->decPword( $pword, $pwordx );
				if ( $match_pword ) 
				{  
					$id = $agent_dt[ 'id' ];
					//set session and cookie
					$time_out = time() + 3500;
					$_SESSION[ 'agent_id' ] = $id;
					//collect user id
					setcookie( 'agent_id', $id, $time_out );
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