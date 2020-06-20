<?php
	include 'DBconnection.php';

	$apid = $_POST["apid"];
	
	


	$sql = "DELETE FROM appointment WHERE apID='$apid'";
	



	if (mysqli_query($conn, $sql)) {
	    echo "Record deleted successfully";
	} else {
	    echo "Error deleting record: " . mysqli_error($conn);
	}
	
?>