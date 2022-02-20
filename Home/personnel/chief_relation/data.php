<?php  

	include '../../connector/connect.php';



		$all = "SELECT *from tbl_client_info JOIN tbl_service_type ON client_info_id = tbl_info_fk WHERE fca = 'Done' AND fcca ='Paid'";

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