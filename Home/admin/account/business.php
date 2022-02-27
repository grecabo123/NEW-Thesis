<?php  

	
	include '../../connector/connect.php';

    $sql = "SELECT *FROM tbl_business";

    $result_val = [];
		$result_q = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result_q) > 0) {
			foreach ($result_q as $value) {
			    array_push($result_val,$value);
			    // break;

			}
			header("Content-type: application/json");
			echo json_encode($result_val);

		}

?>