<?php  


	include '../../connector/connect.php';

	if (isset($_POST['search'])) {
		
		$id = mysqli_real_escape_string($conn,$_POST['id']);


		$sql ="SELECT *FROM tbl_service_type WHERE tbl_service_id = $id";

		$result = mysqli_query($conn,$sql);

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
			    $uniq_id = $row['tbl_service_id'];
			    session_start();
			    $_SESSION['uniq_id'] = $uniq_id;
			    echo 1;
			    break;
			}
		}

	}
	else if (isset($_POST['search_c'])) {
		$id = mysqli_real_escape_string($conn,$_POST['id']);


		$sql ="SELECT *FROM tbl_service_type WHERE tbl_service_id = $id";

		$result = mysqli_query($conn,$sql);

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
			    $uniq_id = $row['tbl_service_id'];
			    session_start();
			    $_SESSION['uniq_id'] = $uniq_id;
			    echo 1;
			    break;
			}
		}
	}



?>