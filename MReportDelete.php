<?php
	include 'DBconnection.php';

	$mrID = $_POST["mrid"];
	
	


	$sql = "DELETE FROM medical_report WHERE mrID='$mrID'";
	



	if (mysqli_query($conn, $sql)) {
	    echo "Record deleted successfully";
	} else {
	    echo "Error deleting record: " . mysqli_error($conn);
	}
	
?>