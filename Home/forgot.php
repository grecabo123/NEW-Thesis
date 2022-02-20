
<!-- accessing the data from the database -->
<?php  

	require 'connector/connect.php';

	$error = array(
		'pass' => "",
		'Email' => "",
		'empty' => "",
		'verify' => "",
		'exist'	=> "",
		'pass_error' => "",
	);
	$email = "";

	if (isset($_POST['login'])) {
		
		$email = mysqli_real_escape_string($conn,$_POST['email']);

		if (empty($email) || empty($pass)) {
			$error['empty'] = "You must Input the fields";
			
		}
		else if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$error['Email'] = "Email must be valid";
			// exit();
		}
		else{
			$sql = "SELECT *from tbl_user WHERE email = '$email' AND status =0";
			$result = mysqli_query($conn,$sql);
			if (mysqli_num_rows($result) > 0) {
				$error['verify'] = "Your account not verified";
			}
			else{
				$search = "SELECT *from tbl_user WHERE email ='$email'";
				$result_q = mysqli_query($conn,$search);
				if (mysqli_num_rows($result_q) > 0) {
					while ($row = mysqli_fetch_assoc($result_q)) {
					    if ($row['email'] == $email) {
					    	$email = $row['email'];
					    	$hash = $row['password'];
					    	if (password_verify($pass, $hash)) {
					    		session_start();
					    		$_SESSION['google_email'] = $row['email'];
					    		header("location: commerce/market.php");
					    		// exit();
					    	}
					    	else{
					    		$error['pass_error'] = "Incorrect Password";
					    	}
					    }
					   	else{
					   		// header("location: login?email=does_not_exist");
					   	}
					}
				}
				else {
					$error['exist'] = "Account Doees not Exist";
				}
			}
		}
	}
	

?>
<!-- end of access the data from database -->


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Login</title>
	<link href="assets/img/Icon/logo.png" rel="icon">
	<link rel="stylesheet" href="assets/css/dashbord.css">
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
	<!-- section -->
		<!-- header -->
		<nav class="navbar navbar-expand-lg background-head p-3">
		  <div class="container">
		    <a class="navbar-brand" href="./">
		    	Bureau of Fire Protection
		    </a>
			<div class="dropdown">
		  		<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
		    		Account Type
		  		</button>
		  		<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="select">
			    	<li><a class="dropdown-item fs-6" href="login.php">User Account</a></li>
			    	<li><a class="dropdown-item fs-6" href="business_account.php">Business Account</a></li>
			 	</ul>
			</div>
		  </div>
	</nav>
	<!-- end of header -->


	<!-- Login Form -->

	<div class="login-form p-4">
    <form method="post">
    	<!-- <center><i class="fas fa-lock fs-5"></i></center> -->
        <h2 class="text-center fw-bold fs-5">Forgot Password</h2>
        <div class="form-group">
        	<p class="text-muted">When you fill in your registered email address, you will be sent instructions on how to reset your password.</p>
        	<div class="input-group">                
                <div class="input-group mb-3">

					<span class="input-group-text"><i class="fas fa-user-lock"></i></span>
					<input type="text" class="form-control" name="email" placeholder="Email Address" value="<?php echo $email; ?>">
				</div>
            </div>
        </div>
        <div class="col-md-12 d-flex justify-content-center">
			<button type="submit" class="btn btn-primary w-100" name="login">Send</button>
		</div>
    </form>
</div>

	<!-- footer -->

	<?php  

    include 'Body/footer/footer.php';

  ?>

	<!-- end of footer -->

	<script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="assets/js/fontawesome.js"></script>
<!-- 	<script>
  		$(document).ready(function(){
  			$('#select').on('change',function(){
  				var data = $(this).val();

			if (data == "User") {
				location.href= "login.php";
			}
			else if(data == "Business"){
				location.href= "business_account.php";
			}
  			});
  		});
  	</script> -->
	
</body>
</html>