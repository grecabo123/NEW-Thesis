<?php
// require_once "core/function.php";
require_once 'connector/connect.php';
require_once "google/config.php";

if (isset($_GET['code'])) {
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);
}
else{
    header('Location: login.php');
    exit();
}
if(isset($token["error"]) != "invalid_grant"){
    
    $google_client->setAccessToken($token['access_token']);

    $_SESSION['access_token'] = $token['access_token'];

    $oAuth = new Google_Service_Oauth2($google_client);
    $userData = $oAuth->userinfo_v2_me->get();

    session_start();
    // $_SESSION['google_email'] = $userData['email'];

    $fname = mysqli_real_escape_string($conn,$userData->givenName);
    $lname = mysqli_real_escape_string($conn,$userData->family_name);
    $email = mysqli_real_escape_string($conn,$userData->email);

    // picture from google account.
    $pic = mysqli_real_escape_string($conn,$userData->picture);

    $mname = "";
    $contact = "";
    $hash = "";
    // session_start();
    $sql = "SELECT email from tbl_user WHERE email ='$email'";
    $result= mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        // if existed
        $_SESSION['google_email'] = $userData->email;
        header("location: user/bfp");
        exit();
    }
    else{
        // if the email not existed in database
        $sql = "INSERT INTO tbl_user (fname,mname,lname,email,password,contact,date_create) VALUES ('$fname',null,'$lname','$email','$hash',null,NOW())";
        $type= "Non-Personnel";
        $status = "Verified in Google";
    if (mysqli_query($conn,$sql) === TRUE) {
        $last_id = mysqli_insert_id($conn);
        // $google_picture = "INSERT INTO social_pic(url,facebook_id,Profile_fk) VALUES ('$pic',null,$last_id)";
        // if (mysqli_query($conn,$google_picture) === TRUE) {
            $insert_address = "INSERT INTO tbl_address (brgy,city,tbl_user_fk) VALUES (null,null,$last_id)";
            if (mysqli_query($conn,$insert_address) === TRUE) {
                $year = date("Y");
                $user_key = "BFP-USER-".$year."#"." ".$last_id;
                $account_type = "INSERT INTO tbl_account_type(account_registered,user_uniq_key,verified_key,tbl_user_fk,account) VALUES(NOW(),'$user_key',null,$last_id,'$status')";
                if (mysqli_query($conn,$account_type) === TRUE) {
                    $_SESSION['google_email'] = $userData->email;
                    header("location: user/bfp");
                    exit();
                }
            }
            // $_SESSION['google_email'] = $email;
           
        // }
        // else{
        //     header("location: login");
        //     exit();
        // }
    }
    else{
        header("location: login.php");
        exit();
        }
    }
}
else{
    header('Location: login.php');
    exit();
}
?>