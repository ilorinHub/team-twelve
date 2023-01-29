<?php 
	#   Author of the script
	#   Name: 
	#   Email : 
	#   Date created: 24/01/2023 
	#   Date modified: 24/01/2023  

	include_once ('admin_auth.php');
 
	$id = $_SESSION[ 'agent_id' ];

	$agent_dt = $agent->getById( [ $id ] );

	$full_name = $agent_dt['full_name'];
	$state = $agent_dt['state'];
	$email = $agent_dt['email'];
	$phone_num = $agent_dt['phone_num'];
	$username = $agent_dt['username'];
	$gender = $agent_dt['gender'];

	//profile interface
	include_once( 'views/profile.php' );

?>