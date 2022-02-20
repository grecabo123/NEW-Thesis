<?php  


	include "../connector/connect.php";

	session_start();

	if (isset($_POST['hazard'])) {

		$id = $_SESSION['user_id'];
		
		$type = "Hazard";

		$street = mysqli_real_escape_string($conn,$_POST['str']);
		$brgy = mysqli_real_escape_string($conn,$_POST['brgy']);
		$landmark = mysqli_real_escape_string($conn,$_POST['landmark']);

		$acc = "INSERT INTO tbl_report_account(account_fk) VALUES ($id)";
		if (mysqli_query($conn,$acc) === TRUE) {
			$last_id = mysqli_insert_id($conn);
			$hazard = "INSERT INTO tbl_report(type_of_report,Incident_type,brgy,landmark,date_report,status,account_type,report_account_fk) VALUES('$type',null,'$brgy','$landmark',NOW(),'pending','User',$last_id)";

			if (mysqli_query($conn,$hazard) === TRUE) {
				echo "Done";
			}
		}
	}
	else if(isset($_POST['sending'])){

		$id = $_SESSION['user_id'];
		$type = "Incident";

		$street = mysqli_real_escape_string($conn,$_POST['street']);
		$brgy = mysqli_real_escape_string($conn,$_POST['brgy']);
		$Incident_type = mysqli_real_escape_string($conn,$_POST['type']);
		$land = mysqli_real_escape_string($conn,$_POST['land']);


		$acc_inci = "INSERT INTO tbl_report_account(account_fk) VALUES ($id)";

		if (mysqli_query($conn,$acc_inci) === TRUE) {
			$last_id = mysqli_insert_id($conn);
			$Incident_sql = "INSERT INTO tbl_report(type_of_report,Incident_type,brgy,landmark,date_report,status,account_type,report_account_fk) VALUES('$type','$Incident_type','$brgy','$land',NOW(),'pending','User',$last_id)";

			if (mysqli_query($conn,$Incident_sql) === TRUE) {
				echo 1;
			}
		}

	}


?>