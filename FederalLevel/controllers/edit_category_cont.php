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

	$id = $_REQUEST['id'];

	$category_dt = $cate->getById( [ $id ] );

	$category = $category_dt['category'];
	$price = $category_dt['price'];

	//Edit profile interface
	include_once( 'views/edit_category.php' );

?>