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
		    <a class="navbar-brand" href="index">
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
        <h2 class="text-center fw-bold fs-5">New Password</h2>
        <div class="form-group">
        	<p class="text-muted"></p>
        	<div class="input-group">                
                <div class="input-group mb-3">
					<span class="input-group-text"><i class="fas fa-user-lock"></i></span>
					<input type="password" class="form-control" name="email" placeholder="New Password">
				</div>
            </div>
            <div class="input-group">                
                <div class="input-group mb-3">

					<span class="input-group-text"><i class="fas fa-user-lock"></i></span>
					<input type="password" class="form-control" name="email" placeholder="Re type Password">
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