<?php  
	
	include '../connector/connect.php';

	session_start();

	$id =  $_SESSION['user_id'];
	
		$query = "SELECT *from tbl_service_type WHERE fca = 'Payment' AND tbl_bs_fk = $id";
		$result_1 = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result_1);
		
		$data = array(
			// 'notification'	=> $output,
			'unseen_notification'	=> $count
		);
		echo json_encode($data);

	// }

?>