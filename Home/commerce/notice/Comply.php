<?php  

    session_start();
    if ($_SESSION['uniq_id']) {
        require '../../connector/connect.php';
        $id = $_SESSION['uniq_id'];

        $search_row = "SELECT *from tbl_service_type as service JOIN tbl_inspection_info as inspection ON service.tbl_service_id = inspection.tbl_service_fk JOIN tbl_client_info as client ON client.client_info_id = service.tbl_info_fk WHERE service.tbl_service_id= '$id' order by inspection.date_delivered_fcca desc";
        $result = mysqli_query($conn,$search_row);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $user_inspection_no = $row['inspection_no'];
                $user_building = $row['type_buidling'];
                $user_nature = $row['nature_of_ion'];
                $user_service = $row['service_type'];
                $user_file = $row['file_upload'];
                $user_id = $row['tbl_service_id'];
                $user_esta = $row['business_name'];
                $user_owner = $row['business_owner'];
                // $user_adr = $row['address'];
                Search($user_inspection_no,$user_building,$user_nature,$user_service,$user_file,$user_id,$user_esta,$user_owner);
                break;
            }
        }
    }
    else{
        header("location: ../status");
        exit();
    }
?>
<?php
     function Search($user_inspection_no,$user_building,$user_nature,$user_service,$user_file,$user_id,$user_esta,$user_owner){
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
    <link rel="stylesheet" href="../../assets/fonts/opensan.css">
    
    <title>Notice to Comply</title>
</head>
<body>
    <div class="d-flex" id="wrapper">
       
        <!-- Sidebar -->
        <div class="bg-dark-color" id="sidebar-wrapper">

            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><img src="../../assets/img/Icon/logo.png" alt="Logo" class="img-thumbmail rounded-circle" width="100" height="100"> <br><span class="text-muted"><span style="font-size: 15px;"></span> <span class="text-muted" style="font-size: 12px; vertical-align: middle;"><span> Notice To Comply</span></span></span></div>
            <div class="list-group list-group-flush my-3">
               
                <a id="application" style="cursor: pointer;" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-warning"><i class="fas fa-file-pdf me-2 fs-5"></i><span><i class="fas fa-caret-down"></i></span></a>
                <!-- dropdownb -->
                <div class="container-fluid d-block">
                    <!-- <div class="list-group-item bg-transparent list"> -->
                        <li class="list-group text-justify list-group-item bg-transparent list">
                            <a class="bg-transparent second-text fw-bold text-primary-active fsic-business text-primary">Document Files</a>
                        </li>
                        <div class="list_file">
                            
                        </div>                  <!-- </div> -->
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
                                    
                                        <button class="btn btn-secondary" onclick="refresh();" ><i class="fas fa-undo"></i> Refresh</button>
                                    
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>


                <div class="container">
                    <div class="modal-content">
                        <div class="modal-header bg-secondary">
                            <div class="col-md-12">
                                <h3 class="text-left modal-title fw-bold text-light">Notice To Comply</h3>
                            </div>
                        </div>
                        <div class="modal-header">
                            <div class="col-md-12">
                                <!-- <span class="text-left fw-bold fs-5">Message</span>
                                <br>
                                    <textarea name="" id="" cols="5" rows="5" class="form-control" style="resize: none;" readonly></textarea> -->
                                    
                                <div class="col-md-12 text_font">
                                    <span class="terms"><span class="fw-bold">Note:</span> <ul>
                                        <li><small class="text-secondary">If you comply <strong>(Defects/Deficiencies)</strong> after inspection you may submit and wait for 15days for Re-inspection.</small></li>
                                        <li><small class="text-secondary">To View the Result during inspection please see in the document files that already uploaded from inspector</small></li>
                                        <li><small class="text-secondary">Verify your data also if that data is yours.</small></li>
                                    </ul></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <!-- <form method="post" class="form-group"> -->

                                <div class="form-group mt-2">
                                    
                                    <label for="" class="form-label">
                                        Inspection Number
                                    </label>
                                    <input type="text" class="form-control" id="inspection_num" readonly value="<?php echo $user_inspection_no ; ?>">
                                    <label for="" class="form-label">
                                        Name of Establishment
                                    </label>
                                    <input type="text" class="form-control" placeholder="" id="full_name" readonly value="<?php echo $user_esta; ?>">
                                    <label for="" class="form-label">
                                        Name of Owner
                                    </label>
                                    <input type="text" class="form-control" placeholder="" id="owner" value="<?php echo $user_owner; ?>" readonly>
                                    <span class="terms"><small class="text-secondary">Optional Person(Ex: John)</small></span>
                                    <span class="terms"><small class="text-secondary">You can leave it blank</small></span>
                                    <br>
                                    <!-- textbox for ammount -->
                                   
                                    <div class="mt-2">
                                        
                                        <button class="btn btn-primary" id="submit" value="<?php echo $user_id; ?>">Submit & Ready</button>
                                    <button class="btn btn-danger" id="cancel">Cancel</button>
                                    </div>
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





    <script src="../../assets/vendor/purecounter/purecounter.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../../assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="../../assets/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../../assets/js/fontawesome.js"></script>
    <!-- <script src="../../assets/js/function.js"></script> -->
    <script src="../../assets/js/alertify.js"></script>
    <script src="../../assets/js/alertify.min.js"></script>
    <script src="../js/send.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/notice.js"></script>
    <script src="../../assets/PDFViewer/PDFObject-master/pdfobject.min.js"></script>
    
    
    
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>