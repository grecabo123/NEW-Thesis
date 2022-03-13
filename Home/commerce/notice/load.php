<?php  


	include "../../connector/connect.php";

	session_start();

	$id = $_SESSION['uniq_id'];

	$search = "SELECT *FROM tbl_inspection_info WHERE tbl_service_fk = $id order by date_delivered_fcca DESC";


	$result_val = [];
	$result_q = mysqli_query($conn,$search);
	if (mysqli_num_rows($result_q) > 0) {
		foreach ($result_q as $value) {
		    array_push($result_val,$value);
		}
		header("Content-type: application/json");
		echo json_encode($result_val);

	}
	else{
		echo 2;
	}


?>