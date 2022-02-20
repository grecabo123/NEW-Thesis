<?php  

    session_start();
    if ($_SESSION['google_email']) {
        require '../connector/connect.php';
        $email = $_SESSION['google_email'];
        $search_row = "SELECT *from tbl_business WHERE business_email= '$email'";
        $result = mysqli_query($conn,$search_row);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $user_email = $row['business_email'];
                $user_id = $row['tbl_business_id'];
                $user_business_name = $row['business_name'];
                $business_type = $row['business_type'];
                $user_brgy = $row['business_brgy'];
                $user_contact = $row['business_contact'];
                $user_name = $row['name_of_person'];
                // $user_adr = $row['address'];
                Search($user_email,$user_id,$business_type,$user_brgy,$user_contact,$user_business_name,$user_name);
                break;
            }
        }   
    }
    else{
        echo "error";
        // header("location: ../login");
        // exit();
    }
?>
<?php
     function Search($user_email,$user_id,$business_type,$user_brgy,$user_contact,$user_business_name,$user_name){
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
    <link href="../assets/css/market.css" rel="stylesheet">
    <link href="../assets/img/Icon/logo.png" rel="icon">
     <link href="../assets/css/alertify.css" rel="stylesheet">
    <link href="../assets/css/alertify.min.css" rel="stylesheet">
    <title><?php echo $user_business_name ?></title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <?php  
            $_SESSION['user_id'] = $user_id;
        ?>
        <!-- Sidebar -->
        <div class="bg-dark-color" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><img src="../assets/img/Icon/logo.png" alt="Logo" class="img-thumbmail rounded-circle" width="100" height="100"> <br><span class="text-muted"><span style="font-size: 15px;"></span> <span class="text-muted" style="font-size: 12px; vertical-align: middle;"><?php echo $user_business_name ?><span> <br> <?php echo $business_type; ?> </span></span></span></div>
            <div class="list-group list-group-flush my-3">
                <a href="market.php" class="list-group-item list-group-item-action bg-transparent second-text  fw-bold"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="account.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" style="cursor: pointer;"><i
                        class="fas fa-project-diagram me-2"></i>Account</a>
                <a style="cursor: pointer;" href="status.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-comment-dots me-2"></i>Transaction</a>
                <a href="message.php" style="cursor: pointer;" class="list-group-item list-group-item-action bg-transparent second-text fw-bold chat-modal"><i class="fas fa-comment me-2"></i>Message <span class="badge bg-danger notification"></span></a>
                <a id="application" style="cursor: pointer;" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-warning"><i class="fab fa-wpforms me-2"></i>Application Form <span><i class="fas fa-caret-down" id="caret"></i></span></a>
                <!-- dropdownb -->
                <div class="container-fluid dropdown">
                    <!-- <div class="list-group-item bg-transparent list"> -->
                        <li class="list-group text-justify list-group-item bg-transparent list">
                            <a href="fsic_permit.php" class="bg-transparent second-text fw-bold text-primary-active">FSIC(Business Permit)</a>
                        </li>
                        <li class="list-group text-left list-group-item bg-transparent list">
                            <a href="fsec_permit.php" class="bg-transparent second-text fw-bold">FSEC (Building Permit)</a>
                        </li>
                        <li class="list-group text-left list-group-item bg-transparent list">
                            <a href="occupancy_permit.php" class="bg-transparent second-text fw-bold">FSIC (Occupancy Permit)</a>
                        </li>
                    <!-- </div> -->
                </div>

                <!-- end of dropdown -->
                
                <a id="report" style="cursor: pointer;" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-paperclip me-2"></i> Report <span><i class="fas fa-caret-down" id="caret-report"></i></span></a>
                  <!-- dropdownb -->
                <div class="container-fluid d-block">
                    <!-- <div class="list-group-item bg-transparent list"> -->
                        <li class="list-group text-justify list-group-item bg-transparent list"><a href="incident" class="bg-transparent second-text fw-bold incident">Incident Report</a></li>
                        <li class="list-group text-left list-group-item bg-transparent list"><a href="hazard" style="cursor: pointer;" class="bg-transparent second-text fw-bold text-primary">Hazard Report</a></li>
                    <!-- </div> -->
                </div>
                <!-- end of dropdown -->
                <a href="instruction.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-chalkboard-teacher me-2"></i>Instruction</a>
                <a href="../logout/logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
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
                        <h3 class="text-left modal-title fw-bold">Hazard/Complaint Report</h3>
                    </div>
                </div>
                <div class="modal-body">
                   
                        <div class="mb-7" class="form-label">
                            <input type="hidden" name="pk" class="form-control" value="<?php echo $user_id; ?>">
                            <input type="hidden" name="user_uniq_key" value="<?php echo $user_unique_key; ?>" class="form-control">
                        </div>
                        <div class="mb-7">
                            <label for="" class="form-label">
                                Street
                            </label>
                            
                            <input type="text" id="street"  required placeholder="Street" class="form-control">
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
                         
                       <div class="mb-7">
                            <label for="" class="form-label">
                                Landmark
                            </label>
                            <textarea name="lanmark" id="landmark" cols="5" rows="5" class="form-control" required></textarea>
                           
                        </div>
                        <br>
                        <div class="col-md-12" class="form-label">
                            <button id="hazard" class="btn btn-primary">Send Report</button>
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



   <script src="../assets/vendor/purecounter/purecounter.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../assets/js/fontawesome.js"></script>
    <script src="../assets/js/function.js"></script>
     <script src="../assets/js/alertify.js"></script>
    <script src="../assets/js/alertify.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/load.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>