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
     <link rel="stylesheet" href="css/inspection.css">
     <link href="../../assets/css/alertify.css" rel="stylesheet">
    <link href="../../assets/css/alertify.min.css" rel="stylesheet">
    <title><?php echo $position; ?></title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark-color" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><img src="../../assets/img/Icon/logo.png" alt="Logo" class="img-thumbmail" width="100" height="100"><br><span class="text-muted"><span style="font-size: 15px;">Chief Inspector </span><span class="text-muted" style="font-size: 12px; vertical-align: middle;">  <br><?php echo $fname." ".$lname."<br>"."Inspector"; ?></span></span></div>
            <div class="list-group list-group-flush my-3">
                <a href="index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="account" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" style="cursor: pointer;"><i class="fas fa-user-alt me-2"></i>Account</a>
        <a id="report" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" style="cursor: pointer;"><i
            class="fas fa-project-diagram me-2"></i>Request &nbsp<i class="fas fa-caret-down" id="caret"></i></a>
             <!-- dropdownb -->
                <div class="container-fluid d-block">
                    <!-- <div class="list-group-item bg-transparent list"> -->
                        <li class="list-group text-justify list-group-item bg-transparent list">
                            <a href="inspection" class="bg-transparent second-text fw-bold text-primary"><i class="fas fa-file"></i> Inspection</a>
                        </li>
                        <li class="list-group text-justify list-group-item bg-transparent list">
                            <a href="approve" class="bg-transparent second-text fw-bold"><i class="fas fa-file-archive"></i>  Approved Form</a>
                        </li>
                        <li class="list-group text-left list-group-item bg-transparent list">
                            <a href="pending" class="bg-transparent second-text fw-bold"> <i class="fas fa-file-invoice"></i> Requested Form </a>
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

            <div class="data-table">
              <div class="m-4">
                    <div class="table-responsive">
                        <table class="table text-light">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-light">Ticket #</th>
                                    <th class="text-light">Permit Type:</th>
                                    <th class="text-light">Business</th>
                                    <th class="text-light">Status</th>
                                    <th class="text-light text-center">Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody id="table_data">
                               <!-- <tr>
                                 <td>2311253</td>
                                 <td>FSIC Occcupancy</td>
                                 <td>Jollibee</td>
                                 <td>pending</td>
                                 <td class="text-center">
                                  <button class="btn btn-success" id="form"><i class="fas fa-pen"></i></button>
                                   <button class="btn btn-primary"><i class="fas fa-file-upload"></i></button>
                                   
                                 </td>
                                 
                               </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

          

          <div class="inspection">
            <div class="container">
              <div class="modal-content">
                  <div class="modal-header bg-success">
                      <div class="col-md-12">
                          <!-- <img src="../assets/img/Icon/logo.png" alt="Logo" class="img-thumbmail rounded-circle" width="100" height="100"> -->
                          <h3 class="text-left modal-title fw-bold text-light">Inspection Form</h3>
                      </div>
                  </div>
                  <!-- modal body -->
                  <div class="modal-body">
                    <hr>
                    <h3>Information</h3>
                      <div class="row">
                        <div class="col-md-3">
                          <label for="" class="form-label">
                            Ticket #:
                          </label>
                          <input type="text" class="form-control" readonly id="ticket">
                        </div>
                        <div class="col-md-4">
                          <label for="" class="form-label">
                            Name of Establishment
                          </label>
                          <input type="text" class="form-control" readonly id="establishmest">
                        </div>
                       
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <label for="" class="form-label">
                          Reference: Inspection Order No.
                        </label>
                          <input type="text" class="form-control " readonly id="inspection_no">
                        </div>
                        <div class="col-md-4">
                          <label for="" class="form-label">
                          Date Issued:
                        </label>
                          <input type="date" class="form-control" id="date_issued">
                        </div>
                        <div class="col-md-4">
                          <label for="" class="form-label">
                          Date of Inspection
                        </label>
                          <input type="date" class="form-control" id="date_inspection">
                        </div>
                      </div>
                      <hr>
                      <div class="row mt-2">
                        <div class="col-md-12">
                          <h3 class="fs-6">Nature of Inspection Conducted: </h3>
                        </div>
                        <div class="col-md-4">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Building Under Construction" name="ion">
                            <label class="form-check-label" for="flexCheckChecked">
                              Building Under Construction
                            </label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Periodic Inspection of Occupancy" name="ion">
                            <label class="form-check-label" for="flexCheckChecked">
                              Periodic Inspection of Occupancy
                            </label>
                          </div>
                        </div> 
                        <div class="col-md-4">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Application for Occupancy Permit" name="ion">
                            <label class="form-check-label" for="flexCheckChecked">
                             Application for Occupancy Permit
                            </label>
                          </div>
                        </div> 
                        <div class="col-md-4">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Application for Business Permit" name="ion">
                            <label class="form-check-label" for="flexCheckChecked">
                              Application for Business Permit
                            </label>
                          </div>
                        </div> 
                        <div class="col-md-5">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Verification Inspection of Complaint Received" name="ion">
                            <label class="form-check-label" for="flexCheckChecked">
                              Verification Inspection of Complaint Received
                            </label>
                          </div>
                        </div> 
                        <div class="col-md-4">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="">
                            <label class="form-check-label" for="flexCheckChecked">
                              Others (Specify) <input type="text" class="form-control d-none" id="specify">
                            </label>
                          </div>
                        </div>  
                      </div>
                      <hr>
                      <div class="row mt-2">
                        <h4>Type Of Building</h4>
                        <div class="col-md-12">
                          <select name="" id="building" class="form-select">
                            <option value="" selected>Type of Building</option>
                            <option value="Industrial Occupancy Checklist">Industrial Occupancy Checklist</option>
                            <option value="Educational Occupancy Checklist">Educational Occupancy Checklist</option>
                            <option value="Detendtion and Correctional Occupancy Checklist">Detendtion and Correctional Occupancy Checklist</option>
                            <option value="Business Occupancy Checklist">Business Occupancy Checklist</option>
                            <option value="Mercantile Occupancy Checklist">Mercantile Occupancy Checklist</option>
                            <option value="Single and Two-Family Dwelling Checklist">Single and Two-Family Dwelling Checklist</option>
                            <option value="Healthcare Occupancy Checklist">Healthcare Occupancy Checklist</option>
                            <option value="Storage Occupancy Checklist">Storage Occupancy Checklist</option>
                            <option value="Places of Assembly Occupancy Checklist(Theater Type)">Places of Assembly Occupancy Checklist(Theater Type)</option>
                            <option value="Small/Big Business Establishment Checklist">Small/Big Business Establishment Checklist</option>
                            <option value="Miscellaneous Occupancy Checklist">Miscellaneous Occupancy Checklist</option>
                            <option value="Gasoline Service Station Checklist">Gasoline Service Station Checklist</option>
                            <option value="Residential Occupancy Checklist">Residential Occupancy Checklist</option>
                            <option value="Places of Assembly Occupancy Checklist">Places of Assembly Occupancy Checklist</option>
                          </select>
                        </div>
                      </div>
                      <hr>
                      <!-- <div class="row">
                        <h3>Upload File</h3>
                        <div class="col-md-6">
                          <input type="file" class="form-control">
                        </div>
                        <br>
                        <div class="col-md-6">
                          <input type="file" class="form-control">
                        </div>
                        <div class="col-md-6">
                          <input type="file" class="form-control">
                        </div>
                        <div class="col-md-6">
                          <input type="file" class="form-control">
                        </div>
                      </div> -->
                  </div>
                  <!-- end of modal body -->

                  <!-- modal footer -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" onclick="modal_img_close();">Close</button>
                      <button type="button" class="btn btn-primary" id="send_save">Send and Save</button>
                  </div>
                  <!-- end of modal footer -->

              </div>
          </div> 
        </div>

         

        <!-- end of modal -->



        <!-- file Uploaded form -->




        
        <div class="inspection_upload">
            <div class="container w-75">
              <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="modal-content">
                  <div class="modal-header bg-success">
                    <h3 class="text-light">Upload File</h3>
                  </div>
                  <div class="modal-body">
                    <div class="col-md-12">
                        <div class="mt-2">
                          <label for="" class="form-label fw-bold text-secondary">
                            Occupancy Checklist
                          </label>
                          <br>
                          <input type="file" class="form-control" id="file_checklist">
                          <span class="text-secondary fs-6"><span><strong>Note:</strong> <span class="fs-6">Please Upload <strong>PDF</strong> only</span></span></span>
                        </div>

                    </div>

                    <hr>
                    <div class="col-md-12">
                      <label for="" class="form-label fw-bold text-secondary">
                      Inspection Order
                      </label>
                      <input type="file" class="form-control" id="inspection_order">
                      <span class="text-secondary fs-6"><span><strong>Note:</strong> <span class="fs-6">Please Upload <strong>PDF</strong> only</span></span></span>
                    </div>
                    <hr>
                    <div class="col-md-12">
                      <label for="" class="form-label fw-bold text-secondary">
                      Inspection Status
                      </label>
                  
                    <select name="" id="inspection" class="form-select">
                      <option value="" selected>Please Choose</option>
                      <option value="Approved">Approved</option>
                      <option value="Comply">Notice to Comply</option>
                      <option value="Correction">Notice to Correction</option>
                    </select>
                     <div class="mt-2 comply">
                          <label for="" class="form-label fw-bold text-secondary">
                            Notice to Comply
                          </label>
                          <br>
                          <input type="file" class="form-control" id="file_comply">
                          <span class="text-secondary fs-6"><span><strong>Note:</strong> <span class="fs-6">Please Upload <strong>PDF</strong> only</span></span></span>
                        </div>
                        <div class="mt-2 correction">
                          <label for="" class="form-label fw-bold text-secondary">
                            Notice to Correction
                          </label>
                          <br>
                          <input type="file" class="form-control" id="file_correction">
                          <span class="text-secondary fs-6"><span><strong>Note:</strong> <span class="fs-6">Please Upload <strong>PDF</strong> only</span></span></span>
                        </div>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <ul>
                      <li><button class="btn btn-sm btn-secondary" onclick="close_upload();"><i class="fas fa-times"></i> Close</button></li>
                      <li><button class="btn btn-sm btn-primary" id="file_upload" disabled><i class="fas fa-upload"></i> Upload And Update</button></li>
                      <li><button class="btn btn-primary btn-sm dot-btn" type="button" disabled>
                        Uploading
                              <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                              <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                          </button></li>  
                    </ul>
                  </div>
                </div>
              </div>
            </div>
        </div>


        <!-- end of file uploaded form -->



         


       <?php
  }

?>


     



    <script type="text/javascript" src="../../assets/js/fontawesome.js"></script>
    <script src="../../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../../assets/js/function.js"></script>
    <script src="../../assets/js/date.js"></script>
    <!-- <script src="../../assets/vendor/bootstrap/js/bootstrap.js"></script> -->
    <script src="js/modal.js"></script>
    <script src="js/load.js"></script>
     <script src="../../assets/js/alertify.js"></script>
    <script src="../../assets/js/alertify.min.js"></script>
</body>
</html>