<?php  

	include "../connector/connect.php";
	$query = "SELECT Incident_Type, count(*) as total from tbl_report WHERE Incident_type is not null GROUP BY Incident_Type";
	$result_i = mysqli_query($conn,$query);
	
?>

