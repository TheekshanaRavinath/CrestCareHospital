<?php
	include 'DBconnection.php';

	$wid = $_POST["wid"];
	$wname = $_POST["wname"];
	


	$sql = "DELETE FROM ward WHERE wardID='$wid' or wardName='$wname'";
	



	if (mysqli_query($conn, $sql)) {
	    echo "Record deleted successfully";
	} else {
	    echo "Error deleting record: " . mysqli_error($conn);
	}
	
?>