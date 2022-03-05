<?php  


	include '../../connector/connect.php';
	session_start();
	$id = $_SESSION['info'];



	$search = "SELECT *from tbl_transaction where transaction_business_fk = $id order by date_upload DESC";

	$result_val = [];
	$result_q = mysqli_query($conn,$search);
	if (mysqli_num_rows($result_q) > 0) {
		foreach ($result_q as $value) {
		    array_push($result_val,$value);
		    // break;

		}
		header("Content-type: application/json");
		echo json_encode($result_val);

	}
	else{
		echo 2;
	}


?>