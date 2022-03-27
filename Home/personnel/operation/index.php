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
     <link rel="stylesheet" href="css/operation.css">
     <script src="../../assets/js/chart.js"></script>
    <title>Chief Operation</title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark-color" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><img src="../../assets/img/Icon/logo.png" alt="Logo" class="img-thumbmail" width="100" height="100"><br><span class="text-muted"><span style="font-size: 15px;">Chief Operation </span><span class="text-muted" style="font-size: 12px; vertical-align: middle;">  <br><?php echo $fname." ".$lname."<br>".$position; ?></span></span></div>
            <div class="list-group list-group-flush my-3">
                <a href="index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-primary"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="account" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" style="cursor: pointer;"><i class="fas fa-user-alt me-2"></i>Account</a>
				<a id="report" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" style="cursor: pointer;"><i
            class="fas fa-project-diagram me-2"></i>Report <span class="badge bg-danger notification"></span> &nbsp<i class="fas fa-caret-down" id="caret-report"></i></a>
             <!-- dropdownb -->
                <div class="container-fluid dropdown-report">
                    <!-- <div class="list-group-item bg-transparent list"> -->
                        <li class="list-group text-justify list-group-item bg-transparent list">
                            <a href="incident" class="bg-transparent second-text fw-bold text-primary-active">Incident Report <span class="badge bg-danger incident_count"></span></a>
                        </li>
                        <li class="list-group text-left list-group-item bg-transparent list">
                            <a href="hazard" class="bg-transparent second-text fw-bold">Hazard Report <span class="badge bg-danger hazard_count"></span></a>
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
                    <center><h2 class="fs-4 m-0 text-light">Statistic Report</h2></center>
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




            <div class="container">
              <div class="row">
              <div class="col-md-12">
                <div class="col-md-4">
                  &nbsp<button class="btn btn-secondary btn-sm" onclick="Refresh();"><i class="fas fa-sync"></i> Refresh</button>
                  &nbsp<button class="btn btn-secondary btn-sm more"><i class="fas fa-info-circle text-light"></i> More</button>
                </div>
                <center><h3 class="text-light mt-2 fs-5">Incident Report (Business)</h3></center>
              </div>
            </div> 
            </div>



            <div class="container size_chart bg-light mt-2 rounded">

              <canvas id="myChart"></canvas>
            </div>

            <br>
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <center><h3 class="text-light mt-2 fs-5">Hazard Report (Business)</h3></center>
                </div>
              </div>
            </div>
            <div class="container size_chart bg-light mt-2 rounded">
              <!-- <button class="btn btn-prmary">awd</button> -->
              <canvas id="myChart_hazard"></canvas>
            </div>
            

            <div class="more_modal">
              <div class="container w-75">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-secondary">
                      <div class="modal-title">
                        <center><h3 class="text-light fs-4"><i class="fas fa-info-circle"></i> More</h3></center>
                      </div>
                    </div>

                    <!-- modal body -->
                    <div class="modal-body">
                      <div class="container">
                        <div class="btn_more">
                          <ul class="list-group list-group-horizontal list_btn">
                            <li class="list-group" style="margin: 0px 10px;"><button class="btn btn-primary btn-sm"> <i class="fas fa-user-circle"></i> User Report</button></li>
                            <li class="list-group" style="margin: 0px 10px;"><button class="btn btn-primary btn-sm calculator"> <i class="fas fa-calculator"></i>  Count Report</button></li>
                            <li class="list-group" style="margin: 0px 10px;"><button class="btn btn-primary btn-sm">User Report</button></li>
                          </ul>
                        </div>
                      </div>
                      <hr>
                      <!-- count report -->
                      <div class="field_date_report">
                        <div class="container mt-2">
                          <div class="row">
                            <center><h3 class="fs-5">Range Date</h3></center>
                            <div class="col-md-6">
                              <div class="input_field">
                                <label for="">
                                  From
                                </label>
                                <input type="date" id="from_date" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="input_field">
                                <label for="">
                                  To
                                </label>
                                <input type="date" id="to_date" class="form-control">
                              </div>
                            </div>
                          </div>
                            <div class="modal-footer mt-2">
                            <button class="btn btn-sm btn-primary" id="count"> <i class="fas fa-search"></i> Count</button>
                            <button class="btn btn-primary btn-sm btn_count" type="button" disabled>
                              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                              Counting...
                            </button>
                          </div>
                        </div>
                      </div>
                      <!-- end of count report -->

                      
                      <div class="count_text">
                        <div class="container">
                        <div class="total_report">
                          <span>Total Receive Report From <span id="from"><strong id="from_date_text"></strong></span> To <span id="to"><strong></strong></span><br><span class="text-secondary fs-6">Total: <span class="text-success"><strong id="total_report"></strong></span></span></span>
                          <br>
                          <!-- <button class="btn btn-sm btn-info">Details</button> -->
                        </div>
                      </div>
                      </div>
                    </div>
                    <!-- end of modal body -->

                    <div class="modal-footer">
                      <button class="btn btn-sm btn-secondary close_more">Close</button>
                    </div>

                  </div>
                </div>
              </div>
            </div>



        </div>




       <?php
  }

?>


    
    <?php  

    include 'get/business_report.php';
    
    foreach ($result_i as $value) {
            $incident_type[] = $value['Incident_type'];
            $total_incident[] = $value['total'];
        }
    ?>

    <?php  

    include 'get/business_hazard.php';
    
    foreach ($result_i as $value) {
            $hazard_type[] = $value['hazard_type'];
            $total[] = $value =['total'];
        }
    ?>



     



    <script type="text/javascript" src="../../assets/js/fontawesome.js"></script>
    <script src="../../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../../assets/js/function.js"></script>
    <script src="../../assets/js/date.js"></script>
    <script src="js/script.js"></script>

    <script>


      //Incident Report
      const labels = <?php echo json_encode($incident_type); ?>;
        let delayed;
        
      var e = document.getElementById("myChart").getContext("2d");

    gradientFill = e.createLinearGradient(60, 0, 10, 300);
    gradientFill.addColorStop(0, "#81B8EA");
    gradientFill.addColorStop(1, "#81B8EA");

    const config = {
      type: "bar",
      data: {
        labels: <?php echo json_encode($incident_type); ?>,
        datasets: [{
          label: "Incident Report",
          backgroundColor: gradientFill,
          borderColor: "#2CA8FF",
          pointBorderColor: "#FFF",
          pointBackgroundColor: "#2CA8FF",
          pointBorderWidth: 2,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 1,
          pointRadius: 4,
          fill: true,
          borderWidth: 1,
          data: <?php echo json_encode($total_incident); ?>
        }]
      },
      options: {
        maintainAspectRatio: false,
        legend: {
          display: true
        },
        tooltips: {
          bodySpacing: 4,
          mode: "nearest",
          intersect: 0,
          position: "nearest",
          xPadding: 10,
          yPadding: 10,
          caretPadding: 10
        },
        responsive: 1,
        scales: {
          yAxes: [{
            gridLines: 0,
            gridLines: {
              zeroLineColor: "transparent",
              drawBorder: false
            }
          }],
          xAxes: [{
            display: 0,
            gridLines: 0,
            ticks: {
              display: false
            },
            gridLines: {
              zeroLineColor: "transparent",
              drawTicks: false,
              display: false,
              drawBorder: false
            }
          }]
        },
        layout: {
          padding: {
            left: 0,
            right: 0,
            top: 15,
            bottom: 15
          }
        }
      }
    };


      let bar = new Chart(
        document.getElementById('myChart').getContext("2d"),
        config
      );


      function Refresh(){
            // console.log("1234");
            bar.destroy();
            bar = new Chart(
            document.getElementById('myChart').getContext("2d"),
            config
          );
      }




      //Hazard Report

      const labels_hazard = <?php echo json_encode($hazard_type); ?>;
        let delayed_hazard;
        
      var e = document.getElementById("myChart_hazard").getContext("2d");

    gradientFill = e.createLinearGradient(60, 0, 10, 300);
    gradientFill.addColorStop(0, "#81B8EA");
    gradientFill.addColorStop(1, "#81B8EA");

    const config_hazard = {
      type: "bar",
      data: {
        labels: <?php echo json_encode($hazard_type); ?>,
        datasets: [{
          label: "Hazard Report",
          backgroundColor: gradientFill,
          borderColor: "#2CA8FF",
          pointBorderColor: "#FFF",
          pointBackgroundColor: "#2CA8FF",
          pointBorderWidth: 2,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 1,
          pointRadius: 4,
          fill: true,
          borderWidth: 1,
          data: <?php echo json_encode($total_incident); ?>
        }]
      },
      options: {
        maintainAspectRatio: false,
        legend: {
          display: true
        },
        tooltips: {
          bodySpacing: 4,
          mode: "nearest",
          intersect: 0,
          position: "nearest",
          xPadding: 10,
          yPadding: 10,
          caretPadding: 10
        },
        responsive: 1,
        scales: {
          yAxes: [{
            gridLines: 0,
            gridLines: {
              zeroLineColor: "transparent",
              drawBorder: false
            }
          }],
          xAxes: [{
            display: 0,
            gridLines: 0,
            ticks: {
              display: false
            },
            gridLines: {
              zeroLineColor: "transparent",
              drawTicks: false,
              display: false,
              drawBorder: false
            }
          }]
        },
        layout: {
          padding: {
            left: 0,
            right: 0,
            top: 15,
            bottom: 15
          }
        }
      }
    };


      let bar_hazard = new Chart(
        document.getElementById('myChart_hazard').getContext("2d"),
        config_hazard
      );


    </script>



</body>
</html>