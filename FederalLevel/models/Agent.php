<?php
	#   Author of the script
	#   Name:
	#   Email : 
	#   Date created: 24/01/2023 
	#   Date modified: 24/01/2023    

	include_once( 'App.php' );
	include_once( 'Encryption.php' );

	class Agent
	{
		//using Namespaces
		use App {
      	App::__construct as private __appConst;
    	}

    	use Encryption;

		protected $table = '';
		const DB_TABLE = 'agents';

		function __construct()
	 	{
	 		$this->__appConst();
	 		$this->table = self::DB_TABLE;
	 	}

		function addNew( array $dt ) 
		{	
			$sql = "INSERT INTO $this->table( `full_name`, `state`, `phone_num`, `email`, `username`, `password`, `passport`, `gender` ) VALUES ( ?, ?, ?, ?, ?, ?, ?, ? )";
			$res = $this->runQuery( $sql, $dt );
			
			// checking result 
			if ( $res ) 
			{
	      	return $res;
	    	}
		}

	   function getById( array $dt )
	   {
			$sql = "SELECT * FROM $this->table WHERE id = ?";
			$res = $this->fetchData( $sql, $dt );

			//checking result 
			if ( $res ) 
			{
			 	return $res;
		   }
	   }
	   
		function getByUsername( array $dt )
	   {
			$sql = "SELECT * FROM $this->table WHERE username = ?";
			$res = $this->fetchData( $sql, $dt );

			//checking result 
			if ( $res ) 
			{
			 	return $res;
		   }
	   }

		function getAgent( array $dt )
	   {
			$sql = "SELECT * FROM $this->table ";
			$res = $this->fetchAllData( $sql, $dt );

			//checking result 
			if ( $res ) 
			{
			 	return $res;
		   }
	   }


	}

?>