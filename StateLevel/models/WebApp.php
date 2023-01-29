<?php
  #   Author of the script
  #   Name: 
  #   Email : 
  #   Date created: 24/01/2023
  #   Date modified: 24/01/2023   

	class WebApp
	{
		// use App;

		function fixUrl( $page ) 
		{
			return str_replace( '-', '_', $page );
		}

		function showAlert( $msg , $top = false )
		{
			if ( $top ) 
			{
		   	$mt = 'mt-2';

        		if ( isset( $_SESSION['msg'] ) ) 
        		{
        			$msg = $_SESSION['msg'];
         		unset( $_SESSION['msg'] );
        		}

        		if ( $msg ) 
        		{
          		$mt = 'mt-5';
        		}
	            
	      	return "<div id='main-msg' class='$mt'> $msg </div>";
			}
			else if ( isset( $msg ) ) 
		  	{
        		return $msg;
			}
		}

		function showAlertMsg( $type, $msg )
		{
			$icon_type  = '';
			
			if ( $type == 'success' ) 
	    	{
	      	$icon_type = "bi bi-check-circle";
	    	} 
	    	else if( $type == 'info' ) 
	    	{
	      	$icon_type = "bi bi-exclamation-circle";
	    	}
	    	else if( $type == 'danger' ) 
	    	{
	      	$icon_type = "bi bi-exclamation-octagon";
	    	}

			$type = "alert-$type";

			$alert = "<div class='alert $type alert-dismissible fade show mt-4' role='alert'><i class='$icon_type me-1'></i> $msg <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
		      </div>";

		   return $alert;
		}

		// persist user input
		function persistData( $data, $update = false, $clear = false ) 
		{

			$dt = '';

			if ( $clear ) 
			{
				return $dt;
			}
			
			if ( isset( $_POST[ $data ] ) ) 
			{
				$dt = $_POST[ $data ];
			}
			else 
			{
				if ( $update ) 
				{
					$dt = $data;
				}
			}

			return $dt;
		}

		//image upload
	 	function imageUpload( $image_name, $temp_name, $directory )
	 	{	

			if ( move_uploaded_file( $temp_name, "$directory/$image_name" ) ) 
 			{
 				return true;
 			}
			
  	 	}

	}

?>