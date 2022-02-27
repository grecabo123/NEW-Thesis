<?php  

	$username = $pass = "";

		$error = array(
			"username" => "",
			"pass" =>	"",
			"both"	=>	"",
			"failed" =>	"",
		);

	if (isset($_POST['signin'])) {
		
		require '../connector/connect.php';
		session_start();

		$username = mysqli_real_escape_string($conn,$_POST['username']);
		$pass = mysqli_real_escape_string($conn,$_POST['pass']);



		if (empty($username) || empty($pass)) {
			$error['both'] = "Please Input the fields";
		}
		else if (!preg_match("/^[a-zA-Z]*$/",$username)) {
			$error['username'] = "Username Incorrect";
		}
		else if (!preg_match("/^[a-zA-Z]*$/",$pass)) {
			$error['pass'] = "Password Incorrect";
		}
		else {
			$sql = "SELECT username,password from admin WHERE username = '$username' AND password ='$pass'";
			$result = mysqli_query($conn,$sql);
			if (mysqli_num_rows($result) > 0) {
				$_SESSION['user'] = $_POST['username'];
				header("location: dashboard");
				exit();
			}
			else{
				$error['failed'] = "Login Failed Please Try Again";
			}
		}
	}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin</title>
	<link href="../assets/img/Icon/logo.png" rel="icon">
	<link rel="stylesheet" href="../assets/css/dashbord.css">
	<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

		<!-- header -->
	<nav class="navbar navbar-inverse bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="" class="navbar-brand"><img src="../assets/img/Icon/logo.png" class="img-thumbmail" alt="" width="100" height="100">&nbsp<span class="text-uppercase title-span text-muted">bureau of fire protection</span></a>
			</div>
			<ul class="list-group list-group-horizontal">
				<li class="m-3">
					<div id="date" class="text-muted fs-5 col-sm-12">
						<p id="time">
							
						</p>
					</div>
				</li>
			</ul>
		</div>
	</nav>
	<!-- end of header -->

	<!-- content -->
	<div class="container-fluid w-50 d-flex justify-content-center">
		<div class="row">
			<div class="col-md-12 mt-5">
				<form method="post" class="form-group d-flex justify-content-center flex-column">
					<h3 class="text-dark fs-5 fw-bold">Admin</h3>
					
					<label for="" class="form-label">
						Username
					</label>
					<div class="input-group mb-3">
						<span class="input-group-text"><i class="fas fa-user-lock"></i></span>
						<input type="text" class="form-control" name="username" placeholder="Username" value="">
					</div>
					<label for="" class="form-label col-md-6">
						Password
					</label>
					<div class="input-group mb-3">
						<span class="input-group-text"><i class="fas fa-key"></i></span>
						<input type="password" class="form-control" name="pass" placeholder="Password">
					</div>
					<div class="col-md-12 d-flex justify-content-center">
						<button type="submit" class="btn btn-primary w-100" name="signin">Login</button>
					</div>
					<p class="text-danger d-flex justify-content-center"><?php echo $error['username']; ?></p>
					<p class="text-danger d-flex justify-content-center"><?php echo $error['pass']; ?></p>
					<p class="text-danger d-flex justify-content-center"><?php echo $error['both']; ?></p>
				</form>
			</div>
		</div>
	</div>

	<!-- end of conent -->
	<script type="text/javascript" src="../assets/js/fontawesome.js"></script>
	<script type="text/javascript" src="../assets/js/date.js"></script>
</body>
</html>