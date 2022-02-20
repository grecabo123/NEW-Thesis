<?php  


	include '../../connector/connect.php';

	if (isset($_POST['update'])) {
		$service_id = mysqli_real_escape_string($conn,$_POST['id']);

		

		$remark = "Paid";
		$done = "Done";

		$update = "UPDATE tbl_service_type SET fcca ='$remark', fca ='$done' WHERE tbl_service_id = $service_id";

		if (mysqli_query($conn,$update) === TRUE) {
			echo 1;
		}

	}


?>