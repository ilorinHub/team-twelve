<?php 
   #   Author of the script
   #   Name: 
   #   Email : 
   #   Date created: 24/01/2023 
   #   Date modified: 24/01/2023

   ob_start();
   
   if( session_status() == PHP_SESSION_NONE )
   {
      session_start();    
   }       
   
   $msg = '';
   $clear = false;

   //App functions
   include_once( 'models/WebApp.php' );
   //Creating App instances
   $web_app = new WebApp();

   include_once( 'models/Agent.php' );
   
   //Creating instances
   $agent = new Agent();
   
   //url
   $server_name = 'https://' . $_SERVER['SERVER_NAME'];
   $uri = $_SERVER['REQUEST_URI'];
   //$main_url = $server_name;
   $main_url = "$server_name/live_projects/RevenueCollectionSystem/FederalLevel";
   $app_url = "$server_name$uri/";

   //page name logic
   $uri_arr = explode( '/', $uri );
   $uri_len =  count( $uri_arr );
   $page_starts = $uri_len - 1;
   $page = $uri_arr[ $page_starts ];

   $page_arr = explode( '?', $uri_arr[ $page_starts ] );
   $page = $page_arr[0];
   $page = $web_app->fixUrl( $page );


   //$main_url_1 = $main_url . '?tab=';

   //disable header
   //$header_blacklist_arr = [ 'login', 'order' ];

   //get url path
   /*$tab = isset( $_GET['tab'] ) ? $_GET['tab']  : '';
   $tab = $web_app->fixUrl();*/

   //setting login as default
   if ( !$page ) 
   {
      $page = 'login';
   }
   
   include_once( 'views/header.php' );

   //directory
   $cur_dir = dirname( __FILE__ );
   $upload_dir = "$cur_dir/assets/uploads";
   $upload_dir_2 = "$cur_dir/assets/uploads/agent";
   //$upload_url = "$main_url/uploads";
   //$app_upload_url = '';

   $page_x = $page . '_cont.php';
   $file = "$cur_dir/controllers/$page_x";

   //checking and including file
   if ( is_file( $file ) ) 
   {
      include_once( $file );
   }
   else
   {
      header( "Location: $main_url", true, 301 );
      exit();
   }

   include_once( 'views/footer.php' );
   
   ob_end_flush();
?>