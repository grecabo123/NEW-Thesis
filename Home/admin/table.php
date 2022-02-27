<?php  

    session_start();
    if ($_SESSION['user']) {
        admin();
    }
    else{
        header("location: index");
        exit();
    }
?>

<?php  
    function admin(){
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <script type="text/javascript" src="../assets/js/fontawesome.js"></script>
                <link rel="stylesheet" href="../assets/css/user.css"/>
                <link rel="stylesheet" href="../assets/css/style.css"/>
                <link href="../assets/img/Icon/logo.png" rel="icon">
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <title>Admin</title>
            </head>
            <body>
                <div class="d-flex" id="wrapper">
                    <!-- Sidebar -->
                    <div class="bg-dark-color" id="sidebar-wrapper">
                        <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><img src="../assets/img/Icon/logo.png" alt="Logo" class="img-thumbmail" width="100" height="100"><br><span class="text-muted"><span style="font-size: 15px;"></span> <span class="text-muted" style="font-size: 12px; vertical-align: middle;">Super Admin <br> City Fire Marshal</span></span></div>
                        <div class="list-group list-group-flush my-3">
                            <a href="dashboard" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                    class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                            <a id="data-table" style="cursor: pointer;" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-project-diagram me-2"></i>Data <i class="fas fa-caret-down" id="caret"></i></a>
                               <!-- dropdownb -->
                                <div class="container-fluid d-block">
                                    <!-- <div class="list-group-item bg-transparent list"> -->
                                        <li class="list-group text-justify list-group-item bg-transparent list"><a href="business_data" class="bg-transparent second-text fw-bold">Business Account</a></li>
                                        <li class="list-group text-left list-group-item bg-transparent list"><a href="table" class="bg-transparent second-text fw-bold text-primary">Non Personnel</a></li>
                                    <!-- </div> -->
                                </div>
                                <!-- end of dropdown -->
                            <a href="signup" style="cursor: pointer;" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-table me-2"></i>Create Account</a>
                            <a href="application" style="cursor: pointer;" class="list-group-item list-group-item-action bg-transparent second-text fw-bold position-relative"><i class="fas fa-paperclip me-2"></i> Application Form</a>
                            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold position-relative"><i
                            class="fas fa-comment-dots me-2"></i>Report</span></a>
                            <a href="map" class="list-group-item list-group-item-action bg-transparent second-text fw-bold position-relative"><i class="fas fa-map-marked me-2"></i>Map</span></a>

                            <a href="logout" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                                    class="fas fa-power-off me-2"></i>Logout</a>
                        </div>
                    </div>
                    <!-- /#sidebar-wrapper -->

                    <!-- Page Content -->
                    <div id="page-content-wrapper">
                        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-align-left text-muted fs-4 me-3" id="menu-toggle"></i>
                                <!-- <h2 class="fs-2 m-0 ">Dashboard</h2> -->
                            </div>

                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                    <!-- <li class="nav-item dropdown"> -->
                                        <!-- <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false"> -->
                                            <div id="date" style="color: white; font-size: 17px;">
                                                <p id="time"></p>
                                            </div>
                                        <!-- </a> -->
                                    <!-- </li> -->
                                </ul>
                            </div>
                        </nav>

                    <!-- Non Personnel data-->
                    <!-- table data -->
                       <div class="m-4">
                            <div class="text-light">
                                <h3 class="fs-5">User Account Data</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-light">
                                    <thead>
                                        <tr>
                                            <th class="text-light">#</th>
                                            <th class="text-light">Name:</th>
                                            <th class="text-light">Email</th>
                                            <th class="text-light">Type</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_data">
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <!-- end of non perosnnel data -->
                    <!-- end of table data -->
                   
            </div>
        </div>
                <!-- /#page-content-wrapper -->

        </div>


    <div style="display:none;">
    <div id="dlgContent" class="bg-dark">
      <span>Do you want to Delete this  ?</span>
    </div>
  </div>

    <!-- end of modal information -->

    <!-- end of create account for bfp personnel -->
        <?php
    }
?>


   



    <!-- <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script> -->
    <script type="text/javascript" src="../assets/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/admin.js"></script>
    <script type="text/javascript" src="../assets/js/date.js"></script>
    <script src="js/user.js"></script>




</body>

</html>