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
                <script src="../assets/js/chart.js"></script>
                <title>Admin</title>
            </head>
            <body>
                <div class="d-flex" id="wrapper">
                    <!-- Sidebar -->
                    <div class="bg-dark-color" id="sidebar-wrapper">
                        <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><img src="../assets/img/Icon/logo.png" alt="Logo" class="img-thumbmail" width="100" height="100"><br><span class="text-muted"><span style="font-size: 15px;"></span> <span class="text-muted" style="font-size: 12px; vertical-align: middle;">Super Admin <br> City Fire Marshal</span></span></div>
                        <div class="list-group list-group-flush my-3">
                            <a href="dashboard" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-primary"><i
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

                        <!-- class panel-header -->
                        <div class="main-panel" id="main-panel">

                        <!-- Line Graph -->
                          <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
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
                                    <h5 class="card-category">Request Forms</h5>
                                    <h4 class="card-title">Forms</h4>
                                    
                                  </div>
                                  <div class="card-body">
                                    <div class="chart-area" style="height: 510px;">
                                        <div class="btn_form me-4">
                                            <!-- <button id="forms" class="btn btn-secondary me-3" onclick="Forms();">Forms</button> -->
                                        </div>
                                      <canvas id="myChart"></canvas>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6">
                                <div class="card card-chart">
                                  <div class="card-header">
                                    <h5 class="card-category">Incident/Hazard</h5>
                                    <h4 class="card-title">Reports</h4>
                                  </div>
                                  <div class="card-body">
                                    <div class="chart-area" style="height: auto;">
                                      <canvas id="linechart"></canvas>
                                    </div>
                                  </div>

                                </div>
                              
            <!-- chat messages -->
  <!--   <div class="chat">
        <div class="container col-md-12">
            <div class="modal-content modal-dialog modal-dialog-scrollable">
                <div class="modal-header">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="page-header">
                            <h3 class="text-center text-black modal-title fw-bold">Messages</h3>
                        </div>
                    </div>
                </div>
                <div class="modal-body chat-body">
                    <ul class="list-group bg-light h-26">
                        <a id="" style="cursor: pointer;" class="list-group-item list-group-item-action bg-transparent second-text  text-muted fw-bold"><span class="text-muted">Name:</span> <em class="fw-bold">Georgie</em><br><small><p class="fw-normal parag text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae provident magnam atque voluptatum. Exercitationem blanditiis reiciendis molestias esse maiores? Ipsum, deserunt neque. Officiis, maxime quam ut dolorum, tenetur repellat molestiae. <em class="fs-6 fw-light">june 2 2013</em></p></small></a>
                    </ul>
                </div>
                <span id="close_msg"><i class="fas fa-times"></i></span>
            </div>
        </div>
    </div> -->
    <!-- end of chat messages -->

 
    

   

    <!-- end of modal information -->

    <!-- end of create account for bfp personnel -->
        <?php
    }
?>

    <?php  
        include 'get/fetch.php';

        foreach ($result as $value) {
            $type[] = $value['service_type'];
            $total[] = $value['total'];
        }

    ?>

    <?php  

    include 'get/incident.php';
    
    foreach ($result_i as $value) {
            $incident_type[] = $value['Incident_Type'];
            $total_incident[] = $value['total'];
        }
    ?>

  

    
    <script type="text/javascript" src="../assets/js/jquery-3.4.1.min.js"></script>
     <!-- <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script> -->
    <script type="text/javascript" src="js/demo.js"></script>
    <script type="text/javascript" src="js/admin.js"></script>
    <script type="text/javascript" src="../assets/js/date.js"></script>
    


    <!-- forms -->
    <script>
    
        const labels = <?php echo json_encode($type) ?>;
        let delayed;
        
      var e = document.getElementById("myChart").getContext("2d");

    gradientFill = e.createLinearGradient(0, 0, 0, 400);
    gradientFill.addColorStop(0, "rgba(58, 123, 213, 1)");
    gradientFill.addColorStop(1, "rgba(0,210,255,0.3)");

    const config = {
      type: "bar",
      data: {
        labels: <?php echo json_encode($type) ?>,
        datasets: [{
          label: "Application Forms",
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
          data: <?php echo json_encode($total) ?>,
        }]
      },
      options: {
        maintainAspectRatio: false,
        legend: {
          display: false
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
      
      function Forms(){
            console.log("1234");
            bar.destroy();
            bar = new Chart(
            document.getElementById('myChart').getContext("2d"),
            config
          );
      }

      
      

     
        const line_label = <?php echo json_encode($incident_type) ?>;
        const line_data = {
        labels: line_label,
        datasets: [{
          label: 'Incident',
          data: <?php echo json_encode($total_incident) ?>,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
          ],
          borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
          ],
          borderWidth: 2,   
          hoverOffset: 10,
          option: {
            cutoutPercentage: 50,
            responsive: true,
            animation: {
                animateScale: true
            }
        }
        }]

      };

      const line = {
        type: 'pie',
        data: line_data,
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        },
      };

      let lineChart = new Chart(
        document.getElementById('linechart'),
        line
      );
      
      function Incident(){
        lineChart.destroy();
            lineChart = new Chart(
            document.getElementById('linechart'),
            line
        );
      }



</script>


</body>

</html>