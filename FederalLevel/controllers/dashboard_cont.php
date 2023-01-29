<?php 
	#   Author of the script
	#   Name:
	#   Email :
	#   Date created: 24/01/2023
   #   Date modified: 24/01/2023 

	//auth
	include_once( 'admin_auth.php' );

	//App Function
	include ('models/Agent.php');

	//Creating Instance
	$agent = new Agent();

	$gender_m = '';
	$gender_f = '';

	if ( isset( $_POST['save_btn'] ) ) 
	{
		$full_name = $_POST['full_name'];
		$gender = $_POST['gender'];
		$state = $_POST['state'];
		$email = $_POST['email'];
		$phn_num = $_POST['phn_num'];
		$username = $_POST['username'];
		$pword = $_POST['pword'];
		$passport = $_FILES['passport']['name'];

		if ( $gender == 'male' ) 
		{
			$gender_m = true;
		}
		elseif( $gender == 'female' )
		{
			$gender_f = true;
		}

		if ( $full_name && $gender && $state && $email && $phn_num && $username && $pword && $passport ) 
		{
			$get_user = $agent->getByUsername( [ $username ] );

			if ( !$get_user ) 
			{
				$tmp_name = $_FILES['passport']['tmp_name'];
				$img_upload = $web_app->imageUpload( $passport, $tmp_name, $upload_dir_2 );
				$pword_hash = $agent->encPword( $pword );

				if ( $img_upload )
				{
  					$dt_01 = [ $full_name, $state, $phn_num, $email, $username, $pword_hash, $username.$passport, $gender ];

					$add_agent = $agent->addNew( $dt_01 );

					if ( $add_agent) 
					{
						$msg = $web_app->showAlertMsg( 'success', 'Record Added.' ); 
					} 
					else 
					{
						$msg = $web_app->showAlertMsg( 'danger', 'Record Not Added.' ); 
					}
				}
				else
				{
					$msg = $web_app->showAlertMsg( 'danger', 'passport not uploaded.' );
				}
				
			} 
			else 
			{
				$msg = $web_app->showAlertMsg( 'danger', 'Enter Another Username.' ); 
			}
		} 
		else 
		{
			$msg = $web_app->showAlertMsg( 'danger', 'Please, All Enter Required Fields.' ); 
		}
	}

	$agent_dt = $agent->getAgent( [] );
	
	//Dashboard interface
	include_once( 'views/dashboard.php' );
?>