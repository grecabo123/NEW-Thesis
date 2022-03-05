<?php  

    session_start();
    if ($_SESSION['occupancy_num']) {
        require '../connector/connect.php';
        $id = $_SESSION['occupancy_num'];

        $search_row = "SELECT *from tbl_service_type JOIN tbl_client_info ON tbl_service_type.tbl_info_fk = tbl_client_info.client_info_id JOIN tbl_cro_msg ON tbl_cro_msg_fk = tbl_service_id WHERE tbl_service_id= $id order by date_msg DESC";
        $result = mysqli_query($conn,$search_row);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $user_email = $row['email'];
                $user_id = $row['tbl_service_id'];
                $user_business_name = $row['business_name'];
                $user_name = $row['business_owner'];
                $user_contact = $row['contact_number'];
                $user_msg = $row['message'];
                // $user_adr = $row['address'];
                Search($user_email,$user_id,$user_contact,$user_business_name,$user_name,$user_msg);
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
     function Search($user_email,$user_id,$user_contact,$user_business_name,$user_name,$user_msg){
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
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><img src="../assets/img/Icon/logo.png" alt="Logo" class="img-thumbmail rounded-circle" width="100" height="100"> <br><span class="text-muted"><span style="font-size: 15px;"></span> <span class="text-muted" style="font-size: 12px; vertical-align: middle;"><?php echo $user_business_name ?><span> <br> Compilation of Occupancy</span></span></span></div>
            <div class="list-group list-group-flush my-3">
               
                <a id="application" style="cursor: pointer;" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-warning"><i class="fab fa-wpforms me-2"></i>Compliation Form <span><i class="fas fa-caret-down"></i></span></a>
                <!-- dropdownb -->
                <div class="container-fluid d-block">
                    <!-- <div class="list-group-item bg-transparent list"> -->
                        <li class="list-group text-justify list-group-item bg-transparent list">
                            <a class="bg-transparent second-text fw-bold text-primary-active fsic-business text-primary">FSIC (Occupancy Permit)</a>
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
                
                
                    <div class="">
                <div class="container">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="col-md-12">
                                <h3 class="text-left modal-title fw-bold">Occupancy Permit</h3>
                            </div>
                        </div>
                        <div class="modal-header">
                            <div class="col-md-12">
                                <span class="text-left fw-bold fs-5">Requirements</span>
                                <ul class="d-flex">
                                    <div class="col-md-6">
                                        <li><span class="text-capitalize text-secondary">Endorsement from BO/certificate of completion</span></li>
                                        <li><span class="text-capitalize text-secondary">Building Completion Certification</span></li>
                                        <li><span class="text-capitalize text-secondary">Electrical Completion Certification</span></li>
                                    </div>
                                    <div class="col-md-6">
                                         <li><span class="text-capitalize text-secondary">Recommendedation (optional)</span></li>
                                    <li><span class="text-capitalize text-secondary">BFP O.R</span></li>
                                    <li><span class="text-capitalize text-secondary">Fire Safety Evaluation Clearance</span></li>
                                    </div>
                                </ul>
                                <div class="col-md-12">
                                    <span class="text-dark fw-bold">Note: <p class="text-secondary">You must send a legit file that will evaluate the personnel. If you send a dummy file your request will be deleted</p></span>
                                </div>
                                <textarea name="" id="" cols="5" rows="5" class="form-control" readonly style="resize: none;"><?php echo $user_msg; ?></textarea>
                            </div>
                        </div>
                        <div class="modal-body">
                            <!-- <form method="post" class="form-group"> -->

                                <div class="mb-1" class="form-label">
                                    <input type="hidden" name="pk" class="form-control" value="<?php echo $user_id; ?>">
                                    <input type="hidden" name="user_uniq_key" value="<?php echo $user_unique_key; ?>" class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label for="" class="form-label">
                                        Name of the Business
                                    </label>
                                    <input type="hidden" name="permit_type" value="FSIC-Occupancy Permit" class="form-control" id="permit_type">
                                    <input type="text" id="name_business" name="establisment" placeholder="Name of Establishment" class="form-control" readonly value="<?php echo $user_business_name; ?>">
                                </div>
                                 <div class="mb-1">
                                    <label for="" class="form-label">
                                        Email
                                    </label>
                                    <input type="text" id="user_email" name="purpose" placeholder="Purpose of Occupancy Permit" class="form-control" readonly value="<?php echo $user_email; ?>">
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
                                    <input type="text" id="name_p" name="owner_name" placeholder="Name of Owner/Representative" class="form-control" readonly value="<?php echo $user_name; ?>">
                                </div>
                                <div class="mb-1">
                                    <label for="" class="form-label">
                                        Contact #
                                    </label>
                                    <input type="text" id="contact_occupancy" name="contact" placeholder="Contact #" class="form-control" readonly value="<?php echo $user_contact; ?>">
                                </div>
                                <div class="mb-1">
                                    <label for="" class="fw-bold">
                                        Endorsement from BO/certificate of completion <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" id="endorse">
                                    <span class="text-danger">*<small class="text-info">Valid Proof of Document(Format - PNG JPG JPEG PDF)</small>&nbsp<span class="text-danger fs-6 endorse_error"></span><br></span>
                                </div>
                                <div class="mb-2">
                                    <label for="" class="fw-bold">
                                       Building Completion Certification <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" id="building_certificate">
                                    <span class="text-danger">*<small class="text-info">Valid Proof of Document(Format - PNG JPG JPEG PDF)</small>&nbsp<span class="text-danger fs-6 error_building"></span><br></span>
                                </div>
                                <div class="mb-2">
                                    <label for="" class="fw-bold">
                                        Electrical Completion Certification <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" id="electrical">
                                    <span class="text-danger">*<small class="text-info">Valid Proof of Document(Format - PNG JPG JPEG PDF)</small>&nbsp<span class="text-danger fs-6 error_electrical"></span><br></span>
                                </div>
                                <div class="mb-2">
                                    <label for="" class="fw-bold">
                                       BFP O.R <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" id="bfp_or">
                                    <span class="text-danger">*<small class="text-info">Valid Proof of Document(Format - PNG JPG JPEG PDF)</small>&nbsp<span class="text-danger fs-6 error_occu"></span><br></span>
                                </div>
                                <div class="mb-2">
                                    <label for="" class="fw-bold">
                                       Fire Safety Evaluation Clearance <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" id="fsec_clearance">
                                    <span class="text-danger">*<small class="text-info">Valid Proof of Document(Format - PNG JPG JPEG PDF)</small>&nbsp<span class="text-danger fs-6 error_clearance"></span><br></span>
                                </div>
                                <br>
                                <div class="col-md-12" class="form-label">
                                    <button class="btn btn-primary" name="submit" onclick="update_occu();" id="occupancy" disabled value="<?php echo $user_id; ?>">Submit</button>
                                    <button class="btn btn-primary hide" type="button" disabled>
                                          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                          Processing...
                                        </button>
                                </div>
                            <!-- </form> -->
                        </div>
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