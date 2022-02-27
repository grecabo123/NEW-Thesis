<?php  

	
	include "../../connector/connect.php";

	$sql = "SELECT *FROM barangay";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['Barangay'].'<br>';
        }
        
    }
	

?>