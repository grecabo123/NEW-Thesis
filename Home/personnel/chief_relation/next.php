<?php  

	include '../../connector/connect.php';

	// if (isset($_POST['dis'])) {
		$sql = "SELECT *From tbl_service_type JOIN tbl_client_info ON tbl_info_fk = client_info_id WHERE status_cro = 'pending' order by date_register ASC LIMIT 1";

		$result = mysqli_query($conn,$sql);
		$output = "";

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
			    $output .='
                        <span class="text-dark me-3 fs-5 fw-bold" id="data_que">'.$row['queue'].'</span>
			    ';
			}
		}
		else{
			$output .= '
				
			';
		}
	// }
		$query = "SELECT count(*) as total from tbl_service_type WHERE status_cro = 'pending'";
		$result_1 = mysqli_query($conn,$query);
		while ($row = mysqli_fetch_assoc($result_1)) {
		    $total = $row['total'];
		    // break;
		}
		$data = array(
			'notification_pop'	=> $output,
			'unseen_notification'	=> $total
		);
		echo json_encode($data);
		// echo $count;
	// }

?>