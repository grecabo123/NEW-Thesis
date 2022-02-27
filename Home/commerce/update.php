<?php  



	include '../connector/connect.php';

	session_start();

	$id_fk =  $_SESSION['user_id'];

	$view = "payment_view";

	if (isset($_POST['update'])) {
		$num = mysqli_real_escape_string($conn,$_POST['num']);

		$sql = "UPDATE tbl_service_type SET fca = '$view' WHERE tbl_service_id =$num";

		if (mysqli_query($conn,$sql) === TRUE) {
			$search = "SELECT *from tbl_payment JOIN tbl_client_info ON tbl_payment.tbl_client_fk = tbl_client_info.client_info_id JOIN tbl_service_type ON tbl_service_type.tbl_info_fk = tbl_client_info.client_info_id WHERE tbl_service_id = $num AND tbl_business_fk = $id_fk";
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
		}
	}
	


?>