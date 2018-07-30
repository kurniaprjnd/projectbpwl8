<?php 	
	
	session_start();
	
	unset($_SESSION['nama']);		

 ?>

 <script> 
 	alert('Logout Berhasil !');
 	window.location = '../';
</script>