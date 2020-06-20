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
  
<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('time').value =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}


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
<body background="images/Untitled-1.jpg" onload="startTime(); setPID();">
<center><label style="font-size:250%">Add new Appointment</label></center>
<form action="appointmentReg.php" method="post" id="myForm">

	<div class="row">
		<div class="col-sm-4">
			<label>Appointment number</label>
			<input type="text" name="apNo" class="form-control" readonly="" value="<?php echo $row[0]+1 ?>" />
			<label>Appointment date</label>
			<input id="datee" type="text" name="apDt" class="form-control" readonly="" />
		</div>

		<div class="col-sm-4">
			

			<label>Appointment time</label>
			<input id="time" type="text" name="apTm" class="form-control" readonly="" />

			<label>Patient ID</label>
			<select  id="selectbox2" name="id"  class="form-control" onclick="setPID()">
			      <?php

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
			<textarea name="apDesc" cols="40" class="form-control"></textarea>
			 
			<input type="submit" name="btnReg" value="Register" class="btn btn-lg btn-primary btn-block" />
		</div>

	</div>
	<script type="text/javascript">

	var dt = new Date();
document.getElementById("datee").value = (dt.getFullYear()) +"-"+ (("0"+(dt.getMonth()+1)).slice(-2)) +"-"+ (("0"+dt.getDate()).slice(-2));

	//var dt2 = new Date();
  	//document.getElementById("datee").value = dt2.toLocaleDateString();
  	
</script>
</form>
</body>
</html>