<?php
	include 'DBconnection.php';

	$aid = $_POST["adid"];
	
	


	$sql = "DELETE FROM admission WHERE adID='$aid'";
	



	if (mysqli_query($conn, $sql)) {
	    echo "Record deleted successfully";
	} else {
	    echo "Error deleting record: " . mysqli_error($conn);
	}
	
?>