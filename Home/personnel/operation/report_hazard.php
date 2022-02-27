<?php  

	include '../../connector/connect.php';
	
	$sql_hazard = "SELECT *from tbl_report WHERE type_of_report = 'Hazard' AND status ='pending'";

	$result_hazard = mysqli_query($conn,$sql_hazard);
	$count_hazard = mysqli_num_rows($result_hazard);

	$data_hazard = array(
		// 'notification'	=> $output,
		'hazard_total'	=> $count_hazard
	);
	echo json_encode($data_hazard);



?>