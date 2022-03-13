<?php  


	include '../../connector/connect.php';

	if (isset($_POST['update'])) {
		$service_id = mysqli_real_escape_string($conn,$_POST['id']);
		$remark = "Paid";
		$done = "Done";

		$update = "UPDATE tbl_service_type SET fcca ='$remark', fca ='$done',inspection='N/A' WHERE tbl_service_id = $service_id";

		if (mysqli_query($conn,$update) === TRUE) {
			echo 1;
		}
	}
	else if (isset($_POST['update_fsic'])) {
		$service_id = mysqli_real_escape_string($conn,$_POST['id']);
		$remark = "Paid";
		$done = "Done";

		$num1 = rand(100,999);
		$num2 = rand(100,999);
		$num3 = rand(100,999);

		$ref = $num1."".$num2."".$num3;

		$update = "UPDATE tbl_service_type SET fcca ='$remark', fca ='$done',inspection='pending' WHERE tbl_service_id = $service_id";

		if (mysqli_query($conn,$update) === TRUE) {
			$insert = "INSERT INTO tbl_inspection_info (inspection_no,type_buidling,date_issued,date_inspection,nature_of_ion,file_upload,tbl_service_fk,date_delivered_fcca) VALUES($ref,'','','','','',$service_id,NOW())";
			if (mysqli_query($conn,$insert) === TRUE) {
				echo 1;
			}
		}
	}
	else if (isset($_POST['update_occupancy'])) {
		$service_id = mysqli_real_escape_string($conn,$_POST['id']);
		$remark = "Paid";
		$done = "Done";

		$num1 = rand(100,999);
		$num2 = rand(100,999);
		$num3 = rand(100,999);

		$ref = $num1."".$num2."".$num3;

		$update = "UPDATE tbl_service_type SET fcca ='$remark', fca ='$done',inspection='pending' WHERE tbl_service_id = $service_id";

		if (mysqli_query($conn,$update) === TRUE) {
			$insert = "INSERT INTO tbl_inspection_info (inspection_no,type_buidling,date_issued,date_inspection,nature_of_ion,file_upload,tbl_service_fk,date_delivered_fcca) VALUES($ref,'','','','','',$service_id,NOW())";
			if (mysqli_query($conn,$insert) === TRUE) {
				echo 1;
			}
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