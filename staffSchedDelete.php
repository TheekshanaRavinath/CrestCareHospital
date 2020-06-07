<?php
	include 'DBconnection.php';

	$wid = $_POST["smid"];
	
	


	$sql = "DELETE FROM staff_schedule WHERE scdate='$wid'";
	



	if (mysqli_query($conn, $sql)) {
	    echo "Record deleted successfully";
	} else {
	    echo "Error deleting record: " . mysqli_error($conn);
	}
	
?>