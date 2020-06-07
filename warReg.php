<?php
  		include 'DBconnection.php';

  		if(isset($_POST["btnReg"])){

  			
  			$wname = $_POST["wName"];
  			$wspec = $_POST["wSpec"];
  			$wdesc = $_POST["wDes"];

  			$sql = "INSERT INTO ward (wardName,wSpeciality,wDescription) VALUES ('$wname','$wspec','$wdesc')";
  			if($conn->query($sql) === TRUE){
				echo "<center><label>New record created successfully</label></center>";
				}
				else{
					echo "Error: ".$sql."<br>".$conn->error;
				}
  		}
  	?>