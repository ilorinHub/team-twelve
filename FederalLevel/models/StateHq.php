<?php
	#   Author of the script
	#   Name: Ezra Adamu
	#   Email : ezra00100@gmail.com
	#   Date created: 17/08/2022 
	#   Date modified: 17/08/2022    

	include_once( 'App.php' );
	include_once( 'Encryption.php' );

	class StateHq 
	{
		//using Namespaces
		use App {
      	App::__construct as private __appConst;
    	}

    	use Encryption;

		protected $table = '';
		const DB_TABLE = 'state_hqs';

		function __construct()
	 	{
	 		$this->__appConst();
	 		$this->table = self::DB_TABLE;
	 	}

		function addNew( array $dt ) 
		{	
			$sql = "INSERT INTO $this->table(`name`, `username`, `password`, `headed_by` ) VALUES ( ?, ?, ?, ? )";
			$res = $this->runQuery( $sql, $dt );
			
			// checking result 
			if ( $res ) 
			{
	      	return $res;
	    	}
		}

		function getAllByHqName( array $dt )
	   {
			$sql = "SELECT * FROM $this->table ORDER BY name ASC";
			$res = $this->fetchAllData( $sql, $dt );

			//checking result 
			if ( $res ) 
			{
			 	return $res;
		   }
	   }

		function getByState( array $dt )
	   {
			$sql = "SELECT * FROM $this->table WHERE name = ?";
			$res = $this->fetchData( $sql, $dt );

			//checking result 
			if ( $res ) 
			{
			 	return $res;
		   }
	   }


	}

?>