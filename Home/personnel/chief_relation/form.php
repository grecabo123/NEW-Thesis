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
              $id = $row['id'];
              Data_personnel($email,$user,$fname,$lname,$position,$id);
          }
      }
  }
  else{
    header("location: ../index");
    exit();
  }



?>

<?php  

  function Data_personnel($email,$user,$fname,$lname,$position,$id){

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
      <link href="css/cro.css" rel="stylesheet">
    <link href="../../assets/css/alertify.css" rel="stylesheet">
    <link href="../../assets/css/alertify.min.css" rel="stylesheet">
    <link href="../../assets/css/market.css" rel="stylesheet">  
    <title>Chief Officer Relation</title>
</head>
<body>
    <div class="d-flex" id="wrapper">
      <?php  

      $_SESSION['personnel_id'] = $id;

      ?>
        <!-- Sidebar -->
        <div class="bg-dark-color" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><img src="../../assets/img/Icon/logo.png" alt="Logo" class="img-thumbmail" width="100" height="100"><br><span class="text-muted"><span style="font-size: 15px;">Chief Relation Officer </span><span class="text-muted" style="font-size: 12px; vertical-align: middle;">  <br><?php echo $fname." ".$lname."<br>".$position; ?></span></span></div>
            <div class="list-group list-group-flush my-3">
                <a href="index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="account" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" style="cursor: pointer;"><i class="fas fa-user-alt me-2"></i>Account</a>
        <a id="form" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" style="cursor: pointer;"><i
            class="fas fa-project-diagram me-2"></i>Request &nbsp<i class="fas fa-caret-down"></i></a>
             <!-- dropdownb -->
                <div class="container-fluid d-block">
                    <!-- <div class="list-group-item bg-transparent list"> -->
                        <li class="list-group text-justify list-group-item bg-transparent list">
                            <a href="form" class="bg-transparent second-text fw-bold text-primary">Request Form</a>
                        </li>
                        <li class="list-group text-left list-group-item bg-transparent list">
                            <a href="complete" class="bg-transparent second-text fw-bold">Completed Form</a>
                        </li>
                        <li class="list-group text-left list-group-item bg-transparent list">
                            <a href="paid" class="bg-transparent second-text fw-bold">FCCA Paid</a>
                        </li>
                    <!-- </div> -->
                </div>

                <!-- end of dropdown -->
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
            <div class="search">
              <div class="container">
              <div class="col-md-12 col-lg-12 col-sm-12" >
                <span class="text-light fs-4 mt-2" >Current: <span class="text-light bg-light rounded" id="num"></span> </span>
              </div>
              <div class="col-md-4 mt-3">
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
              </div>
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
                                    <th class="text-light">Business</th>
                                </tr>
                            </thead>
                            <tbody id="table_data">
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>






            <!-- Data Display -->

              <!-- <div class="data">
                <div class="container">
                  <div class="col-md-12">
                    <div class="modal-dialog modal-dialog-scrollable">
                      
                    </div>
                  </div>
                </div>
              </div> -->

            <!-- end of data Display  -->

            <!-- fsic business -->
            <div class="data">
              <div class="container">
                <div class="bg-light rounded ">
                  <div class="modal-header">
                      <h5 class="modal-title">Ticket #: <span class="text-primary fs-5" id="number_q"></span></h5>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label for="" class="form-lable fw-bold">
                              Permit Type: <span class="text-secondary fs-5" id="type"></span>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group mt-2">
                          <div class="row">
                            <div class="col">
                                <label for="" class="form-label fw-bold">
                                  Business Owner: <span class="text-secondary fs-5" id="owner"></span>
                                </label>
                            </div>
                            <div class="col">
                              <label for="" class="form-label fw-bold">
                                Business Name: <span class="text-secondary fs-5" id="business"></span>
                              </label>
                            </div>
                          </div>          
                      </div>
                      <hr>
                      <fieldset>
                        <legend><span class="text-dark fs-4 fw-bold">Contact Information</span></legend>
                        <div class="form-group mt-2">
                        <div class="row">
                          <div class="col">
                                <label for="" class="form-label fw-bold">
                                  Email: <span class="text-secondary fs-5" id="email"></span>
                                </label>
                            </div>
                            <div class="col">
                                <label for="" class="form-label fw-bold">
                                  Contact Number: <span class="text-secondary fs-5" id="contact"></span>
                                </label>
                            </div>
                        </div>
                      </div>
                      </fieldset>
                      <hr>
                      <br>
                      <div class="container">
                        <div class="row">
                          <div class="col-md-4">
                            <img src="" alt="" id="img2" width="250" height="200" class="img-fluid">
                          </div>
                          <div class="col-md-4">
                            <img src="" alt="" id="img1" width="250" height="200" class="img-fluid">
                          </div>
                          <div class="col-md-4">
                            <img src="" alt="" id="img3" width="250" height="200" class="img-fluid">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <div class="col-md-12" class="form-label">
                              <button class="btn btn-primary" id="approve">Approved</button>
                              <button class="btn btn-danger" id="msg_modal">Return/Lack of Requirements</button>
                          </div>
                    </div>
                </div>
              </div>
            </div>
            <!-- end of fsic business -->

            <!-- fsec permit -->
            <div class="fsec">
              <div class="container">
                <div class="bg-light rounded ">
                  <div class="modal-header">
                      <h5 class="modal-title">Ticket #: <span class="text-primary fs-5" id="fsec_num"></span></h5>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label for="" class="form-lable fw-bold">
                              Permit Type: <span class="text-secondary fs-5" id="fs_type"></span>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group mt-2">
                          <div class="row">
                            <div class="col">
                                <label for="" class="form-label fw-bold">
                                  Business Owner: <span class="text-secondary fs-5" id="fsec_owner"></span>
                                </label>
                            </div>
                            <div class="col">
                              <label for="" class="form-label fw-bold">
                                Business Name: <span class="text-secondary fs-5" id="fsec_business"></span>
                              </label>
                            </div>
                            <div class="col">
                              <label for="" class="form-label fw-bold">
                                Purpose: <span class="text-secondary fs-5" id="purpose"></span>
                              </label>
                            </div>
                          </div>          
                      </div>
                      <hr>
                      <fieldset>
                        <legend><span class="text-dark fs-4 fw-bold">Contact Information</span></legend>
                        <div class="form-group mt-2">
                        <div class="row">
                          <div class="col">
                                <label for="" class="form-label fw-bold">
                                  Email: <span class="text-secondary fs-5" id="fsec_email"></span>
                                </label>
                            </div>
                            <div class="col">
                                <label for="" class="form-label fw-bold">
                                  Contact Number: <span class="text-secondary fs-5" id="fsec_contact"></span>
                                </label>
                            </div>
                        </div>
                      </div>
                      </fieldset>
                      <hr>
                      <br>
                      <div class="container">
                        <div class="row">
                          <div class="col-md-3">
                            <img src="" alt="" id="img4" width="250" height="200" class="img-fluid">
                          </div>
                          <div class="col-md-3">
                            <img src="" alt="" id="img5" width="250" height="200" class="img-fluid">
                          </div>
                          <div class="col-md-3">
                            <img src="" alt="" id="img6" width="250" height="200" class="img-fluid">
                          </div>
                          <div class="col-md-3">
                            <img src="" alt="" id="img7" width="250" height="200" class="img-fluid">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <div class="col-md-12" class="form-label">
                              <button class="btn btn-primary" id="fsec_approve">Approved</button>
                              <button class="btn btn-danger" id="fsec_modal_msg">Return/Lack of Requirements</button>
                          </div>
                    </div>
                </div>
              </div>
            </div>
            <!-- fsec permit -->


            <!-- occupancy -->

            <div class="occupancy">
              <div class="container">
                <div class="bg-light rounded ">
                  <div class="modal-header">
                      <h5 class="modal-title">Ticket #: <span class="text-primary fs-5" id="occupancy_ticket"></span></h5>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label for="" class="form-lable fw-bold">
                              Permit Type: <span class="text-secondary fs-5" id="occupancy_type"></span>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group mt-2">
                          <div class="row">
                            <div class="col">
                                <label for="" class="form-label fw-bold">
                                  Business Owner: <span class="text-secondary fs-5" id="occupancy_owner"></span>
                                </label>
                            </div>
                            <div class="col">
                              <label for="" class="form-label fw-bold">
                                Business Name: <span class="text-secondary fs-5" id="occupancy_name"></span>
                              </label>
                            </div>
                            <div class="col">
                              <label for="" class="form-label fw-bold">
                                Purpose: <span class="text-secondary fs-5" id="occupancy_purpose"></span>
                              </label>
                            </div>
                          </div>          
                      </div>
                      <hr>
                      <fieldset>
                        <legend><span class="text-dark fs-4 fw-bold">Contact Information</span></legend>
                        <div class="form-group mt-2">
                        <div class="row">
                          <div class="col">
                                <label for="" class="form-label fw-bold">
                                  Email: <span class="text-secondary fs-5" id="occupancy_email"></span>
                                </label>
                            </div>
                            <div class="col">
                                <label for="" class="form-label fw-bold">
                                  Contact Number: <span class="text-secondary fs-5" id="occupancy_contact"></span>
                                </label>
                            </div>
                        </div>
                      </div>
                      </fieldset>
                      <hr>
                      <br>
                      <div class="container">
                        <div class="row">
                          <div class="col-md-3">
                            <img src="" alt="" id="endorse" width="250" height="200" class="img-fluid">
                            <br>
                          </div>
                          <div class="col-md-3">
                            <img src="" alt="" id="building" width="250" height="200" class="img-fluid">
                            <br>
                          </div>
                          <div class="col-md-3">
                            <img src="" alt="" id="electrical" width="250" height="200" class="img-fluid">
                            <br>
                          </div>
                          <div class="col-md-3">
                            <img src="" alt="" id="fsec" width="250" height="200" class="img-fluid">
                            <br>
                          </div>
                          <br>
                          <div class="col-md-3">
                            <img src="" alt="" id="or" width="250" height="200" class="img-fluid">
                            <br>
                          </div>
        
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <div class="col-md-12" class="form-label">
                              <button class="btn btn-primary" id="occupancy_btn">Approved</button>
                              <button class="btn btn-danger" id="occu_modal_msg">Return/Lack of Requirements</button>
                          </div>
                    </div>
                </div>
              </div>
            </div>

            <!-- end of occupancy -->

             <div class="center_sp">
                    <div id="loading"></div>
                </div>


        </div>


        <!-- FSIC-Business Permit message form -->
        <div class="modal_img">
                <div class="container">
                <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Message</h5>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                            <div class="mb-1">
                                <textarea name="" id="lacking_msg" cols="5" rows="5" class="form-control" style="resize: none;" placeholder="Write a Message"></textarea>
                            </div>
                            
                        </div>
                      </div>
                      <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" onclick="modal_img_close();">Close</button>
                        <button type="button" class="btn btn-success" id="lack">Submit</button>
                      </div>
                    </div>
                  </div>
            </div>
            </div>
            <!-- end of FSIC-Business Permit message form -->


            <!-- FSEC-Permit  message form-->
            <div class="modal_img_fsec">
                <div class="container">
                <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Message</h5>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                            <div class="mb-1">
                                <textarea name="" id="fsec_msg" cols="5" rows="5" class="form-control" style="resize: none;" placeholder="Write a Message"></textarea>
                            </div>
                            
                        </div>
                      </div>
                      <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" onclick="modal_img_close();">Close</button>
                        <button type="button" class="btn btn-success" id="fsec_lack">Submit</button>
                      </div>
                    </div>
                  </div>
            </div>
            </div>
            <!-- end of FSEC-Permit messgae form -->

            <!-- occupancy message form -->
            <div class="modal_img_occupancy">
                <div class="container">
                <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Message</h5>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                            <div class="mb-1">
                                <textarea name="" id="occu_msg" cols="5" rows="5" class="form-control" style="resize: none;" placeholder="Write a Message"></textarea>
                            </div>
                            
                        </div>
                      </div>
                      <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" onclick="modal_img_close();">Close</button>
                        <button type="button" class="btn btn-success" id="occupancy_lack">Submit</button>
                      </div>
                    </div>
                  </div>
            </div>
            </div>
            <!-- end of occupancy message form -->


        <!-- <div class="data"> -->
            
        <!-- </div> -->

       <?php
  }

?>

        


     



    <script type="text/javascript" src="../../assets/js/fontawesome.js"></script>
    <script src="../../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../../assets/js/function.js"></script>
    <script src="../../assets/js/date.js"></script>
    <script src="../../assets/js/alertify.js"></script>
    <script src="../../assets/js/alertify.min.js"></script>
    <script src="js/load.js"></script>


</body>
</html>