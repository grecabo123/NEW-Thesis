<?php  
	

	include '../../connector/connect.php';

	if (isset($_POST['find'])) {
		
		$id = mysqli_real_escape_string($conn,$_POST['id']);

		$sql = "SELECT *FROM tbl_service_type JOIN tbl_client_info ON client_info_id = tbl_info_fk JOIN tbl_inspection_info ON tbl_service_fk = tbl_service_id WHERE tbl_service_id = $id";

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
		else{
			echo 2;
		}
	}
	else if (isset($_POST['send_business'])) {
		$data_id = mysqli_real_escape_string($conn,$_POST['data_id']);
		$ion = mysqli_real_escape_string($conn,$_POST['ion']);
		$building = mysqli_real_escape_string($conn,$_POST['type_building']);


		$update = "UPDATE tbl_inspection_info as inspection JOIN tbl_service_type as service ON inspection.tbl_service_fk = service.tbl_service_id SET inspection.nature_of_ion='$ion',inspection.type_buidling='$building',service.inspection='On Process' WHERE inspection.tbl_inspection_id = $data_id";
		if (mysqli_query($conn,$update) === TRUE) {
			echo 1;
		}
	}
	else if (isset($_POST['find_data'])) {
		$id = mysqli_real_escape_string($conn,$_POST['id']);


		$sql = "SELECT *FROM tbl_service_type JOIN tbl_client_info ON client_info_id = tbl_info_fk JOIN tbl_inspection_info ON tbl_service_fk = tbl_service_id WHERE tbl_service_id = $id";

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
		else{
			echo 2;
		}

	}


?>