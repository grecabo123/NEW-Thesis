<?php  

	include "../../connector/connect.php";

	$id = mysqli_real_escape_string($conn,$_POST['num']);
	$transaction_code = mysqli_real_escape_string($conn,$_POST['transaction_code']);
	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$amt = mysqli_real_escape_string($conn,$_POST['amt']);
	$proxy = mysqli_real_escape_string($conn,$_POST['proxy']);
	



	$directory = "../Payment/";

	$payment_file = $_FILES['payment']['name'];

	$newfilename = $directory.$payment_file;
	move_uploaded_file($_FILES["payment"]["tmp_name"],$newfilename);





	$insert ="INSERT INTO tbl_transaction (transaction_code,name,amount,file_payment,transaction_business_fk,proxy_name,date_upload) VALUES('$transaction_code','$name',$amt,'$payment_file',$id,'$proxy',NOW())";

	if (mysqli_query($conn,$insert) === TRUE) {
		
		$update = "UPDATE tbl_service_type SET fcca='pending' WHERE tbl_service_id = $id";
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