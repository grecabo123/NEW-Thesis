<?php  
	
	include '../../connector/connect.php';
	
	if (isset($_POST['search'])) {
		$id = mysqli_real_escape_string($conn,$_POST['num']);

		$search = "SELECT *from tbl_service_type WHERE queue = $id";
		$result = mysqli_query($conn,$search);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
			    $id_fk = $row['tbl_info_fk'];
			    All_data($id_fk);
			    break;
			}
		}
		else{
			echo 1;
		}
	}
?>

<?php  
	
	function All_data($id_fk){


		include '../../connector/connect.php';

		$all = "SELECT *from tbl_service_type JOIN tbl_client_info ON tbl_info_fk = client_info_id WHERE tbl_info_fk = $id_fk";

		$result_val = [];
		$result_q = mysqli_query($conn,$all);
		if (mysqli_num_rows($result_q) > 0) {
			foreach ($result_q as $value) {
			    array_push($result_val,$value);
			}
			header("Content-type: application/json");
			echo json_encode($result_val);
		}
		else{
			echo $return ="<h3>No Data </h3>";
		}
	}

?>