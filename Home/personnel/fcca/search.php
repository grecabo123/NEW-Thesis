<?php  
	
	include '../../connector/connect.php';
	
	if (isset($_POST['search'])) {
		$id = mysqli_real_escape_string($conn,$_POST['num']);

	
		$search = "SELECT *from tbl_service_type WHERE queue = $id";
		$result = mysqli_query($conn,$search);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
			    $id_fk = $row['tbl_service_id'];
			    All_data($id_fk,$id);
			    break;
			}
		}
		else{
			echo 1;
		}
	}
?>

<?php  
	
	function All_data($id_fk,$id){


		include '../../connector/connect.php';

		$all = "SELECT *from tbl_service_type JOIN tbl_client_info ON tbl_info_fk = client_info_id WHERE tbl_service_id = $id_fk AND queue = $id";

		
		$result_q = mysqli_query($conn,$all);
		if (mysqli_num_rows($result_q) > 0) {
			while ($row = mysqli_fetch_assoc($result_q)) {
			    echo 0;
				session_start();
				$_SESSION['info'] = $row['tbl_service_id'];
				break;
			}
		}

		
		
	}

?>