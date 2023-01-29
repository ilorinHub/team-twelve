<?php 
   #   Author of the script
   #   Name: 
   #   Email : 
   #   Date created: 25/01/2023
   #   Date modified: 25/01/2023 

	include_once( 'models/Agent.php' );

	//Creating instances
	$agent = new Agent(); 
	$agent_id = $agent->getLoggedAgent();

	//when not logged in
	if ( !$agent_id ) 
	{
		header( "Location: ./", true, 301 );
		exit();
	}

?>