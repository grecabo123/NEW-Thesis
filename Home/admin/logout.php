<?php  

	session_start();
	$admin = $_SESSION['user'];
	session_unset();
	session_destroy();
	header("location: index");


?>