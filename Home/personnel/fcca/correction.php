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
     <link href="../../assets/css/market.css" rel="stylesheet">
     <link rel="stylesheet" href="css/fcca.css">
    <title>Fire Code Collecting Agent</title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark-color" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><img src="../../assets/img/Icon/logo.png" alt="Logo" class="img-thumbmail" width="100" height="100"><br><span class="text-muted"><span style="font-size: 15px;">Fire Code Collecting Agent</span><span class="text-muted" style="font-size: 12px; vertical-align: middle;">  <br><span><?php echo $fname." ".$lname."<br>".$position; ?></span></span></span></div>
            <div class="list-group list-group-flush my-3">
                <a href="index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="account" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" style="cursor: pointer;"><i class="fas fa-user-alt me-2"></i>Account</a>
                 <a id="report" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" style="cursor: pointer;"><i
            class="fas fa-project-diagram me-2"></i>Payment Request &nbsp<i class="fas fa-caret-down" id="caret"></i></a>

            <div class="container-fluid d-block">
                    <!-- <div class="list-group-item bg-transparent list"> -->
                        <li class="list-group text-justify list-group-item bg-transparent list">
                            <a href="transaction" class="bg-transparent second-text fw-bold"><i class="fas fa-receipt"></i> Pending Payment</a>
                        </li>
                        <li class="list-group text-justify list-group-item bg-transparent list">
                            <a href="correction" class="bg-transparent second-text fw-bold text-primary"><i class="fas fa-receipt"></i>  Correction Fee Payment</a>
                        </li>
                        
                    <!-- </div> -->
                </div>
            <a  href="receipt" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" style="cursor: pointer;"><i class="fas fa-receipt me-2"></i>Reciept</a>
            <a  href="complete" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" style="cursor: pointer;"><i class="far fa-calendar-check me-2"></i>Completed</a>
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

            <div class="search">
              <div class="container">
              <div class="col-md-12 col-lg-12 col-sm-12" >
                <span class="text-light fs-4 mt-2" >Correction Fee </span>
              </div>
              <!-- <div class="col-md-4 mt-3">
                  <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Enter Number" id="data_number">
                      <div class="input-group-append">
                        <button class="btn btn-outline-primary normal" onclick="Search();">Seach</button>
                        <button class="btn btn-primary loading_hide" type="button" disabled>
                           <span class="spinner-border spinner-border-sm " role="status" aria-hidden="true"></span>
                                Searching...
                        </button>
                      </div>
                    </div>
              </div> -->
               <span class="text-danger error_hide"></span>
            </div>
            </div>


            <div class="data-table">
              <div class="m-4">
                    <div class="table-responsive">
                        <table class="table text-light">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-light">Ticket #</th>
                                    <th class="text-light">Permit Type:</th>
                                    <th class="text-light">Business Name</th>
                                </tr>
                            </thead>
                            <tbody id="table_data">
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- modal for correction data -->
        <div class="correction">
          <div class="modal-content w-75">
              <div class="modal-header bg-secondary">
                  <div class="col-md-8">
                      <h3 class="text-left modal-title fw-bold">FSEC Building Permit</h3>
                  </div>
              </div>

              <!-- modal body -->
              <div class="modal-body">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="" class="form-label text-secondary">
                        Name of Owner
                      </label>
                      <input type="text" readonly id="owner_name" class="form-control">
                    </div>
                    <div class="col-md-4">
                      <label for="" class="form-label text-secondary">
                        Name of Establishment
                      </label>
                      <input type="text" readonly id="esta" class="form-control">
                    </div>
                    <div class="col-md-4">
                      <label for="" class="form-label text-secondary">
                        Inspection Reference Number:
                      </label>
                      <input type="text" readonly id="inspection_ref" class="form-control">
                    </div>
                  </div>

                  <div class="col md-6 mt-4 mb-3">
                    <div class="container">
                      <img src="" alt="image" width="200" height="200" class="img-fluid correction_file">
                    </div>
                  </div>

                  <!-- File pdf -->
                  <div class="col-md-6 mt-4">
                    <a class="btn btn-outline btn-primary" id="pdf">View PDF</a>
                  </div>
                  <!-- end of file PDF -->

                </div>

                <!-- end of modal body -->
                <div class="modal-footer">
                    <button class="btn btn-outline btn-secondary" onclick="Close_modal();">Close</button>
                    <button class="btn btn-outline btn-primary" id="proceed">Proceed</button>
                </div>
            </div>
        </div>



        <!-- end of correction data -->
            <?php





  }

?>



 <script type="text/javascript" src="../../assets/js/fontawesome.js"></script>
    <script src="../../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../../assets/js/function.js"></script>
    <script src="../../assets/js/date.js"></script>
    <script src="js/correction.js"></script>
</body>
</html>