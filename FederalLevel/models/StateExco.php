<?php
	#   Author of the script
	#   Name: Ezra Adamu
	#   Email : ezra00100@gmail.com
	#   Date created: 17/08/2022 
	#   Date modified: 17/08/2022    

	include_once( 'App.php' );
	include_once( 'Encryption.php' );

	class StateExco 
	{
		//using Namespaces
		use App {
      	App::__construct as private __appConst;
    	}

    	use Encryption;

		protected $table = '';
		const DB_TABLE = 'state_excos';

		function __construct()
	 	{
	 		$this->__appConst();
	 		$this->table = self::DB_TABLE;
	 	}

		function addNew( array $dt ) 
		{	
			$sql = "INSERT INTO $this->table( `hq_id` ) VALUES ( ? )";
			$res = $this->runQuery( $sql, $dt );
			
			// checking result 
			if ( $res ) 
			{
	      	return $res;
	    	}
		}

	}

?>