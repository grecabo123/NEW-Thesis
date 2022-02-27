<?php  


	$dbserver = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbuse = "final_bfp";

	$conn = mysqli_connect($dbserver,$dbuser,$dbpass,$dbuse);

	if (!$conn) {
		die('Failed To Connect'.mysqli_error());
	}
	
	

?>