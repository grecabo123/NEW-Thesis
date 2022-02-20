<?php  
    
    include 'IP/user.php';
        $error = array(
            'email' => '',
            'title' => '',
            'contact' => '',
            'fname' => '',
            'lname' => '',
            'mname' => '',
            'exist' => '',
            'contact' => '',
            'password_match' => '',
        );
    $fname = $mname = $lname = $email = $contact = $address  = "";
        

    if (isset($_POST['Register'])) {

        session_start();

        require 'connector/connect.php';
        require 'smtp/PHPMailerAutoload.php';
        include 'smtp/class.phpmailer.php';

        $fname = mysqli_real_escape_string($conn,$_POST['fname']);
        $mname = mysqli_real_escape_string($conn,$_POST['mname']);
        $lname = mysqli_real_escape_string($conn,$_POST['lname']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $contact = mysqli_real_escape_string($conn,$_POST['contact']);
        $brgy = mysqli_real_escape_string($conn,$_POST['brgy']);
        $address = mysqli_real_escape_string($conn,$_POST['address']);
        $city = mysqli_real_escape_string($conn,$_POST['city']);
        $password = mysqli_real_escape_string($conn,$_POST['pass']);
        // $IP = mysqli_real_escape_string($conn,$_POST['ip']);
        $Browser = mysqli_real_escape_string($conn,$_POST['browser']);
        $OS = mysqli_real_escape_string($conn,$_POST['Operating_System']);
        $Device = mysqli_real_escape_string($conn,$_POST['Device']);
        // $check = mysqli_real_escape_string($conn,$_POST['agree']);
        $re_type = mysqli_real_escape_string($conn,$_POST['re_type']);

        


        $_SESSION['email'] = $_POST['email'];

        // Recapcha 
        $response_key = $_POST['g-recaptcha-response'];
        $site_key = "6LcC86wcAAAAAOohkFSsLQ-Pa-6W21_hukOLMYoV";
        $secret_key = "6LcC86wcAAAAABV5pNgNPxlgiW2oVU_XwbYSbaK5";
        $verify_url = "https://www.google.com/recaptcha/api/siteverify";

        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $error['email'] = "Email must be valid";
        }
        else if(!preg_match("/^[a-zA-Z]*$/",$fname)){
            $error['fname'] = "Please Input Correctly";
        }
        else if(!preg_match("/^[a-zA-Z]*$/",$mname)){
            $error['mname'] = "Please Input Correctly";
        }
        else if(!preg_match("/^[a-zA-Z]*$/",$lname)){
            $error['lname'] = "Please Input Correctly";
        }
        else if(!preg_match("/^[0-9]*$/",$contact)){
            $error['contact'] = "Please Input Correctly";
        }
        // else if(!preg_match("/^[a-zA-Z 0-9-]*$/",$brgy)){
        //  $error['brgy'] = "Please Input Correctly";
        // }
        // else if(!preg_match("/^[a-zA-Z ]*$/", $city)){
        //  $error['city'] = "Please Input Correctly";
        // }
        else{
            if (strlen($password) > 8) {
                if ($password == $re_type) {
                    $response = file_get_contents($verify_url.'?secret='.$secret_key.'&response='.$response_key.'&remoteip='.$_SERVER['REMOTE_ADDR']);
                        $response = json_decode($response);
                        if ($response->success == 1) {
                            $sql = "SELECT email from tbl_user WHERE email = '$email'";
                            $result = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result) > 0) {
                                $error['exist'] = "Email already registered";
                            }
                            else{
                                $hash = password_hash($password, PASSWORD_BCRYPT);
                                $sql = "INSERT INTO tbl_user (fname,mname,lname,email,password,contact,date_create) VALUES ('$fname','$mname','$lname','$email','$hash','$contact',NOW())";
                                if (mysqli_query($conn,$sql) === TRUE) {
                                    $last_key = mysqli_insert_id($conn);
                                    $status = "Not Verified";
                                    $type = "Non Personnel";
                                    $fname_md5 = md5(time().$fname);
                                    $mname_md5 = md5(time().$mname);
                                    $lname_md5 = md5(time().$lname);
                                    $key_v = $fname_md5."".$mname_md5."".$lname_md5;
                                    $year = date("Y");
                                    $user_key = "BFP-USER-".$year."#"." ".$last_key;
                                    $insert = "INSERT INTO tbl_account_type(account_registered,user_uniq_key,verified_key,tbl_user_fk) VALUES(NOW(),'$user_key','$key_v',$last_key)";
                                    if (mysqli_query($conn,$insert) === TRUE) {
                                        $insert_address = "INSERT INTO tbl_address (brgy,city,tbl_user_fk) VALUES ('$brgy','$city',$last_key)";
                                        if (mysqli_query($conn,$insert_address) === TRUE) {
                                            Email_Verification($fname,$mname,$lname,$email,$key_v,$Browser,$Device,$OS);
                                        } //end of if condition for address
                                        else{
                                            // header("location: signup?something=went+wrong1");
                                            exit();
                                        }
                                    } //end of if condition for account type
                                    else{
                                        // header("location: signup?something=went+wrong2");
                                        exit();
                                    }
                                } // end of if condition for profile

                                else{
                                    // header("location: signup?something=went+wrong3");
                                    exit();
                                }
                            }
                        } // end of if condition for response
                        else{
                            // header("location: signup?error=robot+ka");
                        }
                }
                else {
                    // not match
                    $error['password_match'] = "Password not match";
                }
            }
            else {
                // more than 8
            }
        }
    }
    else {
        header("location: ");
    }

?>


<?php  
    
    function Email_Verification ($fname,$mname,$lname,$email,$key_v,$Browser,$Device,$OS)
{
        
        $email_temple = "email_template/email.php";
        $full_name = "$fname"." "."$lname";
        $vkey = "http://localhost/Thesis/Home/verify?vkey=$key_v";
        $mail = new PHPMailer;

        // setup
        $mail->isSMTP();
        $mail->Host ="smtp.gmail.com";
        $mail->Port=465;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure="ssl";

        // information
        $mail->Username='bureaufireprotection@gmail.com';
        $mail->Password='doxjwckqfapzrbzu';

        // form
        $mail->setFrom('artamay1@gmail.com','Bureau Fire of Protection');

        // send to 
        $mail->addAddress($email);


        // From
        $mail->addReplyTo('bureaufireprotection@gmail.com');
        // $mail->AddEmbeddedImage($image,'Logo');

        // Logo
        // $mail->AddEmbeddedImage($computer,'Com');

        // content msg for email
        $message = file_get_contents($email_temple);
        $message = str_replace('{{USER_NAME}}', $full_name, $message);
        $message = str_replace('{{EMAIL_ADD}}', $email, $message);
        $message = str_replace('{{SITE_KEY}}', $vkey,$message);
        
        $message = str_replace('{{Browser}}', $Browser,$message);
        $message = str_replace('{{Device}}', $Device,$message);
        $message = str_replace('{{OS}}', $OS,$message);
        $mail->isHTML(true);
        $mail->CharSet="utf-8";
        $mail->Subject='Account Verification';
        $mail->MsgHTML($message);

    if (file_exists($email_temple)) {
        if ($mail->send()) {
            header("location: verify.php");
            // echo 'Sent';
        }
        else{
            echo 'failed to sent';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Create Account</title>
	<link href="assets/img/Icon/logo.png" rel="icon">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/dashbord.css">
	<link href="assets/css/style.css" rel="stylesheet">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	</script>
</head>
<body>
<!-- header -->
	<nav class="navbar navbar-expand-lg background-head justify-content-between">
		  <div class="container">
		    <a class="navbar-brand p-4" href="index">
		    	<span class="text-light text-capitalize fs-4">&nbspbureau of fire protection</span>
		    </a>
		   	<a class="active text-center" href="business.php">Business Account</a>
		  </div>
	</nav>
<!-- header -->

	<br>
	<div class="jumbotron text-center">
		<div class="container">
			<!-- <h3>Create Account</h3> -->
		</div>
	</div>
	<div class="user">
		<div class="container">
    <div class="row">
        <div class="col-md-12 offset-md-0">
            <div class="signup-form">
                <form class="mt-5 border p-4 bg-light shadow" id="form-sign" method="post">
                    <h4 class="mb-5 text-secondary">User Account</h4>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label>First Name<span class="text-danger">*</span></label>
                            <input type="text" id="fname" class="form-control" placeholder="First Name" required name="fname" value="<?php echo $fname; ?>">
                        </div>

                        <div class="mb-3 col-md-4">
                            <label>Middle Name<span class="text-danger">*</span></label>
                            <input type="text" id="mname" class="form-control" placeholder="Middle Name" required name="mname" value="<?php echo $mname; ?>">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label>Last Name<span class="text-danger">*</span></label>
                            <input type="text" id="lname" class="form-control" placeholder="Last Name" required name="lname" value="<?php echo $lname; ?>">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label>Email<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Email" required name="email" value="<?php echo $email; ?>">
						<p class="text-danger"><?php echo $error['email']; ?></p>
						<p class="text-danger"><?php echo $error['exist']; ?></p>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label>Contact<span class="text-danger">*</span></label>
                            <input type="text" id="contact" maxlength="11" class="form-control" placeholder="Contact" required name="contact" value="<?php echo $contact; ?>">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label>Barangay<span class="text-danger">*</span></label>
                            <?php  
                                require 'connector/connect.php';

                                $sql = "SELECT *FROM barangay";
                                $result = mysqli_query($conn,$sql);
                                if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <select name="brgy" class="form-control" id="brgy">
                                        <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $brgy = $row['Barangay'];
                                        ?>
                                        <option value="<?php echo $brgy; ?>"><?php echo $brgy; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <?php
                                }
                            ?>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label>Street<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Street" name="address" required name="adr" value="<?php echo $address; ?>">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label>City<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="City" required name="city" value="Butuan City" readonly>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label>Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" placeholder="Password" required name="pass">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label>Confirm Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" placeholder="Re-Type Password" required name="re_type">
						<p class="text-danger"><?php echo $error['password_match']; ?></p>
                        </div>
                        <div class="mb-3 col-md-12">
							<input type="checkbox" name="" class="">&nbspTerm and Condition <br>
							<div class="container">
								<p class="text-muted terms">
									The Bureau of Fire Protection is commited to protecting your privacy. This Privacy Policy explains how your personal information is collected and disclosed by The Bureau of Fire Protection.

									This Privacy Policy applies to our website, and it's associated subdomins(collectively, our "Service") alongside our application Bureau of Fire Protection. By accessing or using our Service, you signify that you have read,undertood, and agree to our collection,storage,use and disclosure of your personal information as described in this Privacy Policy and our Terms of Service.
								</p>
							</div>
						</div>
						<div class="mb-3 col-md-12">
							<?php $site_key = "6LcC86wcAAAAAOohkFSsLQ-Pa-6W21_hukOLMYoV"; ?>
							<div class="g-recaptcha" data-sitekey="<?php echo $site_key; ?>"></div>
						</div>
                        <div class="col-md-12">
                  
                           <button type="submit" class="btn btn-primary float-start" name="Register">Create Account</button>
                        </div>
                    </div>
                    <?php  
						$ip = new UserInfo();
						$brows = $ip->Browser();
						$os = $ip->Operating_System();
						$devi = $ip->Devices();
					?>
					
					<input type="hidden" value="<?php echo $brows ?>" name="browser">
					<input type="hidden" value="<?php echo $os ?>" name="Operating_System">
					<input type="hidden" value="<?php echo $devi ?>" name="Device">
                </form>
                <p class="text-center mt-3 text-secondary">If you have account, Please <a href="login.php">Login Now</a></p>
            </div>
        </div>
    </div>
</div>
	</div>
</body>
</html>