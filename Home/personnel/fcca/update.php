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
	else if (isset($_POST['send_msg'])) {

		$id = mysqli_real_escape_string($conn,$_POST['id']);
		$txt = mysqli_real_escape_string($conn,$_POST['txt']);

		$update_sql = "INSERT INTO tbl_fcca_msg (message,tbl_msg_fk,date_msg) VALUES('$txt',$id,NOW())";
		if (mysqli_query($conn,$update_sql) === TRUE) {
			
			$update_status = "UPDATE tbl_service_type SET fcca ='lacking' WHERE tbl_service_id = $id";

			if (mysqli_query($conn,$update_status) === TRUE) {
				echo 1;
			}
		}
	}


?>