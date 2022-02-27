<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Personnel</title>
	<link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/img/Icon/logo.png" rel="icon">
    <link rel="stylesheet" href="css/personnel.css">
</head>
<body>

		<!-- header -->
	<nav class="navbar navbar-inverse bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index" class="navbar-brand"><img src="../assets/img/Icon/logo.png" class="img-thumbmail" alt="" width="100" height="100">&nbsp<span class="text-uppercase title-span text-muted">bureau of fire protection</span></a>
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
				<div class="form-group d-flex justify-content-center flex-column">
					<h3 class="text-muted fs-5 fw-bold">Personnel</h3>
					 <div class="mb-7">
                            <label for="" class="form-label">
                                Position:
                            </label>
                            <select id="rank" class="form-control" name="rank">
                            	<option disabled selected>Choose Position</option>
                                <option value="Chief Operation">Chief Operation</option>
                                <option value="Chief Relation Officer">Chief Relation Officer</option>
                                <option value="FCCA">Fire Code Collecting Agent</option>
                                <option value="FCA">Fire Code Assessor</option>
                                <option value="chief fses">Chief Fses</option>
                                <option value="Inspector">Inspector</option>
                            </select>
                        </div>
					<label for="" class="form-label">
						Username
					</label>
					<div class="input-group mb-3">
						<span class="input-group-text"><i class="fas fa-user-lock"></i></span>
						<input id="user" type="text" class="form-control" placeholder="Username">
					</div>
					<label for="" class="form-label col-md-6">
						Password
					</label>
					<div class="input-group mb-3">
						<span class="input-group-text"><i class="fas fa-key"></i></span>
						<input id="pass" type="password" class="form-control" placeholder="Password">
					</div>
					<div class="col-md-12 d-flex justify-content-center">
						<button id="personnel_login"  class="btn btn-primary w-100">Login</button>
						<button class="btn btn-primary w-100 hide" type="button" disabled>
                           <span class="spinner-border spinner-border-sm " role="status" aria-hidden="true"></span>
                                Logging in
                        </button>
					</div>
					<p class="text-danger fs-5 message"></p>
				</div>
			</div>
		</div>
	</div>

	<!-- end of conent -->
	<script src="../assets/vendor/purecounter/purecounter.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="js/login.js"></script>
    <script type="text/javascript" src="../assets/js/fontawesome.js"></script>
</body>
</html>