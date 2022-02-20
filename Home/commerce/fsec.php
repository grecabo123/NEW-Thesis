<?php  

	require '../connector/connect.php';
	
	  session_start();

  	  $fk = $_SESSION['user_id'];
	
	$permit = mysqli_real_escape_string($conn,$_POST['permit']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$establisment = mysqli_real_escape_string($conn,$_POST['establisment']);
	$purpose_fsec = mysqli_real_escape_string($conn,$_POST['purpose_fsec']);
	$contact = mysqli_real_escape_string($conn,$_POST['contact']);
  	$name_person = mysqli_real_escape_string($conn,$_POST['name_person']);

	// echo $permit."\n".$contact_num."\n";

	$directory = "Files/";

	// file name
	$permit_num1 = $_FILES['building']['name'];
	$permit_num2 = $_FILES['file_building']['name'];
	$permit_num3 = $_FILES['OR']['name'];
  	$permit_num4 = $_FILES['voltage']['name'];

	// file goes to the directory
	$building_file = $directory.basename($_FILES['building']['name']);
	$file_building_file = $directory.basename($_FILES['file_building']['name']);
	$OR_file = $directory.basename($_FILES['OR']['name']);
  	$voltage_file = $directory.basename($_FILES['voltage']['name']);

	$building = strtolower(pathinfo($building_file,PATHINFO_EXTENSION));
	$file_building = strtolower(pathinfo($file_building_file,PATHINFO_EXTENSION));
	$newfilename_or = strtolower(pathinfo($OR_file,PATHINFO_EXTENSION));
  	$voltage = strtolower(pathinfo($voltage_file,PATHINFO_EXTENSION));


	$newfilename = $directory.$permit_num1;
	$newfilename_building = $directory.$permit_num2;
	$newfilename_or = $directory.$permit_num3;
  	$newfilename_voltalge = $directory.$permit_num4;


	move_uploaded_file($_FILES["building"]["tmp_name"],$newfilename);
	move_uploaded_file($_FILES["file_building"]["tmp_name"],$newfilename_building);
	move_uploaded_file($_FILES["OR"]["tmp_name"],$newfilename_or);
  	move_uploaded_file($_FILES["voltage"]["tmp_name"],$newfilename_voltalge);

	
	$reference_id = uniqid(rand(100,999));

	$num = rand(100,999);
	$num2 = rand(100,999);
	$queue = $num."".$num2;
	$remark = "pending";

	$sql = "INSERT INTO tbl_client_info(business_owner,email,business_name,contact_number,business_fk) VALUES('$name_person','$email','$establisment','$contact',$fk)";
	if (mysqli_query($conn,$sql) === TRUE) {
		$fk_id = mysqli_insert_id($conn);
		$data = "INSERT INTO tbl_service_type(service_type,business_permit,insurance_policy,bfp_or,endorsement,building_completion,electrical_completion,fsec_certificate,building_specification,bill_material,voltage_circuit,reference_id,queue,date_register,status_cro,fca,fcca,fire_marshal,tbl_info_fk,tbl_bs_fk) VALUES ('$permit',null,null,'$permit_num3',null,null,null,null,'$permit_num1','$permit_num2','$permit_num3','$reference_id',$queue,NOW(),'$remark',null,null,null,$fk_id,$fk)";

		if (mysqli_query($conn,$data) === TRUE) {
			echo "Yes";
		}
		else{
			echo "No";
		}
	}



?>