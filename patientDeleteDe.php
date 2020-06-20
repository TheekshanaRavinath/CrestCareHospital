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

  function setPNID(){
    var t2 = document.getElementById('selectbox2').value;
    document.getElementById('idPN').value = t2;
  }
  function setPFNID(){
    var t3 = document.getElementById('selectbox3').value;
    document.getElementById('idPFN').value = t3;
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

<form action="patientDelete.php" method="post" name="myForm">
<center><label id="mainLabel" style="font-size:250%">Delete petient details</label></center>
	<div class="row">
	<div class="col-sm-4">
		<label>Petient ID</label>
		<select  id="selectbox" name="id"  class="form-control" onclick="setRoomID()">
		    <option></option>
		      <?php
		      	include 'DBconnection.php';
		      $sql = mysqli_query($conn, "SELECT pID FROM patient");
		      while ($row = $sql->fetch_assoc()){
		      echo "<option value='" . $row['pID'] . "'>" . $row['pID'] . "</option>";
		      }
      ?>
  </select>
  <input type="hidden" name="id" value="" id="idRoom"/>



	</div>
	<div class="col-sm-4">
		<label>Petient firs name</label>
		
		<select  id="selectbox2" name="id2"  class="form-control" onclick="setRoomID()">
		    <option></option>
		      <?php
		      	include 'DBconnection.php';
		      $sql = mysqli_query($conn, "SELECT pfname FROM patient");
		      while ($row = $sql->fetch_assoc()){
		      echo "<option value='" . $row['pfname'] . "'>" . $row['pfname'] . "</option>";
		      }
      ?>
  </select>
  <input type="hidden" name="fname" value="" id="idPN"/>
		<input type="submit" name="btnDel" class="btn btn-lg btn-primary btn-block" />
	</div>
	<div class="col-sm-4">
		<label>Petient last name</label>
		
		<select  id="selectbox3" name="id3"  class="form-control" onclick="setPFNID()">
			<option></option>
		    
		      <?php
		      	include 'DBconnection.php';
		      $sql = mysqli_query($conn, "SELECT plname FROM patient");
		      while ($row = $sql->fetch_assoc()){
		      echo "<option value='" . $row['plname'] . "'>" . $row['plname'] . "</option>";
		      }
      ?>
  </select>
  <input type="hidden" name="lname" value="" id="idPFN"/>
	</div>
</div>
</form>

</body>
</html>