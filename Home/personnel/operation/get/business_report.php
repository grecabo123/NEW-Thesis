<?php  
	
	include "../../connector/connect.php";
	$query = "SELECT Incident_type,count(*) as total ,account_type from tbl_report JOIN tbl_report_account  ON report_id = account_fk WHERE account_type ='Business' AND Incident_type is not null GROUP BY Incident_Type;";
	$result_i = mysqli_query($conn,$query);

?>