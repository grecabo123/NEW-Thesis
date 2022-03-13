<?php  

	require '../connector/connect.php';
	
  session_start();

  $fk = $_SESSION['user_id'];
	
	$permit = mysqli_real_escape_string($conn,$_POST['permit']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$owner_fsic = mysqli_real_escape_string($conn,$_POST['owner_fsic']);
	$business_name = mysqli_real_escape_string($conn,$_POST['business_name']);
	$contact_num = mysqli_real_escape_string($conn,$_POST['contact_num']);

	// echo $permit."\n".$contact_num."\n";

	$directory = "Files/";

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

  	
  	$reference_id = uniqid(rand(100,999));

  	$num = rand(100,999);
  	$num2 = rand(100,999);
  	$queue = $num."".$num2;

    $remark = "pending";

  	$sql = "INSERT INTO tbl_client_info(business_owner,email,business_name,contact_number,business_fk) VALUES('$owner_fsic','$email','$business_name','$contact_num',$fk)";
  	if (mysqli_query($conn,$sql) === TRUE) {
  		$fk_id = mysqli_insert_id($conn);
  		$data = "INSERT INTO tbl_service_type(service_type,business_permit,insurance_policy,bfp_or,endorsement,building_completion,electrical_completion,fsec_certificate,building_specification,bill_material,voltage_circuit,reference_id,queue,date_register,status_cro,fca,fcca,inspection,fses,fire_marshal,tbl_info_fk,tbl_bs_fk) VALUES ('$permit','$permit_num1','$permit_num2','$permit_num3',null,null,null,null,null,null,null,'$reference_id',$queue,NOW(),'$remark','','','','','',$fk_id,$fk)";

  		if (mysqli_query($conn,$data) === TRUE) {
  			echo "Yes";
  		}
  		else{
  			echo "No";
  		}
  	}



?>