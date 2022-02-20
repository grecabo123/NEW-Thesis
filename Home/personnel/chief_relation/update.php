<?php  

	
	include '../../connector/connect.php';

	session_start();

	if (isset($_POST['send'])) {
		$num = mysqli_real_escape_string($conn,$_POST['num']);

		$personnel_id = $_SESSION['personnel_id'];

		$approve = "OK";
		$pending= "pending";
		$search = "UPDATE tbl_service_type SET status_cro = '$approve',fca='$pending' WHERE tbl_info_fk = $num";
		
		if (mysqli_query($conn,$search) === TRUE) {
			$get_data = "SELECT *FROM tbl_personnel WHERE id = $personnel_id";

			$result = mysqli_query($conn,$get_data);

			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
				    $fname = $row['first_name'];
				    $lname = $row['last_name'];
				    $office_name = $row['office'];
				    Insert_personnel($fname,$lname,$office_name,$num);
				    break;
				}
			}
		}
		else{
			echo 0;
		}
	}
	else if (isset($_POST['fsic_lack'])) {
		
		$num = mysqli_real_escape_string($conn,$_POST['num']);

		$fsic = "UPDATE tbl_service_type SET status_cro ='lacking' WHERE tbl_info_fk = $num";

		if (mysqli_query($conn,$fsic) === TRUE) {
			echo 1;
		}
	}
	else if (isset($_POST['fsec_lack'])) {
		
		$num = mysqli_real_escape_string($conn,$_POST['num']);

		$fsic = "UPDATE tbl_service_type SET status_cro ='lacking' WHERE tbl_info_fk = $num";

		if (mysqli_query($conn,$fsic) === TRUE) {
			echo 1;
		}
	}
	else if (isset($_POST['occu_lack'])) {
		
		$num = mysqli_real_escape_string($conn,$_POST['num']);

		$fsic = "UPDATE tbl_service_type SET status_cro ='lacking' WHERE tbl_info_fk = $num";

		if (mysqli_query($conn,$fsic) === TRUE) {
			echo 1;
		}
	}
?>

<?php  


	function Insert_personnel($fname,$lname,$office_name,$num){

		include '../../connector/connect.php';

		$full = $fname." ".$lname;

		$insert = "INSERT INTO tbl_approved(name_person,office,approve_client_fk,date_approve) VALUES('$full','$office_name',$num,NOW())";

		if (mysqli_query($conn,$insert) === TRUE) {
			echo 1;
		}
		else{
			echo 3;
		}

	}


?>