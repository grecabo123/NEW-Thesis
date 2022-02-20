<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" type="icon/png" href="image/logo.png" sizes="10x10">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/dashbord.css">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <title>Success Created Account</title>
    
</head>
<body>

    <div class="background">
    <nav class="navbar p-4 background-head">
        <div class="container-fluid">
             <a class="navbar-brand" href="index">
                
                <span class="text-muted text-capitalize fs-4">bureau of fire protection</span>
            </a>
        </div>
    </nav>

    <!-- 
        <div class="container size">
            <div class="box">

                <p class="text-muted fs-5 text-center">Hello Geo Your Application has been created. kindly wait for your confirmation account. Your account in business will approved the admin</p>
            </div>
        </div> -->

        <div class="container">
        <div class="jumbotron">
            <div class="page-heading text-center mt-4">
                <div class="container col-md-7">
                    <h1 class="display-3">Thank You!</h1>
                        <p class=""><strong>Please wait a moment</strong> the admin will approved your account.!</p>
                    <hr>
                    <p class="text-primary bg-secondary fs-4 p-2 text-light w-100 rounded">
                        
                        <?php  
                        session_start();
                        // require 'connector/connect.php';
                        $email = $_SESSION['email'];

                        echo $email;
                    ?>

                    </p>
                    <div class="container">
                        <div class="col-md-12">
                            <a href="index" class="btn btn-primary w-25 rounded">Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    
</body>
</html>