<?php
	#   Author of the script
	#   Name:
	#   Email : 
	#   Date created: 24/01/2023 
	#   Date modified: 24/01/2023    

	include_once( 'App.php' );
	include_once( 'Encryption.php' );

	class AccountInfo
	{
		//using Namespaces
		use App {
      	App::__construct as private __appConst;
    	}

    	use Encryption;

		protected $table = '';
		const DB_TABLE = 'account_infos';

		function __construct()
	 	{
	 		$this->__appConst();
	 		$this->table = self::DB_TABLE;
	 	}

		function addNew( array $dt ) 
		{	
			$sql = "INSERT INTO $this->table( `username`, `password`, `user_id` ) VALUES ( ?, ?, ? )";
			$res = $this->runQuery( $sql, $dt );
			
			// checking result 
			if ( $res ) 
			{
	      	return $res;
	    	}
		}

		function getLoggedAcct()
		{
			$acct_id = '';
				
			if ( isset( $_COOKIE[ 'acct_id' ] ) ) 
			{
				$acct_id = $_COOKIE[ 'acct_id' ];
			}

			return $acct_id;
		}

		function getLogin( array $dt ) 
		{
			$sql = "SELECT * FROM $this->table WHERE username = ?";
			$res = $this->fetchData( $sql, $dt );

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


		function updatePwordById( array $dt ) 
		{	
			$sql = "UPDATE $this->table SET password = ? WHERE id = ?";
			$res = $this->runQuery_2( $sql, $dt );

			//checking result 
			if ( $res ) 
			{
				return $res;
			}
		}



	}

?>