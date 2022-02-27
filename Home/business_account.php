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

	if (isset($_POST['signin'])) {
		
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$pass = mysqli_real_escape_string($conn,$_POST['pass']);


		// echo $email;

		if (empty($email) || empty($pass)) {
			$error['empty'] = "You must Input the fields";
			
		}
		else if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$error['Email'] = "Email must be valid";
			// exit();
		}
		else{
			$search = "SELECT *FROM tbl_business WHERE business_email = '$email' AND status = 0";
			$result = mysqli_query($conn,$search);
			if (mysqli_num_rows($result) > 0) {
				$error['verify'] = "Your account is not valid";
			}
			else{
				$search_data = "SELECT *FROM tbl_business WHERE business_email = '$email' AND status = 1";
				$result_q = mysqli_query($conn,$search_data);
				if (mysqli_num_rows($result_q) > 0) {
					while ($row = mysqli_fetch_assoc($result_q)) {
					    if ($row['business_email'] == $email) {
					    	$tmp_email = $row['business_email'];
					    	$hash = $row['business_password'];
					    	if (password_verify($pass, $hash) === TRUE) {
					    		session_start();
					    		$_SESSION['google_email'] = $row['business_email'];
					    		header("location: commerce/market.php");
					    	}
					    	else{
					    		$error['pass_error'] = "Incorrect Password";
					    	}
					    }
					}
				}
				else{
					$error['verify'] = "Your account is not valid";
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

	<div class="login-form">
    <form method="post">
        <h2 class="text-center fw-bold fs-5">Sign in For Business</h2>
        <center><p class="text-danger fs-6"> <?php echo $error['verify']; ?> </p></center>
        <div class="form-group">
        	<div class="input-group">                
                <div class="input-group mb-3">
					<span class="input-group-text"><i class="fas fa-user-lock"></i></span>
					<input type="text" class="form-control" name="email" placeholder="Business Email" value="<?php echo $email; ?>">
				</div>
				<center><p class="text-danger fs-6"> <?php echo $error['Email']; ?> </p></center>
            </div>
        </div>
		<div class="form-group">
            <div class="input-group">
               <div class="input-group mb-3">
					<span class="input-group-text"><i class="fas fa-key"></i></span>
					<input type="password" class="form-control" name="pass" placeholder="Password">
				</div>
				<center><p class="text-danger fs-6"><?php echo $error['pass_error']; ?></p></center>
				<center><p class="text-danger fs-6"><?php echo $error['empty']; ?></p></center>
            </div>
        </div> 

        <div class="col-md-12 d-flex justify-content-center">
			<button type="submit" class="btn btn-primary w-100" name="signin">Login</button>
		</div>
        <div class="clearfix">
            <a href="forgot.php" class="float-right text-success">Forgot Password?</a>
        </div>  
        
    </form>
    <div class="hint-text">Don't have an account? <a href="user.php" class="text-success">Register Now!</a></div>
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