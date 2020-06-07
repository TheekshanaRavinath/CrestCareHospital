<?php
	include 'DBconnection.php';

	$wid = $_POST["rid"];
	
	


	$sql = "DELETE FROM room WHERE roomID='$wid'";
	



	if (mysqli_query($conn, $sql)) {
	    echo "Record deleted successfully";
	} else {
	    echo "Error deleting record: " . mysqli_error($conn);
	}
	
?>