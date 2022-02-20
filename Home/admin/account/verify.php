<?php  


	include '../../connector/connect.php';

	if (isset($_POST['send'])) {
		

		$id = mysqli_real_escape_string($conn,$_POST['id']);
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$name = mysqli_real_escape_string($conn,$_POST['name']);
		$type_business = mysqli_real_escape_string($conn,$_POST['type']);
		$update = "UPDATE tbl_business SET status = 1 WHERE tbl_business_id = $id";
		if (mysqli_query($conn,$update) === TRUE) {
			Send_Email($email,$name,$type_business);
		}
		else{
			exit();
		}
	}

?>


<?php  
	


	function Send_Email($email,$name,$type_business){

		require '../../smtp/PHPMailerAutoload.php';
		include '../../smtp/class.phpmailer.php';

		$email_temple = "../../email_template/approve.php";
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
		$message = str_replace('{{USER_NAME}}', $name, $message);
		$message = str_replace('{{EMAIL_ADD}}', $email, $message);
		$message = str_replace('{{BUSINESS}}', $type_business, $message);
		$mail->isHTML(true);
		$mail->CharSet="utf-8";
		$mail->Subject='Account Verified';
		$mail->MsgHTML($message);

		if (file_exists($email_temple)) {
			if ($mail->send()) {
				echo 1;
			}
			
		}
	}


?>