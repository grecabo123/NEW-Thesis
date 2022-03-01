<?php  

	require '../../connector/connect.php';
	
	 
	
	$id = mysqli_real_escape_string($conn,$_POST['num']);
	$permit = mysqli_real_escape_string($conn,$_POST['type_of_permit']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$business = mysqli_real_escape_string($conn,$_POST['business']);
	// $purpose_fsec = mysqli_real_escape_string($conn,$_POST['purpose_fsec']);
	$contact = mysqli_real_escape_string($conn,$_POST['contact']);
  	$name_person = mysqli_real_escape_string($conn,$_POST['name_person']);

	// echo $permit."\n".$contact_num."\n";

	$directory = "../Files/";

	// file name
	$permit_num1 = $_FILES['endorse_file']['name'];
	$permit_num2 = $_FILES['building_certificate_file']['name'];
	$permit_num3 = $_FILES['electrical_file']['name'];
  	$permit_num4 = $_FILES['bfp_or_file']['name'];
  	$permit_num5 = $_FILES['fsec_clearance_file']['name'];

	// file goes to the directory
	
	$new_endorse_file = $directory.$permit_num1;
	$newfilename_building = $directory.$permit_num2;
	$new_electrical_file = $directory.$permit_num3;
  	$new_bfp_or = $directory.$permit_num4;
  	$new_fsec_file = $directory.$permit_num5;


	move_uploaded_file($_FILES["endorse_file"]["tmp_name"],$new_endorse_file);
	move_uploaded_file($_FILES["building_certificate_file"]["tmp_name"],$newfilename_building);
	move_uploaded_file($_FILES["electrical_file"]["tmp_name"],$new_electrical_file);
  	move_uploaded_file($_FILES["bfp_or_file"]["tmp_name"],$new_bfp_or);
  	move_uploaded_file($_FILES["fsec_clearance_file"]["tmp_name"],$new_fsec_file);

	
	$reference_id = uniqid(rand(100,999));

	$num = rand(100,999);
	$num2 = rand(100,999);
	$queue = $num."".$num2;
	$remark = "pending";

	
	$update = "UPDATE tbl_service_type SET bfp_or ='$permit_num4',endorsement='$permit_num1',building_completion='$permit_num2',electrical_completion='$permit_num3',fsec_certificate='$permit_num5',status_cro='$remark',date_register= CURRENT_TIMESTAMP WHERE tbl_service_id = $id";
  if (mysqli_query($conn,$update) === TRUE) {
      echo "Yes";
  }


?>