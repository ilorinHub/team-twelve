<?php
	#   Author of the script
	#   Name:
	#   Email : 
	#   Date created: 24/01/2023 
	#   Date modified: 24/01/2023    

	include_once( 'App.php' );
	include_once( 'Encryption.php' );

	class Organisation
	{
		//using Namespaces
		use App {
      	App::__construct as private __appConst;
    	}

    	use Encryption;

		protected $table = '';
		const DB_TABLE = 'organisations';

		function __construct()
	 	{
	 		$this->__appConst();
	 		$this->table = self::DB_TABLE;
	 	}

		function addNew( array $dt ) 
		{	
			$sql = "INSERT INTO $this->table( `name`, `email`, `phone_no`, `logo`, `address`, `acct_id` ) VALUES ( ?, ?, ?, ?, ?, ? )";
			$res = $this->runQuery( $sql, $dt );
			
			// checking result 
			if ( $res ) 
			{
	      	return $res;
	    	}
		}

		function getByAccountId( array $dt )
	   {
			$sql = "SELECT * FROM $this->table WHERE acct_id = ?";
			$res = $this->fetchData( $sql, $dt );

			//checking result 
			if ( $res ) 
			{
			 	return $res;
		   }
	   }

		function updateByAcctId( array $dt ) 
		{	
			$sql = "UPDATE $this->table SET name = ?, email = ?, phone_no = ?, logo = ?, address = ? WHERE acct_id = ?";
			$res = $this->runQuery_2( $sql, $dt );

			//checking result 
			if ( $res ) 
			{
				return $res;
			}
		}


	}

?>