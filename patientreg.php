<?php 

include 'DBconnection.php'; //database connection

$patientid = $_POST["pid"]; //get values to a $_POST array and assign to  variables
$proomno = $_POST["rid"];
$pfname = $_POST["pFname"];
$plname = $_POST["pLname"];
$pgen = $_POST["gender"];
$pdob = $_POST["bdate"];
$age = $_POST["page"];
$ppaddress = $_POST["pAddr"];
$ppmail = $_POST["Peaddr"];
$ptime = $_POST["xtime"];
$pdate = $_POST["xdate"];

$status = $_POST["stat"];

$contno1 = $_POST["Ppnumber"];




		//insert query to patient table
$sql = "INSERT INTO patient (roomid,pfname,plname,pgender,pbdate,page,paddress,pmail,ptime,pdate,pstatus)				             
 VALUES('$proomno','$pfname','$plname','$pgen','$pdob','$age','$ppaddress','$ppmail','$ptime','$pdate','$status')";

	
	if($conn->query($sql) === TRUE){
	echo "New record created successfully";
	}
	else{
		echo "Error: ".$sql."<br>".$conn->error;
	}
	
		//insert query to patient contact table
	$sql2 = "INSERT INTO patient_contact (pid,pcontact)				             
 VALUES('$patientid','$contno1')";

	
	if($conn->query($sql2) === TRUE){
	echo "New record created successfully2";
	}
	else{
		echo "Error: ".$sql2."<br>".$conn->error;
	}
	
	
	$conn->close();
	
	

?>