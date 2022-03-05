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
		$occu_id = mysqli_real_escape_string($conn,$_POST['id']);


		$update_occu = "SELECT *FROM tbl_service_type WHERE tbl_service_id = $occu_id";

		$result = mysqli_query($conn,$update_occu);

		while ($row = mysqli_fetch_assoc($result)) {
		    $num = $row['tbl_service_id'];
		    $queue =$row['queue'];
		    echo 1;
		    session_start();
		    $_SESSION['occu_id'] = $row['tbl_service_id'];
		    break;
		}
	}
	else if (isset($_POST['fsec_pay'])) {
		$fsec_id = mysqli_real_escape_string($conn,$_POST['id']);


		$update_occu = "SELECT *FROM tbl_service_type WHERE tbl_service_id = $fsec_id";

		$result = mysqli_query($conn,$update_occu);

		while ($row = mysqli_fetch_assoc($result)) {
		    $num = $row['tbl_service_id'];
		    $queue =$row['queue'];
		    echo 1;
		    session_start();
		    $_SESSION['fsec_id'] = $row['tbl_service_id'];
		    break;
		}
	}
	else if (isset($_POST['business_pay'])) {
		$business_id = mysqli_real_escape_string($conn,$_POST['id']);
		$update_occu = "SELECT *FROM tbl_service_type WHERE tbl_service_id = $business_id";

		$result = mysqli_query($conn,$update_occu);

		while ($row = mysqli_fetch_assoc($result)) {
		    $num = $row['tbl_service_id'];
		    $queue =$row['queue'];
		    echo 1;
		    session_start();
		    $_SESSION['business_id'] = $row['tbl_service_id'];
		    break;
		}
	}

?>