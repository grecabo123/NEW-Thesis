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
     <link rel="stylesheet" href="css/fca.css">
     <link href="../../assets/css/alertify.css" rel="stylesheet">
    <link href="../../assets/css/alertify.min.css" rel="stylesheet">
    <title>Fire Code Asessor</title>
</head>
<body>
    <div class="d-flex" id="wrapper">

       <?php  

        $_SESSION['fca_id'] = $id;

      ?>
        <!-- Sidebar -->
        <div class="bg-dark-color" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><img src="../../assets/img/Icon/logo.png" alt="Logo" class="img-thumbmail" width="100" height="100"><br><span class="text-muted"><span style="font-size: 15px;">Fire Code Asessor</span><span class="text-muted" style="font-size: 12px; vertical-align: middle;"><br><?php echo $fname." ".$lname."<br>".$position; ?></span></span></div>
            <div class="list-group list-group-flush my-3">
                <a href="index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="account" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" style="cursor: pointer;"><i class="fas fa-user-alt me-2"></i>Account</a>
                <a  href="form" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-primary" style="cursor: pointer;"><i
            class="fas fa-project-diagram me-2"></i>Transaction</a>
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
                        <button class="btn btn-primary loading" type="button" disabled>
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

            <!-- fsic business -->
            <div class="payment_fsic">
              <div class="container col-md-8 col-sm-12 p-4">
              <div class="bg-light rounded">
                <div class="modal-header bg-success">
                    <h4 class="modal-title fs-5 text-light">
                      Payment # <small id="number_q" class="text-light"></small>
                    </h4>
                    <hr>
                    <img src="../../assets/img/Icon/logo.png" alt="Logo" class="img-fluid" width="50" height="50">
                </div>
                  
                  <div class="body_information">
                  <div class="modal-body info_body">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12">
                          Permit type: <span class="text-secondary fs-5" id="type"></span>
                        </div>
                      </div>
                      <hr>
                      <div class="row mt-2">
                        <div class="col-md-6">
                          Business Name: <span class="text-secondary fs-5" id="business"></span>
                        </div>
                        <div class="col-md-6">
                          Business Owner: <span class="text-secondary fs-5" id="owner"></span>
                        </div>
                      </div>
                      <hr>
                      <div class="row mt-2">
                          <div class="col-md-6">
                            Email: <span class="text-secondary fs-5" id="email"></span>
                          </div>
                          <div class="col-md-6">
                            Contact Number: <span class="text-secondary fs-5" id="contact"></span>
                          </div>
                      </div>
                      <hr>
                      <div class="row mt-2">
                        <div class="col-md-12">
                           <button class="btn btn-primary" id="view">View Files</button>
                        </div>
                      </div>
                      <hr>
                      <div class="row mt-2">
                        <div class="col-md-12">
                          <label for="" class="form-label">
                            Upload File
                            <input type="file" class="form-control" id="file_payment">
                            <span class="text-danger">*<small class="text-info"> Format - (PNG JPG JPEG PDF)</small>
                            <span class="text-danger fs-6 error"></span><br>  
                          </label>
                        </div>
                      </div>
                      <hr>
                      <div class="row mt-2">
                        <div class="col-md-5">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">&#8369;</span>
                            </div>
                            <!-- <label for="" class="form-label">
                            Amount: --> <input type="text" class="form-control" placeholder="Total Amount" id="amount" step="0.01">
                          </label>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-md-6">
                          <button class="btn btn-primary" id="send" disabled>Send</button>
                          <button class="btn btn-danger" id="cancel">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>

                    <div class="modal-body fsic_files">
                      <div class="container">
                        <span class="text-secondary fw-3 fw-bold">File Uploaded</span>
                        <div class="row">
                          <div class="col-md-6">
                            <img src="" alt="" id="img1" class="img-fluid" width="800" height="800">
                          </div>
                          <div class="col-md-6">
                            <img src="" alt="" id="img2" class="img-fluid" width="800" height="800">
                          </div>
                          <div class="col-md-6">
                            <img src="" alt="" id="img3" class="img-fluid" width="800" height="800">
                          </div>
                        </div>

                        <div class="modal-foote mt-2">
                          <button class="btn btn-success" id="fsic_return">Back</button>
                        </div>

                      </div>
                    </div>

                </div>

              </div>
            </div>
            </div>
            <!-- end of fsic -->


            <!-- fsec payment -->
            <div class="payment_fsec">
              <div class="container col-md-8 col-sm-12 p-4">
              <div class="bg-light rounded">
                <div class="modal-header bg-success">
                    <h4 class="modal-title fs-5 text-light">
                      Payment # <small id="fsec_q" class="text-light"></small>
                    </h4>
                    <hr>
                    <img src="../../assets/img/Icon/logo.png" alt="Logo" class="img-fluid" width="50" height="50">
                </div>
                <div class="body_information">
                  <div class="modal-body fsec_info">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12">
                          Permit type: <span class="text-secondary fs-5" id="fsec_type"></span>
                        </div>
                      </div>
                      <hr>
                      <div class="row mt-2">
                        <div class="col-md-6">
                          Business Name: <span class="text-secondary fs-5" id="fsec_business"></span>
                        </div>
                        <div class="col-md-6">
                          Business Owner: <span class="text-secondary fs-5" id="fsec_owner"></span>
                        </div>
                      </div>
                      <hr>
                      <div class="row mt-2">
                          <div class="col-md-6">
                            Email: <span class="text-secondary fs-5" id="fsec_email"></span>
                          </div>
                          <div class="col-md-6">
                            Contact Number: <span class="text-secondary fs-5" id="fsec_contact"></span>
                          </div>
                      </div>
                      <hr>
                      <div class="row mt-2">
                        <div class="col-md-12">
                           <button class="btn btn-primary" id="fsec_view">View Files</button>
                        </div>
                      </div>
                      <hr>
                      <div class="row mt-2">
                        <div class="col-md-12">
                          <label for="" class="form-label">
                            Upload File
                            <input type="file" class="form-control" id="fsec_payment">
                            <span class="text-danger">*<small class="text-info"> Format - (PNG JPG JPEG PDF)</small>
                            <span class="text-danger fs-6 error_fsec"></span><br>  
                          </label>
                        </div>
                      </div>
                      <hr>
                      <div class="row mt-2">
                        <div class="col-md-5">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">&#8369;</span>
                            </div>
                            <!-- <label for="" class="form-label">
                            Amount: --> <input type="text" class="form-control" placeholder="Total Amount" id="fsec_amt" step="0.01">
                          </label>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-md-6">
                          <button class="btn btn-primary" id="fsec_send" disabled>Send</button>
                          <button class="btn btn-danger" id="fsec_cancel">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                  <div class="modal-body fsec_files">
                      <div class="container">
                        <span class="text-secondary fw-3 fw-bold">File Uploaded</span>
                        <div class="row">
                          <div class="col-md-6">
                            <img src="" alt="" id="img4" class="img-fluid" width="800" height="800">
                          </div>
                          <div class="col-md-6">
                            <img src="" alt="" id="img5" class="img-fluid" width="800" height="800">
                          </div>
                          <div class="col-md-6">
                            <img src="" alt="" id="img6" class="img-fluid" width="800" height="800">
                          </div>
                          <div class="col-md-6">
                            <img src="" alt="" id="img7" class="img-fluid" width="800" height="800">
                          </div>
                        </div>

                        <div class="modal-foote mt-2">
                          <button class="btn btn-success" id="fsec_return">Back</button>
                        </div>

                      </div>
                    </div>

              </div>
            </div>
            </div>
            <!-- end of fsec -->


            <!-- fsic occcupancy -->

             <div class="payment_occu">
              <div class="container col-md-8 col-sm-12 p-4">
              <div class="bg-light rounded">
                <div class="modal-header bg-success">
                    <h4 class="modal-title fs-5 text-light">
                      Payment # <small id="occu_q" class="text-light"></small>
                    </h4>
                    <hr>
                    <img src="../../assets/img/Icon/logo.png" alt="Logo" class="img-fluid" width="50" height="50">
                </div>
                <div class="body_information">
                  <div class="modal-body occu_info">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12">
                          Permit type: <span class="text-secondary fs-5" id="occu_type"></span>
                        </div>
                      </div>
                      <hr>
                      <div class="row mt-2">
                        <div class="col-md-6">
                          Business Name: <span class="text-secondary fs-5" id="occu_business"></span>
                        </div>
                        <div class="col-md-6">
                          Business Owner: <span class="text-secondary fs-5" id="occu_owner"></span>
                        </div>
                      </div>
                      <hr>
                      <div class="row mt-2">
                          <div class="col-md-6">
                            Email: <span class="text-secondary fs-5" id="occu_email"></span>
                          </div>
                          <div class="col-md-6">
                            Contact Number: <span class="text-secondary fs-5" id="occu_contact"></span>
                          </div>
                      </div>
                      <hr>
                      <div class="row mt-2">
                        <div class="col-md-12">
                           <button class="btn btn-primary" id="occu_view">View Files</button>
                        </div>
                      </div>
                      <hr>
                      <div class="row mt-2">
                        <div class="col-md-12">
                          <label for="" class="form-label">
                            Upload File
                            <input type="file" class="form-control" id="occu_payment">
                            <span class="text-danger">*<small class="text-info"> Format - (PNG JPG JPEG PDF)</small>
                            <span class="text-danger fs-6 error_occu"></span><br>  
                          </label>
                        </div>
                      </div>
                      <hr>
                      <div class="row mt-2">
                        <div class="col-md-5">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">&#8369;</span>
                            </div>
                            <!-- <label for="" class="form-label">
                            Amount: --> <input type="text" class="form-control" placeholder="Total Amount" id="occu_amt" step="0.01">
                          </label>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-md-6">
                          <button class="btn btn-primary" id="occu_send" disabled>Send</button>
                          <button class="btn btn-danger" id="occu_cancel">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal-body occu_files">
                      <div class="container">
                        <span class="text-secondary fw-3 fw-bold">File Uploaded</span>
                        <div class="row">
                          <div class="col-md-6">
                            <img src="" alt="" id="img8" class="img-fluid" width="800" height="800">
                          </div>
                          <div class="col-md-6">
                            <img src="" alt="" id="img9" class="img-fluid" width="800" height="800">
                          </div>
                          <div class="col-md-6">
                            <img src="" alt="" id="img10" class="img-fluid" width="800" height="800">
                          </div>
                          <div class="col-md-6">
                            <img src="" alt="" id="img11" class="img-fluid" width="800" height="800">
                          </div>
                          <div class="col-md-6">
                            <img src="" alt="" id="img12" class="img-fluid" width="800" height="800">
                          </div>
                        </div>

                        <div class="modal-foote mt-2">
                          <button class="btn btn-success" id="occu_return">Back</button>
                        </div>

                      </div>
                    </div>

              </div>
            </div>
            </div>




            <!-- end of fsic occupancy -->

        </div>

            <?php


  }

?>




    <script type="text/javascript" src="../../assets/js/fontawesome.js"></script>
    <script src="../../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../../assets/js/function.js"></script>
    <script src="../../assets/js/date.js"></script>
    <script src="js/fetch.js"></script>
    <script src="../../assets/js/alertify.js"></script>
    <script src="../../assets/js/alertify.min.js"></script>


</body>
</html>