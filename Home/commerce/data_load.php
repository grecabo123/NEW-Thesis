<?php  

	include '../connector/connect.php';


	session_start();

	$id_fk =  $_SESSION['user_id'];

		$all = "SELECT *FROM tbl_service_type JOIN tbl_business ON tbl_service_type.tbl_bs_fk = tbl_business.tbl_business_id WHERE tbl_business_id = $id_fk having fca ='payment_view' OR fca ='Payment'";

		$result_val = [];
		$result_q = mysqli_query($conn,$all);
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