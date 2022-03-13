<?php  

	include '../../connector/connect.php';

	// files
	$permit_num1 = $_FILES['pdf_file']['name'];
	$permit_num2 = $_FILES['file_inspection']['name'];

	// data information
	$client_id = mysqli_real_escape_string($conn,$_POST['id']);
	$status = mysqli_real_escape_string($conn,$_POST['status']);


	$directory = "Record/";

	$newfilename = $directory.$permit_num1;
	$newfilename2 = $directory.$permit_num2;


	move_uploaded_file($_FILES["pdf_file"]["tmp_name"],$newfilename);
	move_uploaded_file($_FILES["file_inspection"]["tmp_name"],$newfilename2);

	$update = "UPDATE tbl_inspection_info as inspection INNER JOIN tbl_service_type as service ON inspection.tbl_service_fk = service.tbl_service_id SET inspection.file_upload='$permit_num1',inspection.inspection_order='$permit_num2',service.inspection='$status' WHERE service.tbl_service_id = $client_id";


	if (mysqli_query($conn,$update) === TRUE) {
		echo 1;
	}



?>