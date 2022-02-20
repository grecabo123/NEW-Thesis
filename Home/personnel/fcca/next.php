<?php  

	include '../../connector/connect.php';

	// if (isset($_POST['dis'])) {
		$sql = "SELECT *From tbl_service_type JOIN tbl_client_info ON tbl_info_fk = client_info_id WHERE fca = 'On Payment' order by date_register ASC LIMIT 1";

		$result = mysqli_query($conn,$sql);
		$output = "";

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
			    $output .='
                        <span class="text-dark  fs-5 fw-bold text-center p-3" id="data_que">'.$row['queue'].'</span>
			    ';
			}
		}
		else{
			$output .= '
				
			';
		}
		$data = array(
			'notification_pop'	=> $output,
		);
		echo json_encode($data);
		// echo $count;
	// }

?>