<?php 
	#   Author of the script
	#   Name: 
	#   Email : 
	#   Date created: 25/01/2023
   #   Date modified: 25/01/2023 

	//auth
	include_once( 'admin_auth.php' );
	include_once ('models/Agent.php');
	include_once ('models/Customer.php');
	$agent = new Agent();
	$customer = new Customer();

	$id = $_REQUEST['id'];

	$agent_dt = $agent->getById( [ $id ] );
	$agent_username = $agent_dt['username'];
	$customer_dt = $customer->getCustomerByAddedBy( [ $agent_username ] )['value'];


	$full_name = $agent_dt['full_name'];
	$state = $agent_dt['state'];
	$email = $agent_dt['email'];
	$phone_num = $agent_dt['phone_num'];
	$username = $agent_dt['username'];
	$gender = $agent_dt['gender'];
	
	//Dashboard interface
	include_once( 'views/agent_profile.php' );


 ?>