<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>

<script type="text/javascript">
  function setADID(){
    var t1 = document.getElementById('selectbox').value;
    document.getElementById('idad').value = t1;
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
<body background="images/Untitled-1.jpg" onload="setADID()">

<form action="MReportDelete.php" method="post" name="myForm">
<center><label id="mainLabel" style="font-size:250%">Delete medical report details</label></center>
	<div class="row">
	<div class="col-sm-6">
		<label>Admission number</label>
		<select  id="selectbox" name="id"  class="form-control" onclick="setADID()">
			      <?php
			      include 'DBconnection.php';
			      $sql = mysqli_query($conn, "SELECT mrID FROM medical_report");
			      while ($row = $sql->fetch_assoc()){
			      echo "<option value='" . $row['mrID'] . "'>" . $row['mrID'] . "</option>";
			      }
			      ?>
		</select>
		<input type="hidden" name="mrid" value="" id="idad"/>
	</div>
	
	<div class="col-sm-6">
		<input type="submit" name="btnDel" class="btn btn-lg btn-primary btn-block" value="Delete" />
	</div>
</div>
</form>

</body>
</html>