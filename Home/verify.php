<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" type="icon/png" href="image/logo.png" sizes="10x10">
	<title>Confirmation</title>
	<link rel="stylesheet" href="assets/css/dashbord.css">
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
	
	<!-- header -->
	<nav class="navbar  p-4 background-head">
        <div class="container-fluid">
             <a class="navbar-brand" href="index">
                
                <span class="text-muted text-capitalize fs-4">bureau of fire protection</span>
            </a>
        </div>
    </nav>
	<!-- end of header -->


	<!-- text -->

	<div class="container">
		<div class="jumbotron">
			<div class="page-heading text-center mt-4">
				<div class="container col-md-7">
					<h1 class="display-3">Thank You!</h1>
  						<p class=""><strong>Please check your email</strong> for further instructions on how to complete your account setup.</p>
					<?php  
						session_start();
						require 'connector/connect.php';
						$email = $_SESSION['email'];
						$sql = "SELECT email from tbl_user WHERE email = '$email'";
						$result = mysqli_query($conn,$sql);
						while ($row = mysqli_fetch_assoc($result)) {
						    if ($row['email'] == $email) {
						    	$tmp_email = $row['email'];
						    	$_SESSION['new_email'] = $row['email'];
						    	break;
						    }
						    else{
						    	header("location: ../error");
						    }
						}

					?>
					<hr>
					<p class="text-primary bg-secondary fs-4 p-2 text-light w-100 rounded"><?php echo $tmp_email; ?></p>
					<div class="mt-4">
						<form action="send" method="post" class="form-group">
							<?php  
									include 'IP/user.php';
									$access = new UserInfo;
									$brows = $access->Browser();
									$os = $access->Operating_System();
									$devi = $access->Devices();

								?>
								<br>
								<input type="hidden" value="<?php echo $brows ?>" name="browser">
								<input type="hidden" value="<?php echo $os ?>" name="Operating_System">
								<input type="hidden" value="<?php echo $devi ?>" name="Device">
							<p class="text-muted fs-5">
								If you didn't receive your verification
							</p>
							<button type="submit" class="btn btn-primary fs-6" name="send">Resend Verification</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- end of text info -->



	<script type="text/javascript" src="js/date.js"></script>
</body>
</html>