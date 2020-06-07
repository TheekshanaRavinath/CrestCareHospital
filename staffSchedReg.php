<?php
  		include 'DBconnection.php';

  		if(isset($_POST["btnReg"])){

  			
  			$ssDate = $_POST["scDate"];
  			$ssTimeFro = $_POST["scfTime"];
  			$ssTimeTo = $_POST["sctTime"];
        $ssAssto = $_POST["assignTO"];
        $smemid = $_POST["rid"];

  			$sql = "INSERT INTO staff_schedule (scdate,fromTime,toTime,assignTo,smID) VALUES ('$ssDate','$ssTimeFro','$ssTimeTo','$ssAssto','$smemid')";
  			if($conn->query($sql) === TRUE){
				echo "<center><label>New record created successfully</label></center>";
				}
				else{
					echo "Error: ".$sql."<br>".$conn->error;
				}
  		}
  	?>