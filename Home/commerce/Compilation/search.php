<?php  

	require '../../connector/connect.php';

	if (isset($_POST['search_fsic'])) {
		$id = mysqli_real_escape_string($conn,$_POST['num']);

		$sql = "SELECT *FROM tbl_service_type WHERE tbl_service_id = $id";

		$result = mysqli_query($conn,$sql);

		while ($row = mysqli_fetch_assoc($result)) {
		    $num = $row['tbl_service_id'];
		    $queue =$row['queue'];
		    echo 1;
		    session_start();
		    $_SESSION['id_num'] = $row['tbl_service_id'];
		    break;
		}
	}
	else if (isset($_POST['search_fsec'])) {
		$num_fsec = mysqli_real_escape_string($conn,$_POST['num_fsec']);


		$sql_fsec = "SELECT *FROM tbl_service_type WHERE tbl_service_id = $num_fsec";

		$result = mysqli_query($conn,$sql_fsec);

		while ($row = mysqli_fetch_assoc($result)) {
		    $num = $row['tbl_service_id'];
		    $queue =$row['queue'];
		    echo 1;
		    session_start();
		    $_SESSION['fsec_num'] = $row['tbl_service_id'];
		    break;
		}
	}
	else if (isset($_POST['search_occu'])) {
		$num_occu = mysqli_real_escape_string($conn,$_POST['num_occu']);


		$sql_fsec = "SELECT *FROM tbl_service_type WHERE tbl_service_id = $num_occu";

		$result = mysqli_query($conn,$sql_fsec);

		while ($row = mysqli_fetch_assoc($result)) {
		    $num = $row['tbl_service_id'];
		    $queue =$row['queue'];
		    echo 1;
		    session_start();
		    $_SESSION['occupancy_num'] = $row['tbl_service_id'];
		    break;
		}
	}
	else if (isset($_POST['occupancy_pay'])) {
		$occu_id = mysqli_real_escape_string($conn,$_POST['num_occu']);


		$id = "SELECT *FROM tbl_service_type WHERE tbl_service_id = $occu_id";

		$result = mysqli_query($conn,$sql_fsec);

		while ($row = mysqli_fetch_assoc($result)) {
		    $num = $row['tbl_service_id'];
		    $queue =$row['queue'];
		    echo 1;
		    session_start();
		    $_SESSION['occu_id'] = $row['tbl_service_id'];
		    break;
		}
	}

?>