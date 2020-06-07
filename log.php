<?php
include('DBconnection.php');

$user = $_POST["txtUname"];
$pw = $_POST["txtPass"];

$position="";

$sql = "SELECT * FROM user_login WHERE username ='".$user."' and password ='".$pw."' ";
$result = $conn->query($sql);
if($result->num_rows > 0){


	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$position=$row["position"];

	if($position=="doctor"){

			include("main Menu_doctor.php");

	}else if($position=="front officer"){

			include("main Menu.php");
	}
	
	
	
}else{
	
	
	$message = "Username /or Password incorrect. Try again.";
  echo "<script type='text/javascript'>alert('$message');</script>";

	
}


?>