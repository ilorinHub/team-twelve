<?php 
	#   Author of the script
	#   Name: 
	#   Email : 
	#   Date created: 24/01/2023 
	#   Date modified: 24/01/2023  
 
 	//App Functions
	include_once( 'admin_auth.php' );
	include_once ('models/User.php');
	include_once ('models/AccountInfo.php');
	include_once ('models/Organisation.php');

	//Creating Instances
	$user_info = new User();
	$acct_info = new AccountInfo();
	$org_info = new Organisation();

	$username = $acct_info->getById( [ $acct_id ] )['username'];

	if ( isset( $_POST['edit_btn'] ) ) 
	{
		$full_name = $_POST['full_name'];
		$email = $_POST['email'];
		$phone_number = $_POST['phone_num'];
		$gender = $_POST['gender'];
		$name = $_POST['org_name'];
		$org_email = $_POST['org_email'];
		$org_phn_num = "234".$_POST['org_num'];
		$logo = $_FILES['logo']['name'];
		$old_passport = $_POST['old_passport'];		
		$address = $_POST['address'];

		if ( $full_name && $email && $phone_number && $gender && $name && $org_email && $org_phn_num && $address ) 
		{
			if ( $logo ) 
			{
				$old_passport = $username.$logo;
				$tmp_name = $_FILES['logo']['tmp_name'];
				$web_app->imageUpload( $old_passport, $tmp_name, $upload_dir );
			}

			$user_id = $acct_info->getById( [ $acct_id ] )['user_id'];
			$user_dt = $user_info->getById( [ $user_id ] );
			$id = $user_dt['id'];

			$dt_01 = [ $full_name, $email, $phone_number, $gender, $id ];
			$update_user = $user_info->updateById( $dt_01 );

			
		
			$dt_01 = [ $name, $email, $phone_number, $old_passport, $address, $acct_id ];
			$update_org = $org_info->updateByAcctId( $dt_01 );

			if ( $update_org || $update_user ) 
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
			$msg = $web_app->showAlertMsg( 'danger', 'Please, All Enter Required Fields.' ); 
		}
	}

	$user_id = $acct_info->getById( [ $acct_id ] )['user_id'];


	$user_dt = $user_info->getById( [ $user_id ] );

	$full_name = $user_dt['full_name'];
	$email = $user_dt['email'];
	$phone_num = $user_dt['phone_num'];
	$gender = $user_dt['gender'];

	$org_dt = $org_info->getByAccountId( [ $acct_id ] );

	$org_name = $org_dt['name'];
	$org_email = $org_dt['email'];
	$org_num = $org_dt['phone_no'];
	$address = $org_dt['address'];
	$old_passport = $org_dt['logo'];




	//Edit profile interface
	include_once( 'views/edit_profile.php' );

?>