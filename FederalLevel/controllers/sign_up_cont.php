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

	//Creating Instances
	$user_info = new User();
	$acct_info = new AccountInfo();
	$org_info = new Organisation();

	$gender_m = false;
	$gender_f = false;

	if ( isset( $_POST['submit_btn'] )) 
	{
		$full_name = $_POST['full_name'];
		$email = $_POST['email'];
		$phone_number = $_POST['phone_num'];
		$gender = $_POST['gender'];
		$username = $_POST['username'];
		$password = $_POST['pword'];
		$con_password = $_POST['con_pword'];
		$name = $_POST['org_name'];
		$org_email = $_POST['org_email'];
		$org_phn_num = $_POST['org_num'];
		$logo = $_FILES['logo']['name'];		
		$address = $_POST['address'];

		if ( $gender == 'male' ) 
		{
			$gender_m = true;
		}
		else if( $gender == 'female' )
		{
			$gender_f = true;
		}
		

		if ( $full_name && $email && $phone_number && $gender && $username && $password && $name && $org_email && $org_phn_num && $logo && $address && $con_password ) 
		{
			if ( $password == $con_password ) 
			{
				$get_user_acct = $acct_info->getByUsername( [ $username ] );

				if ( !$get_user_acct ) 
				{
					$dt_01 = [ $full_name, $email, $phone_number ];

					$get_user = $user_info->getByAllTableColumn( $dt_01 );

					if ( $get_user ) 
					{
						$id = $get_user['id'];
					}
					else
					{
						$dt_01 = [ $full_name, $email, $phone_number, $gender ];
						$add_user = $user_info->addNew( $dt_01 );

						if ( $add_user ) 
						{
							$dt_01 = [ $full_name, $email, $phone_number ];
							$get_user = $user_info->getByAllTableColumn( $dt_01 );
							$id = $get_user['id'];
						}
					}
					$pword_hash = $acct_info->encPword( $password );
					$dt_01 = [ $username, $pword_hash, $id ];
					$add_acct = $acct_info->addNew( $dt_01 );

					if ( $add_acct ) 
					{
						$get_user_acct = $acct_info->getByUsername( [ $username ] );
						$acct_id = $get_user_acct['id'];
						$dt_01 = [ $name, $org_email, $org_phn_num, $username.$logo, $address, $acct_id ];

						$tmp_name = $_FILES['logo']['tmp_name'];
						$directory = $upload_dir;
						$upload_img = $web_app->imageUpload( $username.$logo, $tmp_name, $directory );

						if ( $upload_img ) 
						{
							$add_org = $org_info->addNew( $dt_01 );

							if ( $add_org ) 
							{
								$msg = $web_app->showAlertMsg( 'success', "Record Added." );
								$clear = true;
							}
							else
							{
								$msg = $web_app->showAlertMsg( 'danger', "Record Not Added." );
							}
						}
						else
						{
							$msg = $web_app->showAlertMsg( 'danger', "Sorry, Couldn't Upload Your Organisation Logo." );
						}
					}
				}
				else
				{
					$msg = $web_app->showAlertMsg( 'danger', "Sorry, Change Your Username." );
				}
			}
			else
			{
				$msg = $web_app->showAlertMsg( 'danger', "Sorry, Password Doesn't Match." );
			}	
		}
		else
		{
			$msg = $web_app->showAlertMsg( 'danger', 'Please, All Enter Required Fields.' ); 
		}
	}


	//Edit profile interface
	include_once( 'views/sign_up.php' );

?>