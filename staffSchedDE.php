<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>

  <script type="text/javascript">
  function setRoomID(){
    var t1 = document.getElementById('selectbox').value;
    document.getElementById('idRoom').value = t1;
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
<body background="images/Untitled-1.jpg" onload="setRoomID()">
<center><label style="font-size:250%">Staff schedule registration</label></center>
<form action="staffSchedReg.php" method="post" id="myForm">

	<div class="row">
		<div class="col-sm-4">
			<label>Schedule date</label>
			<input type="date" name="scDate" class="form-control"  value="" />
			<label>Schedule assigned to</label>
			<select id="setState" name="assignTO" class="form-control">
				<option>shift 1</option>
				<option>shift 2</option>
				<option>shift 3</option>
				<option>shift 4</option>
				<option>shift 5</option>
				<option>shift 6</option>
			</select>
		</div>

		<div class="col-sm-4">
			<label>Schedule time from</label>
			<input type="time" name="scfTime" value="" class="form-control" />
			<label>Staff member ID</label>
			<select  id="selectbox" name="id"  class="form-control" onclick="setRoomID()">
			      <?php
			      	include 'DBconnection.php';
			      $sql = mysqli_query($conn, "SELECT smID FROM staff");
			      while ($row = $sql->fetch_assoc()){
			      echo "<option value='" . $row['smID'] . "'>" . $row['smID'] . "</option>";
			      }
			      ?>
  		    </select>
		 	 	<input type="hidden" name="rid" value="" id="idRoom"/>
		</div>

		<div class="col-sm-4">
			<label>Schedule time to</label>
			<input type="time" name="sctTime" value="" class="form-control" />
			
			<input type="submit" name="btnReg" value="Register" class="btn btn-lg btn-primary btn-block" />
		</div>

	</div>
</form>
</body>
</html>