<?php  

	
	include '../../connector/connect.php';


	$sql = "SELECT *from tbl_report WHERE type_of_report = 'Incident' AND status ='pending'";

	$result = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);

	$data = array(
		// 'notification'	=> $output,
		'unseen_notification'	=> $count
	);
	echo json_encode($data);





?>