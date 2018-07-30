<?php  
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db   = 'projectbpwl8';

	$conn = new mysqli ($host,$user,$pass,$db);

	if($conn -> connect_error){
		echo "Gagal".connect_error;
	}
?>