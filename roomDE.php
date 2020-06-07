<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>

  <?php //auto increment user ID

	include 'DBconnection.php';
	
 
	$result = $conn->query("SELECT max(roomID) FROM room ");
	$row = mysqli_fetch_array($result,MYSQLI_NUM);
		
  ?>


<script type="text/javascript">
  function setRoomID(){
    var t1 = document.getElementById('selectbox2').value;
    document.getElementById('idWard').value = t1;
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
<body background="images/Untitled-1.jpg">
<center><label style="font-size:250%">Room registration</label></center>
<form action="roomReg.php" method="post" id="myForm">

	<div class="row">
		<div class="col-sm-4">
			<label>Room number</label>
			<input type="text" name="rNo" class="form-control" readonly="" value="<?php echo $row[0]+1 ?>" />
			<label>Room description</label>
			<textarea name="rDes" cols="40" class="form-control"></textarea>
		</div>

		<div class="col-sm-4">
			<label>Room class</label>
			<select id="selectClz" name="rClz" class="form-control">
				<option>A</option>
				<option>B</option>
				<option>C</option>
			</select>
			<label>Ward number</label>
			<select  id="selectbox2" name="id"  class="form-control" onclick="setRoomID()">
			      <?php

			      $sql = mysqli_query($conn, "SELECT wardID FROM ward");
			      while ($row = $sql->fetch_assoc()){
			      echo "<option value='" . $row['wardID'] . "'>" . $row['wardID'] . "</option>";
			      }
			      ?>
			 </select>

			 	 <input type="hidden" name="wid" value="" id="idWard"/>
		</div>

		<div class="col-sm-4">
			<label>Room availability</label>
			<select id="selectAvail" name="rAvail" class="form-control">
				<option>Available</option>
				<option>Not available</option>
			</select>
			<input type="submit" name="btnReg" value="Register" class="btn btn-lg btn-primary btn-block" />
		</div>

	</div>
</form>
</body>
</html>