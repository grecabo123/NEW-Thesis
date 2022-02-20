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
                <link rel="stylesheet" href="../assets/css/dashbord.css">
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
                                <div class="container-fluid dropdown_list">
                                    <!-- <div class="list-group-item bg-transparent list"> -->
                                        <li class="list-group text-justify list-group-item bg-transparent list"><a href="business_data" class="bg-transparent second-text fw-bold text-primary-active">Personnel Data</a></li>
                                        <li class="list-group text-left list-group-item bg-transparent list"><a href="table" class="bg-transparent second-text fw-bold ">Non Personnel</a></li>
                                    <!-- </div> -->
                                </div>

                                <!-- end of dropdown -->
                            <a id="account" style="cursor: pointer;" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-table me-2"></i>Create Account</a>
                            <a href="application" style="cursor: pointer;" class="list-group-item list-group-item-action bg-transparent second-text fw-bold position-relative"><i class="fas fa-paperclip me-2"></i> Application Form</span></a>
                            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold position-relative"><i
                            class="fas fa-comment-dots me-2"></i>Report</a>
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

                        <!-- class panel-header -->
                        <div class="main-panel" id="main-panel">

                        <!-- Line Graph -->
                          <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
                            <div class="container-fluid">
                              <div class="navbar-wrapper">
                                <div class="navbar-toggle">
                                 
                                </div>
                                <span class="fs-5 fw-bold text-light">Barangay: <span class=" fs-5 fw-bold text-light" id="brgy_pick"></span></span>

                              </div>
                                  <?php  
                                require '../connector/connect.php';

                                $sql = "SELECT *FROM barangay";
                                $result = mysqli_query($conn,$sql);
                                if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <!-- <label for="" class="form-label text-dark fs-4">
                                        Barangay
                                    </label> -->
                                    <select name="business_brgy" class="form-select brgy_font col-md-4 w-25 mb-2" id="brgy" title="Choose a">
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
                          </nav>
                          <!-- End Navbar -->
                          <div class="panel-header panel-header-lg">
                            <canvas id="bigDashboardChart"></canvas>
                          </div>
                          <div class="content">
                            <div class="row">
                              
                            <div class="col-lg-12 col-md-12 col-sm-12 info" style="display: none;">
                            <div class="card card-chart">
                                <div class="card-header">
                                <h5 class="card-category">Map</h5>
                                <h4 class="card-title">Tracking</h4>
                                <div class="container">
                                    <h4 class="card-title">
                                        <span class="text-dark " id="brgy_info"></span>
                                    </h4>
                                    <div class="information">
                                        <button id="btn_pri" class="btn btn-primary">More Information</button>
                                    <div class="container" >
                                        <div class="col-md-12">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet omnis optio natus veniam voluptates minus, totam illum maiores asperiores unde cumque eum dolores perspiciatis, distinctio id sit laboriosam nobis laudantium!</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div id="googleMap" style="width:100%;height:800px;"></div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                
                              
            <!-- chat messages -->




    <!-- end of create account for bfp personnel -->
        <?php
    }
?>

 

    
     <script type="text/javascript" src="../assets/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/demo.js"></script>
    <script type="text/javascript" src="js/admin.js"></script>
    <script type="text/javascript" src="../assets/js/date.js"></script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAk-b1dgQR3qL2Nr_tseewzwI0hOqTj6c0&callback=myMap"></script>
</body>

</html>