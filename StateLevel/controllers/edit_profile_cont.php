<?php 
	#   Author of the script
	#   Name: 
	#   Email : 
	#   Date created: 24/01/2023 
	#   Date modified: 24/01/2023  

	include_once ('admin_auth.php');
	include_once ('models/Agent.php');

	$agent = new Agent();
 

	$id = $_REQUEST['id'];

	if ( isset( $_POST['edit_btn'] )) 
	{
		$full_name = $_POST['full_name'];
		$gender = $_POST['gender'];
		$state = $_POST['state'];
		$email = $_POST['email'];
		$phn_num = $_POST['phn_num'];

		if ( $full_name && $email && $phn_num && $gender && $state ) 
		{

			$dt_01 = [ $full_name, $state, $phn_num, $email, $gender, $id ];

			$update_agent = $agent->updateById( $dt_01 );

			if ( $update_agent ) 
			{
				$msg = $web_app->showAlertMsg( 'success', 'Record Updated.' );
			}
			else
			{
				$msg = $web_app->showAlertMsg( 'danger', 'Record Not Updated.' );
			}
		}
		else
		{
			$msg = $web_app->showAlertMsg( 'info', 'Please, All Enter Required Fields.' ); 
		}


	}

	$agent_dt = $agent->getById( [ $id ] );

	$full_name = $agent_dt['full_name'];
	$state = $agent_dt['state'];
	$phn_num = $agent_dt['phone_num'];
	$email = $agent_dt['email'];
	$old_passport = $agent_dt['passport'];
	$gender = $agent_dt['gender'];



	//Edit profile interface
	include_once( 'views/edit_profile.php' );

?>