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
    header("location: ../index");
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Chief Operation </title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark-color" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><img src="../../assets/img/Icon/logo.png" alt="Logo" class="img-thumbmail" width="100" height="100"><br><span class="text-muted"><span style="font-size: 15px;"></span> <span class="text-muted" style="font-size: 12px; vertical-align: middle;">  <br></span></span></div>
            <div class="list-group list-group-flush my-3">
                <a href="chief_operation" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
        <a  id="account" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" style="cursor: pointer;"><i
            class="fas fa-project-diagram me-2"></i>Table</a>
                <a id="report" style="cursor: pointer;" class="list-group-item list-group-item-action bg-transparent second-text fw-bold position-relative"><i class="fas fa-comment-dots me-2"></i>Report <span class="position-absolute top-20 start-50 translate-middle badge rounded-pill bg-danger"><span class="visually-hidden"></span></a>
                 

                <a href="../../logout" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
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
            <div id="page-content-wrapper">
                <!-- class panel-header -->
                <div class="main-panel" id="main-panel">

                <!-- Line Graph -->
                  <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute mt-3">
                    <div class="container-fluid">
                      <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                         
                        </div>
                        <span class=" fs-4 fw-bold text-light">Analytics</span>
                      </div>
                      
                        
                    </div>
                  </nav>
                  <!-- End Navbar -->
                  <div class="panel-header panel-header-lg">
                    <canvas id="bigDashboardChart"></canvas>
                  </div>
                  <div class="content">
                    <div class="row">
                      
                      <div class="col-lg-6 col-md-6">
                        <div class="card card-chart">
                          <div class="card-header">
                            <h5 class="card-category">Hazard</h5>
                            <h4 class="card-title">Reports</h4>
                            
                          </div>
                          <div class="card-body">
                            <ul>
                                <li>daw</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="card card-chart">
                          <div class="card-header">
                            <h5 class="card-category">Incident</h5>
                            <h4 class="card-title">Reports</h4>
                          </div>
                          <div class="card-body">
                            <ul>
                                <li>daw</li>
                            </ul>
                          </div>
                        </div>
                    </div>
                     <div class="content">
                    <div class="row">
                      
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card card-chart">
                          <div class="card-header">
                            <h5 class="card-category">Map</h5>
                            <h4 class="card-title">Tracking</h4>
                            <div id="googleMap" style="width:100%;height:800px;"></div>
                          </div>
                          <div class="card-body">
                            
                          </div>
                        </div>
                      </div>
                    </div>
            <!-- table data -->
            <!-- end of table data -->
        </div>
    </div>
</div>
    <!-- /#page-content-wrapper -->

      <!-- chat messages -->
    <div class="chat">
        <div class="container col-md-12">
            <div class="modal-content modal-dialog modal-dialog-scrollable">
                <div class="modal-header">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- <div class="page-h"> -->
                            <h3 class="text-center text-black modal-title fw-bold">Incident Report</h3>
                        <!-- </div> -->
                    </div>
                </div>
                <div class="modal-body chat-body">
                    <ul class="list-group bg-light h-26 " id="display_form">
                            
                    </ul>
                </div>
                <span id="close_msg"><i class="fas fa-times"></i></span>
            </div>
        </div>
    </div>


    <?php


  }

?>




    <!-- end of chat messages -->


<script type="text/javascript" src="../../assets/js/fontawesome.js"></script>
    <script src="../../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../../assets/js/function.js"></script>

   <script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(8.9475,125.5406),
  zoom: 13,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAk-b1dgQR3qL2Nr_tseewzwI0hOqTj6c0&callback=myMap"></script>


</body>
</html>