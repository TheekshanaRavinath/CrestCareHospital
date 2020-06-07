<?php
	 include 'DBconnection.php';

     $wname="";
     $wspecial="";
     $wdescription="";
     $wardid="";
     



  if(isset($_POST["btnSearch"])){
  $wardid = $_POST["wNo"];

  $sql = "select * from ward WHERE wardID='".$wardid."'";
  $result = $conn->query($sql);

if ($result) {
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     
     $wname=$row["wardName"];
     $wspecial=$row["wSpeciality"];
     $wdescription=$row["wDescription"];
     $wardid=$row["wardID"];
     
  }else{
  
     $wname="id does not exist";
     $wspecial="id does not exist";
     $wdescription="id does not exist";
     $wardid="id does not exist";
     
}
 
$conn-> close();
}


?>