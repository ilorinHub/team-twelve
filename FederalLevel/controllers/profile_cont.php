<?php 
	#   Author of the script
	#   Name: 
	#   Email : 
	#   Date created: 24/01/2023 
	#   Date modified: 24/01/2023  
 
 	//App Functions
	include_once ('models/User.php');
	include_once ('models/AccountInfo.php');
	include_once ('models/Organisation.php');
	include_once( 'admin_auth.php' );

	//Creating Instances
	$user_info = new User();
	$acct_info = new AccountInfo();
	$org_info = new Organisation();


	$acct_dt = $acct_info->getById( [ $acct_id ] );
	$username = $acct_dt['username'];

	$user_dt = $user_info->getById( [ $acct_dt['user_id'] ] );
	$full_name = $user_dt['full_name'];
	$email = $user_dt['email'];
	$phone_num = $user_dt['phone_num'];
	$gender = $user_dt['gender'];

	$org_dt = $org_info->getByAccountId( [ $acct_id ]);

	$org_name = $org_dt['name'];
	$org_email = $org_dt['email'];
	$org_phn_no = $org_dt['phone_no'];
	$logo = $org_dt['logo'];
	$address = $org_dt['address'];

	$image_path = 'assets/uploads/'.$logo;


	//Edit profile interface
	include_once( 'views/profile.php' );

?>