<?php
  		include 'DBconnection.php';

  		if(isset($_POST["btnReg"])){

  			
  			
  			$apDescript = $_POST["apDesc"];
  			$apDT = $_POST["apDt"];
        $apTM = $_POST["apTm"];
        $ppid = $_POST["Pid"];

  			$sql = "INSERT INTO appointment (apDescription,apDate, apTime, pID) VALUES ('$apDescript','$apDT','$apTM','$ppid')";
  			if($conn->query($sql) === TRUE){
				echo "<center><label>New record created successfully</label></center>";
				}
				else{
					echo "Error: ".$sql."<br>".$conn->error;
				}
  		}
  	?>