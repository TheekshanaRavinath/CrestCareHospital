<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>

  <?php //auto increment user ID

	include 'DBconnection.php';
	
 
	$result = $conn->query("SELECT max(apID) FROM appointment ");
	$row = mysqli_fetch_array($result,MYSQLI_NUM);
		
  ?>


<script type="text/javascript">
  function setPID(){
    var t1 = document.getElementById('selectbox2').value;
    document.getElementById('idP').value = t1;
  }
</script>

<script type="text/javascript">
  function setAPID(){
    var t2 = document.getElementById('selectbox3').value;
    document.getElementById('idAP').value = t2;
  }
</script>
  

<script type="text/javascript">
	<?php
	 include 'DBconnection.php';

     $apNu="";
     $apDate="";
     $apTime="";
     $appDescription="";

     $ppid="";
     



  if(isset($_POST["btnSearch"])){
  $ppid = $_POST["APid"];

  $sql = "select * from appointment WHERE apID='".$ppid."'";
  $result = $conn->query($sql);

if ($result) {
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     
     $apNu=$row["apID"];
     $apDate=$row["apDate"];
     $apTime=$row["apTime"];
     $appDescription=$row["apDescription"];

     $ppid=$row["pID"];

     
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
      
     

     $apNu=$_POST["APid"];
     $apdate=$_POST["apDt"];
     $aptime=$_POST["apTm"];
     $appDescription=$_POST["apDes"];

     $ppid=$_POST["Pid"];

     
    
     $sql3 = "UPDATE appointment SET apDescription='$appDescription', apDate='$apdate',apTime='$aptime', pID='$ppid' WHERE apID='$apNu'";

     
  
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
<body background="images/Untitled-1.jpg" onload="setPID(); setAPID();">
<center><label style="font-size:250%">Update Appointment</label></center>
<form action="" method="post" id="myForm">

	<div class="row">
		<div class="col-sm-4">
			<label>Appointment number</label>
			<select  id="selectbox3" name="id"  class="form-control" onclick="setAPID()">
			<option><?php echo $apNu; ?></option>
			      <?php
			      	include 'DBconnection.php';
			      $sql = mysqli_query($conn, "SELECT apID FROM appointment");
			      while ($row = $sql->fetch_assoc()){
			      echo "<option value='" . $row['apID'] . "'>" . $row['apID'] . "</option>";
			      }
			      ?>
			 </select>
			 <input type="hidden" name="APid" value="" id="idAP"/>

			<label>Appointment date</label>
			<input id="datee" type="date" name="apDt" class="form-control" value="<?php echo $apDate; ?>"  />
		</div>

		<div class="col-sm-4">
			

			<label>Appointment time</label>
			<input id="time" type="time" name="apTm" class="form-control" value="<?php echo $apTime; ?>" />

			<label>Patient ID</label>
			<select  id="selectbox2" name="id"  class="form-control" onclick="setPID()">
				<option><?php echo $ppid; ?></option>
			      <?php
			      	include 'DBconnection.php';
			      $sql = mysqli_query($conn, "SELECT pid FROM patient");
			      while ($row = $sql->fetch_assoc()){
			      echo "<option value='" . $row['pid'] . "'>" . $row['pid'] . "</option>";
			      }
			      ?>
			 </select>
			 <input type="hidden" name="Pid" value="" id="idP"/>

			 	 
		</div>

		<div class="col-sm-4">
			
			
			 <label>Appointment description</label>
			<textarea name="apDes" cols="40" class="form-control"><?php echo $appDescription; ?></textarea>
			 
			<input type="submit" name="btnSearch" value="Search" class="btn btn-lg btn-primary btn-block" />
			<input type="submit" name="btnUpdate" value="Update" class="btn btn-lg btn-primary btn-block" />
		</div>

	</div>
	
</form>
</body>
</html>