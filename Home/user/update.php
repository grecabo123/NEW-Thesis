<?php  

	include "../connector/connect.php";

	session_start();

	if (isset($_POST['update'])) {

		$id = $_SESSION['user_id'];
		
		$name = mysqli_real_escape_string($conn,$_POST['name']);
		
		$brgy = mysqli_real_escape_string($conn,$_POST['brgy']);
		$adr = mysqli_real_escape_string($conn,$_POST['adr']);
		$contact = mysqli_real_escape_string($conn,$_POST['contact']);
		$mname = mysqli_real_escape_string($conn,$_POST['mname']);
		$lname = mysqli_real_escape_string($conn,$_POST['lname']);

		$update = "UPDATE tbl_user as user JOIN tbl_address as adr SET user.fname='$name',user.mname='$mname',user.lname='$lname',user.contact='$contact',adr.brgy='$brgy'  WHERE user.tbl_user_id = $id";

		if (mysqli_query($conn,$update) === TRUE) {
			echo 'Update';
		}
	}


?>