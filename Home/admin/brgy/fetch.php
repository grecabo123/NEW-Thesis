<?php  

	include '../../connector/connect.php';

	if (isset($_POST['search'])) {
		$brgy = mysqli_real_escape_string($conn,$_POST['brgy_data']);

		$sql = "SELECT *FROM barangay_coordinates WHERE Barangay_list = '$brgy'";

		$resul_val =[];

		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) > 0) {
			foreach ($result as $data) {
			    array_push($resul_val, $data);
			}
			header("Content-type: application/json");
			echo json_encode($resul_val);
		}
	}


?>