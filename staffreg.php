<?php 

include 'DBconnection.php';

$patientid = $_POST["pid"];

$pfname = $_POST["pFname"];
$plname = $_POST["pLname"];
$pdob = $_POST["bdate"];
$pgen = $_POST["gender"];

$ppaddress = $_POST["pAddr"];
$ppmail = $_POST["Peaddr"];
$position = $_POST["smPos"];
$ptime = $_POST["xtime"];
$pdate = $_POST["xdate"];



$contno1 = $_POST["Ppnumber"];
$contno2 = $_POST["Ppnumber2"];




$sql = "INSERT INTO staff (fname,lname,smDOB,smGender,smAddress,smEmail,smPosition,smTime,smDate)				             
 VALUES('$pfname','$plname','$pdob','$pgen','$ppaddress','$ppmail','$position','$ptime','$pdate')";

	
	if($conn->query($sql) === TRUE){
	echo "New record created successfully";
	}
	else{
		echo "Error: ".$sql."<br>".$conn->error;
	}
	

	$sql2 = "INSERT INTO staff_contact (smID,smContact)				             
 VALUES('$patientid','$contno1')";

	
	if($conn->query($sql2) === TRUE){
	echo "New record created successfully2";
	}
	else{
		echo "Error: ".$sql2."<br>".$conn->error;
	}

	$sql3 = "INSERT INTO staff_contact (smID,smContact)				             
 VALUES('$patientid','$contno2')";

	
	if($conn->query($sql3) === TRUE){
	echo "New record created successfully3";
	}
	else{
		echo "Error: ".$sql3."<br>".$conn->error;
	}
	
	
	$conn->close();
	
	

?>