<?php
	#   Author of the script
	#   Name: Ezra Adamu
	#   Email : ezra00100@gmail.com
	#   Date created: 17/08/2022 
	#   Date modified: 17/08/2022    

	include_once( 'App.php' );
	include_once( 'Encryption.php' );

	class FederalExco 
	{
		//using Namespaces
		use App {
      	App::__construct as private __appConst;
    	}

    	use Encryption;

		protected $table = '';
		const DB_TABLE = 'federal_excos';

		function __construct()
	 	{
	 		$this->__appConst();
	 		$this->table = self::DB_TABLE;
	 	}

		function getLoggedExco()
		{
			$exco_id = '';
				
			if ( isset( $_COOKIE[ 'federal_exco_id' ] ) ) 
			{
				$exco_id = $_COOKIE[ 'federal_exco_id' ];
			}

			return $exco_id;
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

		function updateById( array $dt ) 
		{	
			$sql = "UPDATE $this->table SET `first_name` = ?,`last_name`= ?,`email`= ?,`phone_number`= ?,`alt_phone_num`= ?,`gender`= ?,`state`= ?,`lga`= ?,`passport`= ? WHERE id = ?";

			$res = $this->runQuery_2( $sql, $dt ); 

			//checking result 
			if ( $res ) 
			{
	      	return $res;
	    	}
		}

	}

?>