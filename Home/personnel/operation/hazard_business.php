<?php  

  session_start();


  if ($_SESSION['personnel']) {
      require '../../connector/connect.php';
      $email = $_SESSION['personnel'];
      $search_row = "SELECT *FROM tbl_personnel WHERE email = '$email'";
      $result = mysqli_query($conn,$search_row);
      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
              $email = $row['email'];
              $user = $row['username'];
              $fname = $row['first_name'];
              $lname = $row['last_name'];
              $position = $row['position'];
              Data_personnel($email,$user,$fname,$lname,$position);
          }
      }
  }
  else{
    header("location: ../");
    exit();
  }



?>

<?php  

  function Data_personnel($email,$user,$fname,$lname,$position){

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
    <link href="../../assets/img/Icon/logo.png" rel="icon">
     <link href="../../assets/css/user.css" rel="stylesheet">
     <link href="../../assets/css/market.css" rel="stylesheet">
     <link href="../../assets/css/alertify.css" rel="stylesheet">
    <link href="../../assets/css/alertify.min.css" rel="stylesheet">
     <link rel="stylesheet" href="css/operation.css">
    <title>Chief Operation</title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark-color" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><img src="../../assets/img/Icon/logo.png" alt="Logo" class="img-thumbmail" width="100" height="100"><br><span class="text-muted"><span style="font-size: 15px;">Chief Relation Officer </span><span class="text-muted" style="font-size: 12px; vertical-align: middle;">  <br><?php echo $fname." ".$lname."<br>".$position; ?></span></span></div>
            <div class="list-group list-group-flush my-3">
                <a href="index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="account" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" style="cursor: pointer;"><i class="fas fa-user-alt me-2"></i>Account</a>
				<a id="report" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" style="cursor: pointer;"><i
            class="fas fa-project-diagram me-2"></i>Report <span class="badge bg-danger notification"></span> &nbsp<i class="fas fa-caret-down"></i></a>
             <!-- dropdownb -->
                <div class="container-fluid">
                    <!-- <div class="list-group-item bg-transparent list"> -->
                        <li class="list-group text-justify list-group-item bg-transparent list">
                            <a href="incident" class="bg-transparent second-text fw-bold text-primary-active">Incident Report <span class="badge bg-danger incident_count"></span></a>
                        </li>
                        <li class="list-group text-left list-group-item bg-transparent list">
                            <a href="hazard" class="bg-transparent second-text fw-bold text-primary">Hazard Report <span class="badge bg-danger hazard_count"></span></a>
                        </li>
                       
                    <!-- </div> -->
                </div>

                <!-- end of dropdown -->
            <a  href="complete" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" style="cursor: pointer;"><i class="far fa-calendar-check me-2"></i>Completed</a>
            <a  href="log" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" style="cursor: pointer;"><i class="fas fa-user-clock me-2"></i>Activity Log</a>
                <a href="../logout" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
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

            <!-- user -->
            <div class="m-4 user">
                    <div class="text-light">
                        <h3>Hazard Report</h3>
                    </div>
                    <select name="" id="select" class="form-select w-25">
                          <option value="User">User</option>
                          <option value="Business" selected>Business</option>
                        </select>
                    <div class="table-responsive">
                        <table class="table text-light">
                            <thead>
                                <tr>
                                    <th class="text-light">Date:</th>
                                    <th class="text-light">Incident Type:</th>
                                    <th class="text-light">Status</th>
                                </tr>
                            </thead>
                            <tbody id="business_data">
                               
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="incident_modal">
                  <div class="w-75 bg-light rounded p-3 col-lg-12 col-sm-12">
                    <div class="col-md-12">
                      <h3 class="text-muted">Hazard Report</h3>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label for="" class="form-label fw-bold">
                          From
                        </label>
                        <input type="text" class="form-control" readonly id="from">
                      </div>
                      
                      <div class="col-md-6">
                        <label for="" class="form-label fw-bold">
                          Barangay:
                        </label>
                        <input type="text" value="" class="form-control" readonly id="brgy">
                      </div>
                      <div class="col-md-12">
                        <label for="" class="form-label fw-bold">
                          Landmark:
                        </label>
                        <textarea name="" cols="2" rows="2" class="form-control" readonly id="landmark"></textarea>
                      </div>
                      <div class="col-md-12">
                        <label for="" class="form-label fw-bold">
                          Description
                        </label>
                        <textarea name="" cols="4" rows="4" class="form-control" readonly id="description"></textarea>
                      </div>
                      <div class="modal-footer mt-2">
                        <button class="btn btn-secondary" onclick="Close_modal();">Close</button>
                        <button class="btn btn-success" id="feedback">Feedback</button>

                         <button class="btn btn-success hide" type="button" disabled>
                          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                          Updating...
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- end of user -->
        </div>

       <?php
  }

?>
     



    <script type="text/javascript" src="../../assets/js/fontawesome.js"></script>
    <script src="../../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../../assets/js/function.js"></script>
    <script src="../../assets/js/date.js"></script>
    <script src="../../assets/js/alertify.js"></script>
    <script src="../../assets/js/alertify.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/hazard_business.js"></script>



</body>
</html>