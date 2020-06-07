<?php
	include 'DBconnection.php';

	$pid = $_POST["id"];
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];


	$sql = "DELETE FROM staff WHERE smID='$pid' or fname='$fname' or lname='$lname'";
	$sql2 = "DELETE FROM staff_contact WHERE smID='$pid'";



	if (mysqli_query($conn, $sql)) {
	    echo "Record deleted successfully";
	} else {
	    echo "Error deleting record: " . mysqli_error($conn);
	}
	if (mysqli_query($conn, $sql2)) {
	    echo "Record deleted successfully2";
	} else {
	    echo "Error deleting record: " . mysqli_error($conn);
	}

?>