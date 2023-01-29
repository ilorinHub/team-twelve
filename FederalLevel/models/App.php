<?php 
	#   Author of the script
	#   Name: Ezra Adamu
	#   Email : ezra00100@gmail.com
	#   Date created: 23/07/2022 
	#   Date modified: 24/07/2022   
	
	trait App
	{
		private $con;

		// Initializing Database
		function __construct( $access = false )
		{
			$this->con = $this->connect( $access );
		}

		function connect( $access )
		{
			$host = 'localhost';
			$user = 'root';
			$pword = '';
			$db = 'revenue_system';

			if ( $access && isset( $_SESSION['db_name'] ) ) 
			{
				$db = $_SESSION['db_name'];
			}
			
			try
			{
				$this->con = new PDO( "mysql:host=$host;dbname=$db", $user, $pword );
				$this->con->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
	       	$this->con->setAttribute( PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true );
	        	$this->con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				//echo 'connected';
				return $this->con;
			} 
			catch ( PDOException $e )
			{
				echo 'There was an error! unable to connect to DB<br/>';// . $e->getMessage();
				return false;
			}	 
		}

		function runQuery( $sql, $data = [] )
		{
			$query = $this->con->prepare( $sql );
			$row = $query->execute( $data );

	    	// checking result 
			if ( $row )
			{
				return true;
			}
		}

		function runQuery_2( $sql, $data = [] )
		{
			$query = $this->con->prepare( $sql );
			$query->execute( $data );
			
	    	// checking result 
			if ( $query->rowCount() > 0 ) 
			{
				return true;
			}
		}

		function fetchData( $sql, $data = [] )
		{
			$query = $this->con->prepare( $sql );
			$query->execute( $data );

	    	// checking result 
			if ( $row = $query->fetch( PDO::FETCH_ASSOC ) ) 
			{
				return $row;
			}
		}

		function fetchAllData( $sql, $data = [] )
		{ 
			$query = $this->con->prepare( $sql );
			$row = $query->execute( $data );
			$dt = [];

	    	// checking result 
			while ( $row = $query->fetch( PDO::FETCH_ASSOC ) )
			{
				array_push( $dt, $row );
			}

			return $dt;
		}

	}
?>