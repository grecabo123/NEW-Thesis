<?php  

    session_start();
    if ($_SESSION['business_id']) {
        require '../../connector/connect.php';
        $id = $_SESSION['business_id'];
        $search_row = "SELECT *from tbl_service_type JOIN tbl_client_info ON tbl_service_type.tbl_info_fk = tbl_client_info.client_info_id JOIN tbl_fcca_msg ON tbl_msg_fk = tbl_service_id  WHERE tbl_service_id= '$id' order by tbl_fcca_msg.date_msg desc";
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
        else{
            header("location: ../status");
            exit();
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
    <link href="../../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../../assets/css/user.css" rel="stylesheet">
    <link href="../../assets/css/market.css" rel="stylesheet">
    <link href="../../assets/css/alertify.css" rel="stylesheet">
    <link href="../../assets/css/alertify.min.css" rel="stylesheet">
    <link href="../../assets/img/Icon/logo.png" rel="icon">
    <link rel="stylesheet" href="css/style.css">
    
    <title><?php echo $user_business_name ?></title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <?php  
            $_SESSION['user_id'] = $user_id;
        ?>
        <!-- Sidebar -->
        <div class="bg-dark-color" id="sidebar-wrapper">

            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><img src="../../assets/img/Icon/logo.png" alt="Logo" class="img-thumbmail rounded-circle" width="100" height="100"> <br><span class="text-muted"><span style="font-size: 15px;"></span> <span class="text-muted" style="font-size: 12px; vertical-align: middle;"><?php echo $user_business_name ?><span> <br> Compilation of Occupancy</span></span></span></div>
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
                                <h3 class="text-left modal-title fw-bold">Re Submit for Payment</h3>
                            </div>
                        </div>
                        <div class="modal-header">
                            <div class="col-md-12">
                                <span class="text-left fw-bold fs-5">Message</span>
                                <br>
                                    <textarea name="" id="" cols="5" rows="5" class="form-control" style="resize: none;" readonly><?php echo $user_msg; ?></textarea>
                                    
                                <div class="col-md-12">
                                    <span class="terms">* <small class="text-info">You must send a legit file that will evaluate the personnel. If you send a dummy file your request will be deleted</small></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <!-- <form method="post" class="form-group"> -->

                                <div class="form-group mt-2">
                                    
                                    <label for="" class="form-label">
                                        Receipt #:
                                    </label>
                                    <input type="text" class="form-control" placeholder="QD3-xx-xx-xx" id="tranaction_code_fsec" required>
                                    <label for="" class="form-label">
                                        Name:
                                    </label>
                                    <input type="text" class="form-control" placeholder="" id="full_name_fsec" readonly value="<?php echo $user_name ?>">
                                    <label for="" class="form-label">
                                        Proxy Name:
                                    </label>
                                    <input type="text" class="form-control" placeholder="" id="proxy_fsec">
                                    <span class="terms"><small class="text-secondary">Optional Person(Ex: John)</small></span>
                                    <span class="terms"><small class="text-secondary">You can leave it blank</small></span>
                                    <br>
                                    <!-- textbox for ammount -->
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">&#8369;</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Amount" id="amount_fsec" step="0.01" required>
                                    </div>
                                    <label for="" class="form-label">
                                        Upload File
                                    </label>
                                    <input type="file" class="form-control" id="upload_file">
                                    <input class="d-none" type="text"  id="pk_id">
                                    <small id="emailHelp" class="form-text text-muted">(Ex.BDO,Palawan)</small>
                                    <small class="form-text text-danger error"></small>

                                    <br>
                                    <div class="mt-2">
                                        
                                        <button class="btn btn-primary" id="submit" disabled onclick="business_payment();" value="<?php echo $user_id; ?>">Submit</button>
                                    <button class="btn btn-danger" id="cancel">Cancel</button>
                                    </div>
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



    <script src="../../assets/vendor/purecounter/purecounter.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../../assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="../../assets/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../../assets/js/fontawesome.js"></script>
    <script src="../../assets/js/function.js"></script>
    <script src="../../assets/js/alertify.js"></script>
    <script src="../../assets/js/alertify.min.js"></script>
    <script src="../js/send.js"></script>
    <script src="../js/script.js"></script>
    
    
    
 
</body>

</html>