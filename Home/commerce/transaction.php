<?php  

	
	require '../connector/connect.php';
	
	session_start();

	$fk = $_SESSION['user_id'];

	$transaction_code = mysqli_real_escape_string($conn,$_POST['transaction_code']);
	$amt = mysqli_real_escape_string($conn,$_POST['amt']);
	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$id_fk = mysqli_real_escape_string($conn,$_POST['id_fk']);



	$directory = "Payment/";

	$payment_file = $_FILES['payment']['name'];

	$newfilename = $directory.$payment_file;

	move_uploaded_file($_FILES["payment"]["tmp_name"],$newfilename);


	$remark = "On Payment";



	$insert ="INSERT INTO tbl_transaction (transaction_code,name,amount,file_payment,transaction_business_fk,proxy_name,date_upload) VALUES('$transaction_code','$name',$amt,'$payment_file',$id_fk,'',NOW())";
	if (mysqli_query($conn,$insert) === TRUE) {
		
		$update = "UPDATE tbl_service_type SET fca ='$remark',fcca='pending' WHERE tbl_service_id = $id_fk";
		if (mysqli_query($conn,$update) === TRUE) {
			echo 2;
		}
		else{
			echo 1;
		}
	}
	else{
		echo 0;
	}


?>