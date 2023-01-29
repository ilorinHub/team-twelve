<?php 
   #   Author of the script
   #   Name: 
   #   Email : 
   #   Date created: 24/01/2023
   #   Date modified: 24/01/2023 

	include_once( 'models/AccountInfo.php' );

	//Creating instances
	$acct_info = new AccountInfo(); 
	$acct_id = $acct_info->getLoggedAcct();

	//when not logged in
	if ( !$acct_id ) 
	{
		header( "Location: ./", true, 301 );
		exit();
	}

?>