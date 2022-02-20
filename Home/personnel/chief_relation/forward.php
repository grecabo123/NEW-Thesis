<?php  

	
	include '../../connector/connect.php';

	if (isset($_POST['update'])) {
		$num = mysqli_real_escape_string($conn,$_POST['num']);
		$remark = "pending";
		$search = "UPDATE tbl_service_type SET fca='OK',fcca='OK',fses='$remark',fire_marshal ='$remark' WHERE tbl_service_id = $num";
		
		if (mysqli_query($conn,$search) === TRUE) {
			echo 1;
		}
		else{
			echo 0;
		}
	}


?>