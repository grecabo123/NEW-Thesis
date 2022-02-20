<?php  


	require '../connector/connect.php';

	$fname = mysqli_real_escape_string($conn,$_POST['fname']);
	$lname = mysqli_real_escape_string($conn,$_POST['lname']);
	$position = mysqli_real_escape_string($conn,$_POST['position']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$office = mysqli_real_escape_string($conn,$_POST['office']);
	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$pass = mysqli_real_escape_string($conn,$_POST['password']);

	if (isset($_POST['create'])) {
		if (!preg_match("/^[a-zA-Z  ]*$/",$fname)) {
			
		}
		else if (!preg_match("/^[a-zA-Z!0-9]*$/",$pass)) {
			
		}
		else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

		}
		else{
			$search = "SELECT username from tbl_personnel WHERE username ='$username'";
			$result = mysqli_query($conn,$search);
			if (mysqli_num_rows($result) > 0) {
				header("location: signup?username=existed");
				exit();
			}
			else{
				if (strlen($pass) > 8) {
					$hash = password_hash($pass, PASSWORD_BCRYPT);
					$insert = "INSERT INTO tbl_personnel(first_name,last_name,email,position,office,username,password,date_create) VALUES ('$fname','$lname','$email','$position','$office','$username','$hash',NOW())";
					if (mysqli_query($conn, $insert) === TRUE) {
						header("location: signup?account=created");
						exit();
					}
					else{
						header("location: signup?account=failed");
						exit();
					}
				}
				else{
					header("location: signup?password=too_short");
					exit();
				}
			}
		}
	}
	else{
		header("location: signup");
		exit();
	}


?>