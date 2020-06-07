<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>

  <?php //auto increment user ID

	include 'DBconnection.php';
	$idno = "";
 
	$result = $conn->query("SELECT max(wardID) FROM ward ");
	$row = mysqli_fetch_array($result,MYSQLI_NUM);
		
  ?>



  
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
<center><label style="font-size:250%">Ward registration</label></center>
<form action="warReg.php" method="post" id="myForm">

	<div class="row">
		<div class="col-sm-4">
			<label>Ward number</label>
			<input type="text" name="wNo" class="form-control" readonly="" value="<?php echo $row[0]+1 ?>" />
			<label>Ward description</label>
			<textarea name="wDes" cols="40" class="form-control"></textarea>
		</div>

		<div class="col-sm-4">
			<label>Ward name</label>
			<input type="text" name="wName" class="form-control" />
			<label>Ward special for</label>
			<input type="text" name="wSpec" class="form-control" />


		</div>

		<div class="col-sm-4">
			<input type="submit" name="btnReg" class="btn btn-lg btn-primary btn-block" />
		</div>

	</div>
</form>
</body>
</html>