<?php
  		include 'DBconnection.php';

  		if(isset($_POST["btnReg"])){

  			
  			$rclass = $_POST["rClz"];
  			$avail = $_POST["rAvail"];
  			$rdesc = $_POST["rDes"];
        $wno = $_POST["wid"];

  			$sql = "INSERT INTO room (roomClass,roomDescription,roomAvailability,wardID) VALUES ('$rclass','$rdesc','$avail','$wno')";
  			if($conn->query($sql) === TRUE){
				echo "<center><label>New record created successfully</label></center>";
				}
				else{
					echo "Error: ".$sql."<br>".$conn->error;
				}
  		}
  	?>