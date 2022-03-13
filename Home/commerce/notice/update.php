<?php  

	
	include "../../connector/connect.php";

	// files
	$permit_num1 = $_FILES['file_payment']['name'];

	

	$id = mysqli_real_escape_string($conn,$_POST['id']);

	$directory = "../Payment/";

	$newfilename = $directory.$permit_num1;
	move_uploaded_file($_FILES["file_payment"]["tmp_name"],$newfilename);

	$update = "UPDATE tbl_service_type as service JOIN tbl_inspection_info as inspection ON service.tbl_service_id = inspection.tbl_service_fk SET service.inspection ='pending',service.fcca='pending', service.date_register=CURRENT_TIMESTAMP,inspection.correction_fee='$permit_num1' WHERE service.tbl_service_id = $id";

	if (mysqli_query($conn,$update) === TRUE) {
		echo 1;
	}

?>