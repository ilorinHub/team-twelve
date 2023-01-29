<?php
	#Name: Adedokun Julius Ayobami
	#Email : adedokunjuliusayobami@gmail.com
	#Date Created : 11_10_2022
	#Date Modified : 11_10_2022

  session_destroy();
  setcookie( 'access', '', time() - 5000 );
  header('location:login', true, 301 );

?>