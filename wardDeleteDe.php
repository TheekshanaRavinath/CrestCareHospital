<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript">
  function setDID(){
    var t1 = document.getElementById('selectbox2').value;
    document.getElementById('idDate').value = t1;
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

<form action="wardfDelete.php" method="post" name="myForm">
<center><label id="mainLabel" style="font-size:250%">Delete staff member details</label></center>
	<div class="row">
	<div class="col-sm-4">
		<label>Ward number</label>
		
		<select  id="selectbox2" name="id2"  class="form-control" onclick="setDID()">
                
                    <?php
                      include 'DBconnection.php';
                    $sql = mysqli_query($conn, "SELECT wardID FROM ward");
                    while ($row = $sql->fetch_assoc()){
                    echo "<option value='" . $row['wardID'] . "'>" . $row['wardID'] . "</option>";
                    }
                    ?>
                  </select>
                <input type="hidden" name="wid" id="idDate"/>

	</div>
	<div class="col-sm-4">
		<label>Ward name</label>
		<input type="text" name="wname" class="form-control" />
		
	</div>
	<div class="col-sm-4">
		<input type="submit" name="btnDel" class="btn btn-lg btn-primary btn-block" value="Delete" />
	</div>
</div>
</form>

</body>
</html>