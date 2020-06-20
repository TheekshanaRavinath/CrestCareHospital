<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>

  <?php //auto increment user ID

	include 'DBconnection.php';
	
 
	$result = $conn->query("SELECT max(mrID) FROM medical_report ");
	$row = mysqli_fetch_array($result,MYSQLI_NUM);
		
  ?>


<script type="text/javascript">
  function setPID(){
    var t1 = document.getElementById('selectbox2').value;
    document.getElementById('idP').value = t1;
  }

function setMRID(){
    var t2 = document.getElementById('selectbox3').value;
    document.getElementById('idMR').value = t2;
  }

  
</script>

<script type="text/javascript">
	<?php
	 include 'DBconnection.php';

     $mrno="";
     $mrdias="";
     $mrid="";
     $mrdate="";
     $mrtime="";
     $mrDes="";
     $ppid="";

     
     
  if(isset($_POST["btnSearch"])){
  $mrid = $_POST["mrid"];

  $sql = "select * from medical_report WHERE mrID='".$mrid."'";
  $result = $conn->query($sql);

if ($result) {
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     

     $mrno=$row["mrID"];
     $mrdias=$row["mrDisease"];
     $ppid=$row["pID"];
     $mrdate=$row["mrDate"];
     $mrtime=$row["mrTime"];
     $mrDes=$row["mrDescription"];

     
  }else{
  
     $wname="id does not exist";
     $wspecial="id does not exist";
     $wdescription="id does not exist";
     $wardid="id does not exist";
     
}
 
$conn-> close();
}


?>
</script>
<script type="text/javascript">
	<?php
		if (isset($_POST['btnUpdate'])) {
      
     
     
     

     $mrno=$_POST["mrid"];
     $mrdias=$_POST["mrdease"];
     $ppid=$_POST["Pid"];
     $mrdate=$_POST["mrDt"];
     $mrtime=$_POST["mrTm"];
     $mrDes=$_POST["mrDesc"];

     
    
    $sql3 = "UPDATE medical_report SET mrDisease='$mrdias',mrDescription='$mrDes', mrDate='$mrdate', mrTime='$mrtime',pID='$ppid' WHERE mrID='$mrno'";

     
  
   if ($conn->query($sql3) === TRUE) {
    echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    
    }

     $conn->close();
	?>
</script>

</head>
<style type="text/css">
	.row {
    margin-right: 5px;
    margin-left: 5px;
}

label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: -2px;
    font-weight: 700;
    margin-top: 3%;
}

#mainLabel{
	margin-top: 0%;
}
input[type=submit].btn-block{
	margin-top: 5%;
}
#iframe_a{
	display: none;
}
	
</style>
<body background="images/Untitled-1.jpg" onload="setPID(); setMRID();">
<center><label style="font-size:250%">Update medical report</label></center>
<form action="" method="post" id="myForm">

	<div class="row">
		<div class="col-sm-4">
			<label>Medical report number</label>
			<select  id="selectbox3" name="id3"  class="form-control" onclick="setMRID()">
				<option><?php echo $mrno; ?></option>
			      <?php
			      	include 'DBconnection.php';
			      $sql = mysqli_query($conn, "SELECT mrID FROM medical_report");
			      while ($row = $sql->fetch_assoc()){
			      echo "<option value='" . $row['mrID'] . "'>" . $row['mrID'] . "</option>";
			      }
			      ?>
			 </select>
			 <input type="hidden" name="mrid" value="" id="idMR"/>

			<label>Report date</label>
			<input id="datee" type="date" name="mrDt" class="form-control"  value="<?php echo $mrdate; ?>" />
		</div>

		<div class="col-sm-4">
			<label>Patient disease</label>
			<input type="text" name="mrdease" class="form-control" value="<?php echo $mrdias; ?>" />

			<label>Report time</label>
			<input id="time" type="time" name="mrTm" class="form-control"  value="<?php echo $mrtime; ?>" />
			

			 	 
		</div>

		<div class="col-sm-4">
			
			<label>Patient ID</label>
			<select  id="selectbox2" name="id"  class="form-control" onclick="setPID()">
				<option><?php echo $ppid; ?></option>
			      <?php
			      	include 'DBconnection.php';
			      $sql = mysqli_query($conn, "SELECT pid FROM admission");
			      while ($row = $sql->fetch_assoc()){
			      echo "<option value='" . $row['pid'] . "'>" . $row['pid'] . "</option>";
			      }
			      ?>
			 </select>
			 <input type="hidden" name="Pid" value="" id="idP"/>

			 <label>Report description</label>
			<textarea name="mrDesc" cols="40" class="form-control"><?php echo $mrDes; ?></textarea>
			 
			<input type="submit" name="btnSearch" value="Search" class="btn btn-lg btn-primary btn-block" />
			<input type="submit" name="btnUpdate" value="Update" class="btn btn-lg btn-primary btn-block" />
		</div>

	</div>
	
</form>
</body>
</html>