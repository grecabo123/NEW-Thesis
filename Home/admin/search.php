<?php  

	include '../connector/connect.php';


	if (isset($_POST['find'])) {
		
		$id = mysqli_real_escape_string($conn,$_POST['num']);


		$sql = "SELECT *FROM tbl_service_type WHERE tbl_service_id = $id";

		$result = mysqli_query($conn,$sql);

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
			    echo 2;
			    session_start();
			    $_SESSION['info'] = $row['tbl_service_id'];
				break;
			}

		}
		else{
			echo 0;
		}
		
	}

?>