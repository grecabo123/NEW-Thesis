<?php  

	include '../../connector/connect.php';

	$sql_hazard = "SELECT report.tbl_report_id,report.date_report,report.Incident_type,report.account_type,report.type_of_report,acc.account_fk,report.status from tbl_report as report JOIN tbl_report_account as acc ON acc.report_id = report.report_account_fk WHERE report.account_type ='Business'";

	$result_val = [];
		$result_q = mysqli_query($conn,$sql_hazard);
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