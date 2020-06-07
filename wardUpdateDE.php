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

<script type="text/javascript">
	<?php
	 include 'DBconnection.php';

     $wname="";
     $wspecial="";
     $wdescription="";
     $wardid="";
     



  if(isset($_POST["btnSearch"])){
  $wardid = $_POST["wNo"];

  $sql = "select * from ward WHERE wardID='".$wardid."'";
  $result = $conn->query($sql);

if ($result) {
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     
     $wname=$row["wardName"];
     $wspecial=$row["wSpeciality"];
     $wdescription=$row["wDescription"];
     $wardid=$row["wardID"];
     
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
      
     $wwname=$_POST["wName"];
     $wwspecial=$_POST["wSpec"];
     $wwdescription=$_POST["wDes"];
     $wwardid=$_POST["wNo"];

     

     
    
     $sql3 = "UPDATE ward SET wardName='$wwname',wSpeciality='$wwspecial', wDescription='$wwdescription' WHERE wardID='$wwardid'";

     
  
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
<body background="images/Untitled-1.jpg" onload="setDID()">
<center><label style="font-size:250%">Ward registration</label></center>
<form action="" method="post" id="myForm">

	<div class="row">
		<div class="col-sm-4">
			<label>Ward number</label>
			
      <select  id="selectbox2" name="id2"  class="form-control" onclick="setDID()">
                <option><?php echo $wardid; ?></option>
                    <?php
                      include 'DBconnection.php';
                    $sql = mysqli_query($conn, "SELECT wardID FROM ward");
                    while ($row = $sql->fetch_assoc()){
                    echo "<option value='" . $row['wardID'] . "'>" . $row['wardID'] . "</option>";
                    }
                    ?>
                  </select>
                <input type="hidden" name="wNo" id="idDate"/>

			<label>Ward description</label>
			<textarea name="wDes" cols="40" class="form-control"><?php echo $wdescription; ?></textarea>
		</div>

		<div class="col-sm-4">
			<label>Ward name</label>
			<input type="text" name="wName" class="form-control" value="<?php echo $wname; ?>" />
			<label>Ward special for</label>
			<input type="text" name="wSpec" class="form-control" value="<?php echo $wspecial; ?>" />


		</div>

		<div class="col-sm-4">
			<input type="submit" name="btnSearch" value="Search" class="btn btn-lg btn-primary btn-block" />
			<input type="submit" name="btnUpdate" value="Update" class="btn btn-lg btn-primary btn-block" />
		</div>

	</div>
</form>
</body>
</html>