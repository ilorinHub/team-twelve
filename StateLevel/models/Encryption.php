<?php
   #   Author of the script
   #   Name: 
   #   Email : 
   #   Date created: 24/01/2023
   #   Date modified: 25/01/2023
	
	trait Encryption 
  {
      // Encryption Function
      function encPword( $data )
      {
        return password_hash( $data , PASSWORD_DEFAULT );
      }

      // Decryption Function
      function decPword( $p, $hashed )
      {
        return password_verify( $p, $hashed );
      }

      // encrypt password with md5
      function encryptMd5( $pword ) 
      {
        $enc = md5( $pword );
        return $enc;
      }
      
  }
?>