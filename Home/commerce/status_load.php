<?php  

	
	include '../connector/connect.php';

	session_start();

	$id =  $_SESSION['user_id'];


	$sql = "SELECT *FROM tbl_service_type JOIN tbl_business ON tbl_bs_fk = tbl_business_id WHERE status_cro in ('lacking','pending') AND tbl_bs_fk =$id";

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
		echo 2;
	}


?>