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
                $user_name = $row['name_of_person'];
                $business_type = $row['business_type'];
                $user_brgy = $row['business_brgy'];
                $user_contact = $row['business_contact'];
                // $user_adr = $row['address'];
                Search($user_email,$user_id,$business_type,$user_brgy,$user_contact,$user_business_name,$user_name);
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
    <link href="../assets/css/alertify.css" rel="stylesheet">
    <link href="../assets/css/alertify.min.css" rel="stylesheet">
    <link href="../assets/img/Icon/logo.png" rel="icon">
    
    <title><?php echo $user_business_name ?></title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <?php  
            $_SESSION['user_id'] = $user_id;
        ?>
        <!-- Sidebar -->
        <div class="bg-dark-color" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><img src="../assets/img/Icon/logo.png" alt="Logo" class="img-thumbmail rounded-circle" width="100" height="100"> <br><span class="text-muted"><span style="font-size: 15px;"></span> <span class="text-muted" style="font-size: 12px; vertical-align: middle;"><?php echo $user_business_name ?><span> <br> <?php echo $business_type."-".$user_id; ?> </span></span></span></div>
            <div class="list-group list-group-flush my-3">
               
                <a id="application" style="cursor: pointer;" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-warning"><i class="fab fa-wpforms me-2"></i>Compliation Form <span><i class="fas fa-caret-down"></i></span></a>
                <!-- dropdownb -->
                <div class="container-fluid d-block">
                    <!-- <div class="list-group-item bg-transparent list"> -->
                        <li class="list-group text-justify list-group-item bg-transparent list">
                            <a class="bg-transparent second-text fw-bold text-primary-active fsic-business text-primary">FSEC (Building Permit)</a>
                        </li>                    <!-- </div> -->
                </div>

                <!-- end of dropdown -->
                
            
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
                
                
                    <div class="container">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="col-md-12">
                                    <h3 class="text-left modal-title fw-bold">FSEC Building Permit</h3>
                                </div>
                            </div>
                            <div class="modal-header">
                                <div class="col-md-12">
                                    <span class="text-left fw-bold fs-5">Requirements</span>
                                    <ul class="d-flex">
                                    <div class="col-md-6">
                                        <li><span class="text-capitalize text-secondary">Business Permit/Assessment Order</span></li>
                                        <li><span class="text-capitalize text-secondary">Insurance Policy, If any</span></li>
                                        <li><span class="text-capitalize text-secondary">BFP O R. (FIFE CODE FEES)</span></li>
                                    </div>
                                    <div class="col-md-6">
                                         <li><span class="text-capitalize text-secondary">BFP Recommendation(if any)</span></li>
                                    
                                    </div>
                                </ul>
                                <div class="col-md-12">
                                    <span class="text-dark fw-bold">Note: <p class="text-secondary">You must send a legit file that will evaluate the personnel. If you send a dummy file your request will be deleted</p></span>
                                </div>
                                </div>
                            </div>
                           <div class="modal-body">
                            <!-- <form action="fsec" method="post" class="form-group" enctype="multipart/form-data"> -->
                                <div class="mb-1" class="form-label">
                                     <input type="hidden" name="permit_type" value="FSEC-Permit" class="form-control" id="owner_fsec">
                                </div>
                                <div class="mb-1">
                                    <label for="" class="form-label">
                                        Name of Building/Structure
                                    </label>
                                    <input type="text" id="establisment" name="establisment" placeholder="Name of Structure" class="form-control" readonly value="<?php echo $user_business_name; ?>">
                                </div>
                                <div class="mb-1">
                                    <label for="" class="form-label">
                                        Email
                                    </label>
                                    <input type="text" id="email" name="email" placeholder="Purpose of Occupancy Permit" class="form-control" readonly value="<?php echo $user_email; ?>">
                                </div>
                                 <div class="mb-1">
                                    <label for="" class="form-label">
                                        Purpose
                                    </label>
                                    <select name="" id="purpose-fsec" class="form-control">
                                        
                                        <option value="Building">Building</option>
                                        <option value="Structure">Structure</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                 <div class="mb-1">
                                    <label for="" class="form-label">
                                        Name of Person
                                    </label>
                                    <input type="text" id="owner-fsec" name="owner_name" placeholder="Name of Owner/Representative" class="form-control" readonly value="<?php echo $user_name; ?>">
                                </div>
                                 <div class="mb-1">
                                    <label for="" class="form-label">
                                        Contact
                                    </label>
                                    <input type="text" id="contact-fsec" name="contact"  placeholder="Contact #" class="form-control" readonly value="<?php echo $user_contact; ?>">
                                </div>
                                <div class="mb-1">
                                    <label for="" class="fw-bold">
                                        Building Specification <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" name="file_endorse" id="building_speficification">
                                    <span class="text-danger">*<small class="text-info">Valid Proof of Document(Format - PNG JPG JPEG PDF)</small><span class="text-danger fs-6 error"></span><br></span>
                                </div>
                                <div class="mb-2">
                                    <label for="" class="fw-bold">
                                       Bill of Materials <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" name="file_building" id="file_building">
                                    <span class="text-danger">*<small class="text-info">Valid Proof of Document(Format - PNG JPG JPEG PDF)</small><span class="text-danger fs-6 error_i"></span><br></span>
                                </div>
                                <div class="mb-2">
                                    <label for="" class="fw-bold">
                                        BFP O.R. (FIRE CODE FEES) <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" id="file_bfp_or">
                                    <span class="text-danger">*<small class="text-info">Valid Proof of Document(Format - PNG JPG JPEG PDF)</small><span class="text-danger fs-6 error_o"></span><br></span>
                                </div>
                                <div class="mb-2">
                                    <label for="" class="fw-bold">
                                       Voltage Drop & Circuit Calculation <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" id="voltage">
                                    <span class="text-danger">*<small class="text-info">Valid Proof of Document(Format - PNG JPG JPEG PDF)</small><span class="text-danger fs-6 error_v"></span><br></span>
                                </div>
                               
                                <br>
                                <div class="col-md-12" class="form-label">
                                   <button disabled id="submit" class="btn btn-primary" onclick="update_fsec();">Submit</button>
                                    <button class="btn btn-primary hide" type="button" disabled>
                                          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                          Processing...
                                    </button>


                                </div>
                            <!-- </form> -->
                        </div>
                        </div>
                    </div>
                <!-- for analutyxadaw -->
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
    <script src="js/send.js"></script>
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