<!-- facebook -->
	<?php  
		require_once 'config.php';
		
		if (isset($accessToken)) {
			if (!isset($_SESSION['facebook_access_token'])) 
			{
				//get short-lived access token
				$_SESSION['facebook_access_token'] = (string) $accessToken;
				
				//OAuth 2.0 client handler
				$oAuth2Client = $fb->getOAuth2Client();
				
				//Exchanges a short-lived access token for a long-lived one
				$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
				$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
				
				//setting default access token to be used in script
				$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
			} 
			else 
			{
				$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
			}
			if (isset($_GET['code'])) 
			{
				// header('Location: main');
			}	
			try {

				require 'connector/connect.php';
				$fb_response = $fb->get('me?fields=id,first_name,last_name,email');
				$fb_response_picture = $fb->get('/me/picture?redirect=false&height=300');
				
				$fb_user = $fb_response->getGraphUser();
				$picture = $fb_response_picture->getGraphUser();

				$fb_id = mysqli_real_escape_string($conn,$fb_user->getProperty('id'));
				$fname = mysqli_real_escape_string($conn,$fb_user->getProperty('first_name'));
				$lname = mysqli_real_escape_string($conn,$fb_user->getProperty('last_name'));
				$email = mysqli_real_escape_string($conn,$fb_user->getProperty('email'));
				$url_img = mysqli_real_escape_string($conn,$picture['url']);
				$search = "SELECT email from tbl_user WHERE email = '$email'";
				$result = mysqli_query($conn,$search);
				if (mysqli_num_rows($result) > 0) {
					// if the information of user from facebook is existed our server 
					// go to the secret page
					$_SESSION['google_email'] = $fb_user->getProperty('email');
					header("location: user/bfp");
					exit();
				}
				else{
					// if the information of user from facebook does not exist
					// insert into table to save the information of user data
					$pass = "";
					$insert = "INSERT INTO tbl_user (fname,mname,lname,email,password,contact,date_create) VALUES('$fname',null,'$lname','$email','$pass',null,NOW())";
					$type= "Non-Personnel";
					$status = "Verified in Facebook";
					if (mysqli_query($conn,$insert) === TRUE) {
						$last_key = mysqli_insert_id($conn);
						// $insert_facebook_pic = "INSERT INTO social_pic(url,facebook_id,Profile_fk) VALUES('$url_img',$fb_id,$last_key)";
						// if (mysqli_query($conn,$insert_facebook_pic) === TRUE) {
							$insert_address = "INSERT INTO tbl_address (brgy,city,tbl_user_fk) VALUES (null,null,$last_key)";
							if (mysqli_query($conn,$insert_address) === TRUE) {
								$year = date("Y");
								$user_key = "BFP-USER-".$year."#"." ".$last_key;
								$account_type = "INSERT INTO tbl_account_type(account_registered,user_uniq_key,verified_key,tbl_user_fk,account) VALUES(NOW(),'$user_key',null,$last_key,'$status')";
								if (mysqli_query($conn,$account_type) === TRUE) {
									$_SESSION['google_email'] = $fb_user->getProperty('email');
									header("location: user/bfp");
									exit();
								}
							}
						// }
						// else{
						// 	header("location: ../login");
						// 	exit();
						// }
					}
					else{
						header("location: ../login");
						exit();
					}
				}
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
				echo 'Facebook API Error: ' . $e->getMessage();
				session_destroy();
				header("Location: ./");
				exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
				echo 'Facebook SDK Error: ' . $e->getMessage();
				exit;
			}
		}
		else {
			$login_fb_url = $fb_helper->getLoginUrl(FB_BASE_URL);
		}

	?>


<!-- end of facebook -->



