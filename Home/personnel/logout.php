<?php   
	session_start();
	unset($_SESSION['personnel']); 
	header("location: index"); 
	exit();
?>