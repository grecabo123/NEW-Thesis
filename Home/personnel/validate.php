<?php  


	require '../connector/connect.php';

	$username = mysqli_real_escape_string($conn,$_POST['user']);
	$password = mysqli_real_escape_string($conn,$_POST['pass']);
	$rank = mysqli_real_escape_string($conn,$_POST['rank']);


	if ($rank == "Chief Operation") {
		Chief_operation($username,$password,$rank);
	}
	else if ($rank == "Chief Relation Officer") {
		CRO($username,$password,$rank);
	}
	else if ($rank == "FCCA") {
		FCCA($username,$password,$rank);
	}
	else if ($rank == "FCA") {
		FCA($username,$password,$rank);
	}
	else if ($rank == "chief fses") {
		FSES($username,$password,$rank);
	}
	
?>

<?php

	function Chief_operation($username,$password,$rank){
		require '../connector/connect.php';

		$sql = "SELECT *FROM tbl_personnel WHERE username ='$username'";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
			    if ($row['username'] == $username) {
			    	$email = $row['email'];
			    	$hash = $row['password'];
			    	if (password_verify($password, $hash)) {
			    		echo 1;
			    		session_start();
			    		$_SESSION['personnel'] = $row['email'];
			    	}
			    	else{
			    		echo 0;
			    	}
			    }
			}
		}
	}


?>

<?php

	function CRO($username,$password,$rank){
		require '../connector/connect.php';
		$sql = "SELECT *FROM tbl_personnel WHERE username ='$username'";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
			    if ($row['username'] == $username) {
			    	$email = $row['email'];
			    	$hash = $row['password'];
			    	if (password_verify($password, $hash)) {
			    		echo 1;
			    		session_start();
			    		$_SESSION['personnel'] = $row['email'];
			    	}
			    	else{
			    		echo 0;
			    	}
			    }
			}
		}
	}


?>

<?php

	function FCCA($username,$password,$rank){
		require '../connector/connect.php';
		$sql = "SELECT *FROM tbl_personnel WHERE username ='$username'";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
			    if ($row['username'] == $username) {
			    	$email = $row['email'];
			    	$hash = $row['password'];
			    	if (password_verify($password, $hash)) {
			    		echo 1;
			    		session_start();
			    		$_SESSION['personnel'] = $row['email'];
			    	}
			    	else{
			    		echo 0;
			    	}
			    }
			}
		}
	}


?>
<?php

	function FCA($username,$password,$rank){
		require '../connector/connect.php';
		$sql = "SELECT *FROM tbl_personnel WHERE username ='$username'";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
			    if ($row['username'] == $username) {
			    	$email = $row['email'];
			    	$hash = $row['password'];
			    	if (password_verify($password, $hash)) {
			    		echo 1;
			    		session_start();
			    		$_SESSION['personnel'] = $row['email'];
			    	}
			    	else{
			    		echo 0;
			    	}
			    }
			}
		}
	}


?>

<?php

	function FSES($username,$password,$rank){
		require '../connector/connect.php';

		$sql = "SELECT *FROM tbl_personnel WHERE username ='$username'";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
			    if ($row['username'] == $username) {
			    	$email = $row['email'];
			    	$hash = $row['password'];
			    	if (password_verify($password, $hash)) {
			    		echo 1;
			    		session_start();
			    		$_SESSION['personnel'] = $row['email'];
			    	}
			    	else{
			    		echo 0;
			    	}
			    }
			}
		}
	}
?>

