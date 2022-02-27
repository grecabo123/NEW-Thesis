<?php  

	include '../../connector/connect.php';

	session_start();

		

	$fk = mysqli_real_escape_string($conn,$_POST['fk']);

	$tmp =  $_SESSION['fca_id'];	

	

	$search = "SELECT *FROM tbl_client_info WHERE client_info_id = $fk";
	$result = mysqli_query($conn,$search);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
		    $tmp_id = $row['business_fk'];
		    Insert_Data($fk,$tmp_id,$tmp);
		    break;
		}
	}
?>


<?php  

	
	function Insert_Data($fk,$tmp_id,$tmp){

		require '../../connector/connect.php';

		$amount = mysqli_real_escape_string($conn,$_POST['amount']);
		$directory = "attachments/";
		$permit_num1 = $_FILES['file']['name'];
		$newfilename = $directory.$permit_num1;
		move_uploaded_file($_FILES["file"]["tmp_name"],$newfilename);

		$remark = "pending";
		$ref = "";

		

		$insert = "INSERT INTO tbl_payment(File_payment,total_fees,date_upload,ref_id,tbl_client_fk,tbl_business_fk) VALUES('$permit_num1',$amount,NOW(),'$ref',$fk,$tmp_id)";
		if (mysqli_query($conn,$insert) === TRUE) {
			$approve = "Payment";
			$update = "UPDATE tbl_service_type SET fca= '$approve' WHERE tbl_info_fk = $fk";
			if (mysqli_query($conn,$update) === TRUE) {

				$get_data = "SELECT *FROM tbl_personnel WHERE id = $tmp";

				$result = mysqli_query($conn,$get_data);

				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
					    $fname = $row['first_name'];
					    $lname = $row['last_name'];
					    $office_name = $row['office'];
					    Insert_fca($fname,$lname,$office_name,$fk);
					    break;
					}
				}
			}
		}
	}
?>
<?php  


	function Insert_fca($fname,$lname,$office_name,$fk){

		include '../../connector/connect.php';

		$full = $fname." ".$lname;

		$insert = "INSERT INTO tbl_approved(name_person,office,approve_client_fk,date_approve) VALUES('$full','$office_name',$fk,NOW())";

		if (mysqli_query($conn,$insert) === TRUE) {
			echo 1;
		}
		else{
			echo 0;
		}

	}


?>


