<?php  

	
	include '../../connector/connect.php';

	$sql = "SELECT *FROM tbl_service_type JOIN tbl_client_info ON tbl_client_info.client_info_id = tbl_service_type.tbl_info_fk WHERE status_cro='OK' AND fca='OK' AND fcca='OK' AND fses='OK' AND fire_marshal='OK'";

	$result_val = [];
	$result_q = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result_q) > 0) {
		foreach ($result_q as $value) {
		    array_push($result_val,$value);
		}
		header("Content-type: application/json");
		echo json_encode($result_val);
	}
	else{
		echo $return ="<h3>No Data </h3>";
	}




?>