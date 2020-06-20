<?php
  		include 'DBconnection.php';

  		if(isset($_POST["btnReg"])){

  			
  			$mrDiseas = $_POST["mrdease"];
  			$mrDescript = $_POST["mrDesc"];
  			$mrDT = $_POST["mrDt"];
        $mrTM = $_POST["mrTm"];
        $ppid = $_POST["Pid"];

  			$sql = "INSERT INTO medical_report (mrDisease,mrDescription,mrDate,mrTime,pID) VALUES ('$mrDiseas','$mrDescript','$mrDT','$mrTM','$ppid')";
  			if($conn->query($sql) === TRUE){
				echo "<center><label>New record created successfully</label></center>";
				}
				else{
					echo "Error: ".$sql."<br>".$conn->error;
				}
  		}
  	?>