<?php  
	
	include "../../connector/connect.php";
	$query = "SELECT hazard_type,count(*) as total ,account_type from tbl_report JOIN tbl_report_account  ON report_id = account_fk WHERE account_type ='Business' AND hazard_type is not null GROUP BY hazard_type;";
	$result_i = mysqli_query($conn,$query);

?>