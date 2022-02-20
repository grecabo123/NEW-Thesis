<?php  


	include '../../connector/connect.php';


	if (isset($_POST['update'])) {
		
		$num = mysqli_real_escape_string($conn,$_POST['num']);

		$sql = "UPDATE tbl_service_type SET fses='OK' WHERE tbl_service_id = $num";

		if (mysqli_query($conn,$sql) === TRUE) {
			echo 1;
		}
	}

?>