<?php  

	include "../connector/connect.php";


	$query = "SELECT service_type, count(*) as total from tbl_service_type GROUP BY service_type";
	$result = mysqli_query($conn,$query);



?>