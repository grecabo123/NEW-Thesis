<?php  

	require '../../connector/connect.php';
	
	

  
	$id = mysqli_real_escape_string($conn,$_POST['num_fsec']);
	$permit = mysqli_real_escape_string($conn,$_POST['permit']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$establisment = mysqli_real_escape_string($conn,$_POST['establisment']);
	$purpose_fsec = mysqli_real_escape_string($conn,$_POST['purpose_fsec']);
	$contact = mysqli_real_escape_string($conn,$_POST['contact']);
  	$name_person = mysqli_real_escape_string($conn,$_POST['name_person']);

	// echo $permit."\n".$contact_num."\n";

	$directory = "../Files/";

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

	
	$remark = "pending";

	$update = "UPDATE tbl_service_type SET building_specification ='$permit_num1',bill_material='$permit_num2',bfp_or='$permit_num3',status_cro='$remark',voltage_circuit='$permit_num4',date_register= CURRENT_TIMESTAMP WHERE tbl_service_id = $id";
	if (mysqli_query($conn,$update) === TRUE) {
	  echo "Yes";
	}



?>