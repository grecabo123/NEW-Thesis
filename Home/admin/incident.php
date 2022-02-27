<?php  

	include '../connector/connect.php';
	$query = "SELECT Incident_Type, count(*) as total from incident_report GROUP BY Incident_Type";
	$result_i = mysqli_query($conn,$query);
	
?>