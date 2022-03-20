<?php  


	include "../../../connector/connect.php";

	if (isset($_POST['counting'])) {
		
		$from = mysqli_real_escape_string($conn,$_POST['from']);
		$to = mysqli_real_escape_string($conn,$_POST['to']);

		$start =  $from." "."00:00:00";
		$end = $to." "."23:59:59";

		$query = "SELECT date_report as date, count(*) as total FROM tbl_report WHERE account_type='Business' AND date_report between('$start') AND('$end')";

		$result_1 = mysqli_query($conn,$query);
		$data = mysqli_fetch_assoc($result_1);
		$count = $data['total'];


		$data = array(
			'notification' => $count,
			
		);
		echo json_encode($data);
	}



?>