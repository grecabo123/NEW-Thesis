	<?php  


	include '../../connector/connect.php';

	if (isset($_POST['report_user'])) {
		
		$report_id = mysqli_real_escape_string($conn,$_POST['report_id']);
		$user_id = mysqli_real_escape_string($conn,$_POST['user_id']);

		$sql = "UPDATE tbl_report as report JOIN tbl_report_account as acc ON report.report_account_fk = acc.report_id SET report.status ='View' WHERE acc.account_fk =$user_id AND report.tbl_report_id =$report_id";

		if (mysqli_query($conn,$sql) === TRUE) {

			$view = "SELECT *from tbl_report JOIN tbl_report_account JOIN tbl_user WHERE account_fk = $user_id AND tbl_report_id = $report_id";
			$result_val = [];
			$result_q = mysqli_query($conn,$view);
			if (mysqli_num_rows($result_q) > 0) {
				foreach ($result_q as $value) {
				    array_push($result_val,$value);
				}
				header("Content-type: application/json");
				echo json_encode($result_val);
			}
		}
		else{
			echo 1;
		}
	}
	else if (isset($_POST['feedback'])) {

		$id = mysqli_real_escape_string($conn,$_POST['id']);

		$update = "UPDATE tbl_report SET status ='Feedback' WHERE tbl_report_id = $id";

		if (mysqli_query($conn,$update) === TRUE) {
			echo 1;
		}
	}
	else if (isset($_POST['feedback_business'])) {
		$id = mysqli_real_escape_string($conn,$_POST['business']);

		$update = "UPDATE tbl_report SET status ='Feedback' WHERE tbl_report_id = $id";

		if (mysqli_query($conn,$update) === TRUE) {
			echo 1;
		}
	}
	else if (isset($_POST['report_business'])) {
		
		$report_id = mysqli_real_escape_string($conn,$_POST['report_id']);
		$business_id = mysqli_real_escape_string($conn,$_POST['business_id']);


		$sql = "UPDATE tbl_report as report JOIN tbl_report_account as acc ON report.report_account_fk = acc.report_id SET report.status ='View' WHERE acc.account_fk =$business_id AND report.tbl_report_id =$report_id";

		if (mysqli_query($conn,$sql) === TRUE) {

			$view = "SELECT *from tbl_report JOIN tbl_report_account JOIN tbl_business WHERE account_fk = $business_id AND tbl_report_id = $report_id";
			$result_val = [];
			$result_q = mysqli_query($conn,$view);
			if (mysqli_num_rows($result_q) > 0) {
				foreach ($result_q as $value) {
				    array_push($result_val,$value);
				}
				header("Content-type: application/json");
				echo json_encode($result_val);
			}
		}
		else{
			echo 1;
		}
	}
	else if (isset($_POST['hazard_user'])) {
		

		$report_id = mysqli_real_escape_string($conn,$_POST['report_id']);
		$user_id = mysqli_real_escape_string($conn,$_POST['user_id']);

		$update = "UPDATE tbl_report SET status ='View' WHERE tbl_report_id = $report_id";

		if (mysqli_query($conn,$update) === TRUE) {
			$view = "SELECT *from tbl_report JOIN tbl_report_account JOIN tbl_user WHERE account_fk = $user_id AND tbl_report_id = $report_id";
			$result_val = [];
			$result_q = mysqli_query($conn,$view);
			if (mysqli_num_rows($result_q) > 0) {
				foreach ($result_q as $value) {
				    array_push($result_val,$value);
				}
				header("Content-type: application/json");
				echo json_encode($result_val);
			}
		}
	}
	else if (isset($_POST['user_hazard'])) {
		$id = mysqli_real_escape_string($conn,$_POST['id']);

		$update = "UPDATE tbl_report SET status ='Feedback' WHERE tbl_report_id = $id";

		if (mysqli_query($conn,$update) === TRUE) {
			echo 1;
		}
	}
	else if (isset($_POST['hazard_business'])) {

		$report_id = mysqli_real_escape_string($conn,$_POST['report_id']);
		$business_id = mysqli_real_escape_string($conn,$_POST['business_id']);

		$sql = "UPDATE tbl_report as report JOIN tbl_report_account as acc ON report.report_account_fk = acc.report_id SET report.status ='View' WHERE acc.account_fk =$business_id AND report.tbl_report_id =$report_id";

		if (mysqli_query($conn,$sql) === TRUE) {

			$view = "SELECT *from tbl_report JOIN tbl_report_account JOIN tbl_business WHERE account_fk = $business_id AND tbl_report_id = $report_id";
			$result_val = [];
			$result_q = mysqli_query($conn,$view);
			if (mysqli_num_rows($result_q) > 0) {
				foreach ($result_q as $value) {
				    array_push($result_val,$value);
				}
				header("Content-type: application/json");
				echo json_encode($result_val);
			}
		}
		else{
			echo 1;
		}
	}
	else if (isset($_POST['business_feedback'])) {
		$id = mysqli_real_escape_string($conn,$_POST['id']);

		$update = "UPDATE tbl_report SET status ='Feedback' WHERE tbl_report_id = $id";

		if (mysqli_query($conn,$update) === TRUE) {
			echo 1;
		}
	}


?>