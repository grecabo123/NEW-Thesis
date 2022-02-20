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
    <link rel="stylesheet" href="css/invoice.css">
    <title>Fire Code Collecting Agent</title>
</head>
<body>

    <?php  

    session_start();

    if ($_SESSION['info']) {
        
        require '../../connector/connect.php';
        $id = $_SESSION['info'];

        

        $all = "SELECT client.business_name,client.email,client.contact_number,service.queue,service.service_type,service.tbl_service_id,trans.transaction_code,trans.amount,trans.file_payment,pay.total_fees from tbl_client_info as client JOIN tbl_service_type as service ON service.tbl_info_fk = client.client_info_id JOIN tbl_transaction as trans ON trans.transaction_business_fk = service.tbl_service_id JOIN tbl_payment as pay ON pay.tbl_client_fk = client.client_info_id where service.tbl_service_id = $id";

        $result = mysqli_query($conn,$all);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $permit = $row['service_type'];
                $business_name = $row['business_name'];
                $ticket = $row['queue'];
                $email = $row['email'];
                $contact = $row['contact_number'];
                $fee = $row['total_fees'];
                $code = $row['transaction_code'];
                $amt = $row['amount'];
                $service_id = $row['tbl_service_id'];
                $file = $row['file_payment'];
                invoice($id,$business_name,$ticket,$permit,$email,$contact,$fee,$code,$amt,$file,$service_id);  
                break;
            }
        }    
    }
    else{
        header("location: transaction");
        exit();
    }

    ?>


<?php  


    function invoice($id,$business_name,$ticket,$permit,$email,$contact,$fee,$code,$amt,$file,$service_id){
        ?>
            <div class="container-fluid mt-100 mb-100">
    <div id="ui-view">
        <div>
            <div class="card">
                <div class="card-header bg-success"> <img src="../../assets/img/icon/logo.png" alt="" class="img-fluid text-light" width="50" height="50"> Ticket #: <strong><?php echo $ticket; ?></strong>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h6 class="mb-3">From:</h6>
                            <div>Business Name: <strong><?php echo $business_name; ?></strong></div>
                            <div>Email: <strong> <?php echo  $email; ?> </strong></div>
                            <div>Phone: <strong> <?php echo $contact; ?> </strong> </div>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="mb-3">Details:</h6>
                            <div>Ticket #:<strong><?php echo $ticket; ?></strong></div>
                            <div>Date: <strong>March 22, 2020</strong></div>
                            <div>Receipt code:<strong> <?php echo $code; ?></strong></div>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Permit Type</th>
                                    <th>Business Name</th>
                                    <th>Attachment</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="center">1</td>
                                    <td class="left"><?php echo $permit; ?></td>
                                    <td class="left"> <?php echo $business_name; ?> </td>
                                    <td class="left"><a href="../../commerce/Payment/<?php echo $file; ?>" class="btn btn-sm btn-primary">View</a></td>
                                    <td class="right"><span>&#8369;</span><?php echo $amt; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="float-left">
                        <div class="row">
                       
                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="left"><strong>Fee</strong></td>
                                        <td class="right"> <span>&#8369;</span> <?php echo $fee; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="left"><strong>Total</strong></td>
                                        <td class="right"><strong><span>&#8369;</span><?php echo $fee; ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="container">
                                <div class="row d-flex">
                                    <div class="col-md-4">
                                 <button class="btn btn-sm btn-success" id="submit" value="<?php echo $service_id; ?>"><i class="fa fa-paper-plane mr-1"></i> Proceed</button>
                            <button class="btn btn-sm btn-success" id="loading" type="button" disabled>
                                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                  Processing...
                                </button>   
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-sm btn-danger" onclick="Out();">Cancel</button>
                            </div>
                                </div>
                                <p class="text-danger" id="error"></p>
                            </div>

                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <?php
    }


?>    






 <script type="text/javascript" src="../../assets/js/fontawesome.js"></script>
    <script src="../../assets/js/jquery-3.4.1.min.js"></script>
    <script src="js/invoice.js"></script>
    
</body>
</html>