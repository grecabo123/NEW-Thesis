<?php  

	
	include "../../connector/connect.php";

	$query = "SELECT service_type,count(*) as total from tbl_service_type group by service_type";
	$result_i = mysqli_query($conn,$query);


?>