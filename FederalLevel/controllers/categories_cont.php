<?php 
	#   Author of the script
	#   Name:
	#   Email :
	#   Date created: 24/01/2023
   #   Date modified: 24/01/2023 
	
	//App Functions
	include_once( 'admin_auth.php' );
	include_once ('models/Category.php');
	$cate = new Category();


	if ( isset( $_POST['categories_btn'] ) ) 
	{
		$category = $_POST['category_name'];
		$price = $_POST['price'];

		if ( $category && $price ) 
		{
			$get_category = $cate->getByCategory( [ $category ] );

			$dt_01 = [ $category, $price ];

			if ( !$get_category ) 
			{
				$add_category = $cate->addNew( $dt_01 );

				if ( $add_category ) 
				{
					$msg = $web_app->showAlertMsg( 'success', "Record Added" );
					$clear = true;
				} 
				else 
				{
					$msg = $web_app->showAlertMsg( 'danger', "Record Not Added" );
				}
				
			} 
			else 
			{
				$msg = $web_app->showAlertMsg( 'danger', "$category Already Exist" );
			}
			
		} 
		else 
		{
			$msg = $web_app->showAlertMsg( 'danger', 'Please, Enter Username And Password.' );
		}
		
	}

	$categories_dt = $cate->getAllCategories( [] );

	if ( !$categories_dt ) 
	{
		$msg = $web_app->showAlertMsg( 'info', "No Record Found" );
	}


	include_once ('views/categories.php');
?>