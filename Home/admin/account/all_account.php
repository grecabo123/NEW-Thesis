<?php  

	include '../../connector/connect.php';
	
	if (isset($_POST['search'])) {
		$id = mysqli_real_escape_string($conn,$_POST['id']);


		$search_all = "SELECT *from tbl_business WHERE tbl_business_id = $id";

		$resul_val =[];

		$result = mysqli_query($conn,$search_all);
		if (mysqli_num_rows($result) > 0) {
			foreach ($result as $data) {
			    array_push($resul_val, $data);
			}
			header("Content-type: application/json");
			echo json_encode($resul_val);
		}

	}


?>	