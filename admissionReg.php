<?php
  		include 'DBconnection.php';

  		if(isset($_POST["btnReg"])){

  			
  			$adDiseas = $_POST["pdease"];
  			$adDescript = $_POST["adDesc"];
  			$adDT = $_POST["adDt"];
        $adTM = $_POST["adTm"];
        $ppid = $_POST["wid"];

  			$sql = "INSERT INTO admission (adDisease,adDescription,adDate,adTime,pID) VALUES ('$adDiseas','$adDescript','$adDT','$adTM','$ppid')";
  			if($conn->query($sql) === TRUE){
				echo "<center><label>New record created successfully</label></center>";
				}
				else{
					echo "Error: ".$sql."<br>".$conn->error;
				}
  		}
  	?>