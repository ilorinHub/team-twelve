<?php
	#   Author of the script
	#   Name:
	#   Email : 
	#   Date created: 24/01/2023 
	#   Date modified: 24/01/2023    

	include_once( 'App.php' );
	include_once( 'Encryption.php' );

	class User
	{
		//using Namespaces
		use App {
      	App::__construct as private __appConst;
    	}

    	use Encryption;

		protected $table = '';
		const DB_TABLE = 'users';

		function __construct()
	 	{
	 		$this->__appConst();
	 		$this->table = self::DB_TABLE;
	 	}

		function addNew( array $dt ) 
		{	
			$sql = "INSERT INTO $this->table( `full_name`, `email`, `phone_num`, `gender` ) VALUES ( ?, ?, ?, ? )";
			$res = $this->runQuery( $sql, $dt );
			
			// checking result 
			if ( $res ) 
			{
	      	return $res;
	    	}
		}

		function getByAllTableColumn( array $dt )
	   {
			$sql = "SELECT * FROM $this->table WHERE full_name = ? AND email = ? AND phone_num = ?";
			$res = $this->fetchData( $sql, $dt );

			//checking result 
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

		function updateById( array $dt ) 
		{	
			$sql = "UPDATE $this->table SET full_name = ?, email = ?, phone_num = ?, gender = ? WHERE id = ?";
			$res = $this->runQuery_2( $sql, $dt );

			//checking result 
			if ( $res ) 
			{
				return $res;
			}
		}


	}

?>