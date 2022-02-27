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
               <!-- <link rel="stylesheet" href="../assets/css/dashbord.css"> -->
                <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <script type="text/javascript" src="../assets/js/fontawesome.js"></script>
                <link rel="stylesheet" href="../assets/css/user.css"/>
                <link rel="stylesheet" href="../assets/css/style.css"/>
                <link href="../assets/img/Icon/logo.png" rel="icon">
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
                                <div class="container-fluid dropdown_list">
                                    <!-- <div class="list-group-item bg-transparent list"> -->
                                        <li class="list-group text-justify list-group-item bg-transparent list"><a href="business_data" class="bg-transparent second-text fw-bold text-primary-active">Business Account</a></li>
                                        <li class="list-group text-left list-group-item bg-transparent list"><a href="table" class="bg-transparent second-text fw-bold ">Non Personnel</a></li>
                                    <!-- </div> -->
                                </div>

                                <!-- end of dropdown -->
                            <a href="signup" style="cursor: pointer;" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-table me-2"></i>Create Account</a>
                            <a href="application" style="cursor: pointer;" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-primary"><i class="fas fa-paperclip me-2"></i> Application Form</span></a>
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
                                    <div id="date" style="color: white; font-size: 17px;">
                                                <p id="time"></p>
                                    </div>
                                </ul>
                            </div>
                        </nav>

                        <div class="data-table">
                          <div class="m-4">
                            <h3 class="text-light">Application Form</h3>
                                <div class="table-responsive">
                                    <table class="table text-light">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-light">Ticket #</th>
                                                <th class="text-light">Permit Type:</th>
                                                <th class="text-light">Name of Business</th>
                                                <th class="text-light">Process</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table_data">
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    

                                </div>
                              </div>


   

    <!-- end of modal information -->

    <!-- end of create account for bfp personnel -->
        <?php
    }
?>

    
     <script type="text/javascript" src="../assets/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/admin.js"></script>
    <script type="text/javascript" src="../assets/js/date.js"></script>
   <script src="js/load.js"></script>


</script>


</body>

</html>