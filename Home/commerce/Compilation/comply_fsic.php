<?php  

	require '../../connector/connect.php';
	
  
	
	$id = mysqli_real_escape_string($conn,$_POST['num']);
	$permit = mysqli_real_escape_string($conn,$_POST['permit']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$owner_fsic = mysqli_real_escape_string($conn,$_POST['owner_fsic']);
	$business_name = mysqli_real_escape_string($conn,$_POST['business_name']);
	$contact_num = mysqli_real_escape_string($conn,$_POST['contact_num']);

	// echo $permit."\n".$contact_num."\n";

	$directory = "../Files/";

	// file name
	$permit_num1 = $_FILES['file']['name'];
	$permit_num2 = $_FILES['insurance']['name'];
	$permit_num3 = $_FILES['OR']['name'];

	// file goes to the directory
	$target = $directory.basename($_FILES['file']['name']);
	$target_insu = $directory.basename($_FILES['insurance']['name']);
	$target_or = $directory.basename($_FILES['OR']['name']);

	$filetype = strtolower(pathinfo($target,PATHINFO_EXTENSION));
	$filetype_insu = strtolower(pathinfo($target_insu,PATHINFO_EXTENSION));
	$filetype_or = strtolower(pathinfo($target_or,PATHINFO_EXTENSION));

	$newfilename = $directory.$permit_num1;
	$newfilename_insu = $directory.$permit_num2;
	$newfilename_or = $directory.$permit_num3;

	move_uploaded_file($_FILES["file"]["tmp_name"],$newfilename);
	move_uploaded_file($_FILES["insurance"]["tmp_name"],$newfilename_insu);
	move_uploaded_file($_FILES["OR"]["tmp_name"],$newfilename_or);


  $remark = "pending";

	$update = "UPDATE tbl_service_type SET business_permit ='$permit_num1',insurance_policy='$permit_num2',bfp_or='$permit_num3',status_cro='$remark',date_register= CURRENT_TIMESTAMP WHERE tbl_service_id = $id";
  if (mysqli_query($conn,$update) === TRUE) {
      echo "Yes";
  }



?>