<?php  

    session_start();
    if ($_SESSION['google_email']) {
        require '../connector/connect.php';
        $email = $_SESSION['google_email'];
        $search_row = "SELECT *from tbl_user WHERE email= '$email'";
        $result = mysqli_query($conn,$search_row);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $user_email = $row['email'];
                $user_id = $row['tbl_user_id'];
                Search($user_email,$user_id);
                break;
            }
        }
        
    }
    else{
        header("location: ../login");
        exit();
    }
?>
<?php  
    function Search($user_email,$user_id)
    {
        require '../connector/connect.php';
        $data = "SELECT p.tbl_user_id, p.fname,p.mname,p.lname,p.contact,p.email,a.brgy,a.city,b.user_uniq_key,b.account from tbl_user as p JOIN tbl_address as a ON p.tbl_user_id = a.tbl_user_fk JOIN tbl_account_type as b ON b.tbl_user_fk = p.tbl_user_id  WHERE p.tbl_user_id = $user_id";
        $re = mysqli_query($conn,$data);
        while ($rows = mysqli_fetch_assoc($re)) {
            $user_id = $rows['tbl_user_id'];
            $user_fname = $rows['fname'];
            $user_mname = $rows['mname'];
            $user_lname = $rows['lname'];
            $user_contact = $rows['contact'];
            $user_email_a = $rows['email'];
            $user_brgy = $rows['brgy'];
            $user_city = $rows['city'];
            $user_acc = $rows['account'];
            // $user_img = $rows['url'];
            $user_unique_key =$rows['user_uniq_key'];
            User_data($user_id,$user_fname,$user_mname,$user_lname,$user_brgy,$user_contact,$user_email_a,$user_city,$user_unique_key,$user_acc);
            break;
        }
    }
?>

<?php
     function User_data($user_id,$user_fname,$user_mname,$user_lname,$user_brgy,$user_contact,$user_email_a,$user_city,$user_unique_key,$user_acc){
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/css/user.css" rel="stylesheet">
    <link href="../assets/img/Icon/logo.png" rel="icon">
    <link href="../assets/css/market.css" rel="stylesheet">

    <title><?php echo $user_fname." ".$user_lname;?></title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <?php  
            $_SESSION['user_id'] = $user_id;
        ?>
        <!-- Sidebar -->
        <div class="bg-dark-color" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><img src="../assets/img/Icon/logo.png" alt="Logo" class="img-thumbmail rounded-circle" width="100" height="100"> <br><span class="text-muted"><span style="font-size: 15px;">Name:</span> <span class="text-muted" style="font-size: 12px; vertical-align: middle;"><?php echo $user_fname." ".$user_lname; ?><span> <br> <?php echo $user_unique_key; ?> </span></span></span></div>
            <div class="list-group list-group-flush my-3">
                <a href="bfp" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="feedback" style="cursor: pointer;" class="list-group-item list-group-item-action bg-transparent second-text fw-bold chat-modal"><i class="fas fa-comment me-2"></i>Feedback</a>         
                <a id="report" style="cursor: pointer;" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-paperclip me-2"></i> Report <span><i class="fas fa-caret-down"></i></span></a>
                  <!-- dropdownb -->
                <div class="container-fluid d-block">
                    
                        <li class="list-group text-justify list-group-item bg-transparent list"><a href="incident" class="bg-transparent second-text fw-bold incident text-primary">Incident Report</a></li>
                        <li class="list-group text-left list-group-item bg-transparent list"><a href="hazard" style="cursor: pointer;" class="bg-transparent second-text fw-bold">Hazard Report</a></li>
                    <!-- </div> -->
                </div>
                <a  href="account" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" style="cursor: pointer;"><i
                        class="fas fa-project-diagram me-2"></i>Account</a>
                <!-- end of dropdown -->
                <a href="instruction" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-chalkboard-teacher me-2"></i>Instruction</a>
                <a href="../logout" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- end of sidebar -->

        <!-- page-content -->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-align-left text-muted fs-4 me-3" id="menu-toggle"></i>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                               	<div id="date" style="color: white; font-size: 17px;">
                               		<p id="time"></p>
                               	</div>
                            </li>
                        </ul>
                    </div>
                </nav>
               
               <div class="container ">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-12">
                        <!-- <img src="../assets/img/Icon/logo.png" alt="Logo" class="img-thumbmail rounded-circle" width="100" height="100"> -->
                        <h3 class="text-left modal-title fw-bold">Incident Report</h3>
                    </div>
                </div>
                <div class="modal-body">
                        <div class="mb-7">
                            <label for="" class="form-label">
                                Street
                            </label>
                            
                            <input type="text" id="street_inci"  required placeholder="Street" class="form-control">
                        </div>
                        
                        <div class="mb-7">
                            <label for="" class="form-label">
                                Barangay
                            </label>

                            <?php  
                                require '../connector/connect.php';

                                $sql = "SELECT *FROM barangay";
                                $result = mysqli_query($conn,$sql);
                                if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <select name="brgy" class="form-control" id="brgy_inci">
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
                         <div class="mb-7">
                            <label for="" class="form-label">
                                Incident Type
                            </label>
                            <select name="rescue" id="incident_type" class="form-control">
                                <option disabled selected>Choose Incident</option>
                                <option value="Medical">Medical</option>
                                <option value="Rescue">Rescue</option>
                            </select>
                        </div>
                       <div class="mb-7">
                            <label for="" class="form-label">
                                Landmark
                            </label>
                            <textarea id="lanmark_incident" cols="5" rows="5" class="form-control" required></textarea>
                           
                        </div>
                        <br>
                        <div class="col-md-12" class="form-label">
                            <button id="incident" class="btn btn-primary">Send Report</button>
                            <button class="btn btn-primary hide" type="button" disabled>
                              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Sending...
                            </button>
                        </div>
                    
                   
                </div>
            </div>
        </div>

         <div class="center_sp">
                    <div id="loading"></div>

                </div>
            
             
            </div>
            <!-- end of page-content -->


        </div>
        <!-- end of wrapper -->

    </div>
    </div>

        <?php
    }
?>

    <script type="text/javascript" src="../assets/js/date.js"></script>
    <script type="text/javascript" src="../assets/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../assets/js/fontawesome.js"></script>
    <script type="text/javascript" src="../assets/js/user.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script>



        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>