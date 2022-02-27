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
                                        <li class="list-group text-justify list-group-item bg-transparent list"><a href="business_data" class="bg-transparent second-text fw-bold text-primary-active">Business Account</a></li>
                                        <li class="list-group text-left list-group-item bg-transparent list"><a href="table" class="bg-transparent second-text fw-bold ">Non Personnel</a></li>
                                    <!-- </div> -->
                                </div>
                                <!-- end of dropdown -->
                            <a href="signup" style="cursor: pointer;" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-primary"><i class="fas fa-table me-2"></i>Create Account</a>
                            <a href="application" style="cursor: pointer;" class="list-group-item list-group-item-action bg-transparent second-text fw-bold position-relative"><i class="fas fa-paperclip me-2"></i> Application Form</span></a>
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

                           <!-- create account for bfp personnel -->
    <div class="account-form">
        <div class="container col-md-12">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-12">
                        <h3 class="text-left modal-title fw-bold">Create Account</h3>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="create" method="post" class="form-group">
                        <div class="container">
                            <div class="row">
                            <div class="form-label col-md-6">
                                <label for="">
                                    First Name
                                </label>
                                <input type="text" id="admin-fname" name="fname" required placeholder="First Name" class="form-control" required >
                            </div>
                            <div class="form-label col-md-6">
                                <label for="">
                                    Last Name
                                </label>
                                <input type="text" id="admin-lname" name="lname" required placeholder="Last Name" class="form-control" required >
                            </div>
                        </div>
                        <div class="mb-7">
                           <label for="" class="form-label mt-2">
                                Email
                           </label>
                           <input type="text" name="email" class="form-control" placeholder="Email" required>
                       </div>
                        <div class="mb-6">
                            <label for="" class="form-label mt-2">
                                Position:
                            </label>
                            <select name="position" id="" class="form-control" required>
                                <option disabled selected>Choose Position</option>
                                <option value="Fire Officer-I">Fire Officer-I</option>
                                <option value="Fire Officer-II">Fire Officer-II</option>
                                <option value="Fire Officer-III">Fire Officer-III</option>
                                <option value="Senior Officer-I">Senior Officer-I</option>
                                <option value="Senior Officer-II">Senior Officer-II</option>
                                <option value="Senior Officer-III">Senior Officer-III</option>
                                <option value="Senior Officer-IV">Senior Officer-IV</option>
                                <option value="Deputy">Deputy</option>
                                <option value="Inspector">Inspector</option>
                                <option value="Senior Inspector">Senior Inspector</option>
                                <option value="Chief Inspector">Chief Inspector</option>
                                <option value="Super Intendent">Super Intendent</option>
                                <option value="Chief Intendent">Chief Intendent</option>
                                <option value="Fire Director">Fire Director</option>
                            </select>
                        </div>
                        <div class="mb-7">
                            <label for="" class="form-label mt-2">
                                Office
                            </label>
                            <select id="" class="form-control" name="office" required>
                                <option disabled selected>Choose Position</option>
                                <option value="Chief Operation">Chief Operation</option>
                                <option value="Chief Relation Officer">Chief Relation Officer</option>
                                <option value="FCCA">Fire Code Collecting Agent</option>
                                <option value="FCA">Fire Code Assessor</option>
                                <option value="chief fses">Chief Fses</option>
                                <option value="Inspector">Inspector</option>
                            </select>
                        </div>
                       <div class="mb-7">
                           <label for="" class="form-label mt-2">
                               Username
                           </label>
                           <input type="text" id="username-admin" name="username" class="form-control" placeholder="Username" required>
                       </div>
                       <div class="mb-7">
                           <label for="" class="form-label mt-2">
                               Password
                           </label>
                           <input type="password"  name="password" class="form-control" placeholder="Password" required>
                       </div>
                        <br>
                        <div class="col-md-12" class="form-label">
                            <button type="submit" class="btn btn-primary" name="create">Create Account</button>
                        </div>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

                        
                            <?php
    }
?>
    <script type="text/javascript" src="../assets/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/admin.js"></script>
    <script type="text/javascript" src="../assets/js/date.js"></script>

</body>

</html>