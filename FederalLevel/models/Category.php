<?php
	#   Author of the script
	#   Name:
	#   Email : 
	#   Date created: 24/01/2023 
	#   Date modified: 24/01/2023    

	include_once( 'App.php' );
	include_once( 'Encryption.php' );

	class Category
	{
		//using Namespaces
		use App {
      	App::__construct as private __appConst;
    	}

    	use Encryption;

		protected $table = '';
		const DB_TABLE = 'categories';

		function __construct()
	 	{
	 		$this->__appConst();
	 		$this->table = self::DB_TABLE;
	 	}

		function addNew( array $dt ) 
		{	
			$sql = "INSERT INTO $this->table( `category`, `price` ) VALUES ( ?, ? )";
			$res = $this->runQuery( $sql, $dt );
			
			// checking result 
			if ( $res ) 
			{
	      		return $res;
	    	}
		}

		function getByCategory( array $dt )
	   {
			$sql = "SELECT * FROM $this->table WHERE  category = ?";
			$res = $this->fetchData( $sql, $dt );

			//checking result 
			if ( $res ) 
			{	
			 	return $res;
		   }
	   }

	   function getAllCategories( array $dt )
	   {
			$sql = "SELECT * FROM $this->table";
			$res = $this->fetchAllData( $sql, $dt );

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

	}

?>