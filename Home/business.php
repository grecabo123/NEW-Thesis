<?php  
    


    include 'IP/user.php';
    require 'connector/connect.php';

    if (isset($_POST['business']) && isset($_FILES['file_name'])) {
        $name = mysqli_real_escape_string($conn,$_POST['business_name']);
        $owner = mysqli_real_escape_string($conn,$_POST['owner']);
        $email = mysqli_real_escape_string($conn,$_POST['business_email']);
        $type = mysqli_real_escape_string($conn,$_POST['type_business']);
        $business_contact = mysqli_real_escape_string($conn,$_POST['business_contact']);
        $business_brgy = mysqli_real_escape_string($conn,$_POST['business_brgy']);
        $business_address = mysqli_real_escape_string($conn,$_POST['business_address']);
        $business_pass = mysqli_real_escape_string($conn,$_POST['business_pass']);
        // $IP = mysqli_real_escape_string($conn,$_POST['ip']);
        $Browser = mysqli_real_escape_string($conn,$_POST['browser']);
        $OS = mysqli_real_escape_string($conn,$_POST['Operating_System']);
        $Device = mysqli_real_escape_string($conn,$_POST['Device']);
        // $check = mysqli_real_escape_string($conn,$_POST['agree']);
        $business_re_type = mysqli_real_escape_string($conn,$_POST['business_re_type']);



        // Recapcha 
        $response_key = $_POST['g-recaptcha-response'];
        $site_key = "6LcC86wcAAAAAOohkFSsLQ-Pa-6W21_hukOLMYoV";
        $secret_key = "6LcC86wcAAAAABV5pNgNPxlgiW2oVU_XwbYSbaK5";
        $verify_url = "https://www.google.com/recaptcha/api/siteverify";


        $filename = $_FILES['file_name']['name'];
        $filesize = $_FILES['file_name']['size'];
        $tmp_file = $_FILES['file_name']['tmp_name'];
        $error = $_FILES['file_name']['error'];

        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            header("location: signup?email");
            exit();
        }
        else{
            if (strlen($business_pass) > 8) {
                    if ($business_pass == $business_re_type) {
                        if ($error === 0) {
                            if ($filesize > 2350000) {
                                $em = "Too large";
                                header("location: signup?file=$em");
                                exit();
                            }
                            else{
                                $file_ex = pathinfo($filename,PATHINFO_EXTENSION);
                                $file_type = strtolower($file_ex);
                                $allowed_type = array("jpg","png","jpeg","txt","pdf");
                                if (in_array($file_type,$allowed_type)) {
                                    $id_user = $user_key." ".$pk;
                                    $new_file_name = uniqid("BFP",true).".".$file_type;
                                    $file_destination = "upload/".$new_file_name;
                                    move_uploaded_file($tmp_file,$file_destination);
                                    $hash = password_hash($business_pass, PASSWORD_BCRYPT);
                                    $sql = "INSERT INTO tbl_business(business_name,name_of_person,business_type,business_email,business_password,business_contact,business_brgy,business_attach,date_create) VALUES('$name','$owner','$type','$email','$hash','$business_contact','$business_brgy','$new_file_name',NOW())";
                                    if (mysqli_query($conn,$sql) === TRUE) {
                                        session_start();
                                        $_SESSION['email'] = $email;
                                        header("location: success.php");
                                        exit();
                                    }
                                    else{
                                        header("location: signup.php?failed");
                                        exit();
                                    }
                                }
                                else{
                                    header("location: signup.php?type");
                                    exit();
                                }
                            }
                        }
                        else{
                            header("location: signup.php?error");
                            exit();
                        }
                    }
                    else{
                        header("location: signup.php?not");
                            exit();
                    }
                }
                else{
                    header("location: signup.php?passsword");
                            exit();
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
		    <a class="navbar-brand p-4" href="./">
		    	<span class="text-light text-capitalize fs-4">&nbspbureau of fire protection</span>
		    </a>
		   	<a class="active" href="register.php">User Account</a>
		  </div>
	</nav>
<!-- header -->

	<br>
	<div class="jumbotron text-center">
		<div class="container">
			<!-- <h3>Create Account</h3> -->
		</div>
	</div>
	<div class="business">
        <div class="container">
    <div class="row">
        <div class="col-md-12 offset-md-0">
            <div class="signup-form">
                <form class="mt-5 border p-4 bg-light shadow" id="form-sign" method="POST" action="business" enctype="multipart/form-data">
                    <div class="container">
                        <h4>FAQ</h4>
                        <p class="text-muted text-wrap fs-6">
                            • If you are creating an account for business you must fill up all the fields and wait for the confirmation for the personnel to verify your account for business.
                        </p>
                        <p class="text-muted text-wrap fs-6">
                            • If you have an account for business you can apply kind of permits through online.
                        </p>
                    </div>
                    <h4 class="mb-5 text-secondary">Business Account</h4>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label>Name of Business<span class="text-danger">*</span></label>
                            <input type="text" id="business_name" class="form-control" placeholder="" required name="business_name">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label>Name of Owner<span class="text-danger">*</span></label>
                            <input type="text" id="owner name" class="form-control" placeholder="" required name="owner">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label>Business Email<span class="text-danger">*</span></label>
                            <input type="text" id="business_email" class="form-control" placeholder="" required name="business_email">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label>Types of Business<span class="text-danger">*</span></label>
                            <select name="type_business" id="type_business" class="form-control">
                                <option disabled selected>Type of Business</option>
                                <option value="Corporation">Corporation</option>
                                <option value="LLC">Limited Liability Company (LLC)</option>
                                <option value="Sole Proprietorship">Sole Proprietorship</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">
                                Document
                            </label>
                            <input type="file" name="file_name" id="file" required class="form-control">
                            <span class="terms text-danger">* <small class="text-info">Valid Proof of Document(PNG JPG JPEG PDF)</small></span>
                            <br>
                            <span class="terms text-danger">* <small class="text-info">Payment of Assesment From <strong>City Hall</strong></small></span>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label>Contact<span class="text-danger">*</span></label>
                            <input type="text" id="business_contact" maxlength="11" class="form-control" placeholder="" required name="business_contact">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label>Barangay<span class="text-danger">*</span></label>
                            <?php  
                                require 'connector/connect.php';

                                $sql = "SELECT *FROM barangay";
                                $result = mysqli_query($conn,$sql);
                                if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <select name="business_brgy" class="form-control" id="brgy">
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
                            <label>Address<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="" name="business_address" required name="business_address">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label>City<span class="text-danger">*</span></label>
                            <input type="text" id="city" class="form-control" placeholder="" name="city" value="Butuan City" readonly>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label>Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" placeholder="Password" required name="business_pass">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label>Confirm Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" placeholder="Re-Type Password" required name="business_re_type">    
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
                  
                           <button type="submit"  class="btn btn-primary float-start" name="business">Create Account</button>
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