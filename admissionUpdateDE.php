<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>

  

<script type="text/javascript">
  function setADID(){
    var t2 = document.getElementById('selectbox3').value;
    //document.getElementById('idAD').value = t2;
    document.forms["myForm"]["adid"].value = t2;
  }
</script>


<script type="text/javascript">
  function setPID(){
    var t1 = document.getElementById('selectbox2').value;
    //document.getElementById('idP').value = t1;
    document.forms["myForm"]["Pid"].value = t1;
  }
</script>


  
<script type="text/javascript">
	<?php
	 include 'DBconnection.php';

     $adno="";
     $pdias="";
     $paID="";
     $addate="";
     $adtime="";
     $adDes="";

     
     



  if(isset($_POST["btnSearch"])){
  $adno = $_POST["adid"];

  $sql = "select * from admission WHERE adID='".$adno."'";
  $result = $conn->query($sql);

if ($result) {
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     
     $rclass=$row["roomClass"];
     

     $adno=$row["adID"];
     $pdias=$row["adDisease"];
     $paID=$row["pID"];
     $addate=$row["adDate"];
     $adtime=$row["adTime"];
     $adDes=$row["adDescription"];

     
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
      
     
     $adno=$_POST["adid"];
     $pdias=$_POST["pdease"];
     $paID=$_POST["Pid"];
     $addate=$_POST["adDt"];
     $adtime=$_POST["adTm"];
     $adDes=$_POST["adDesc"];

     
    
     $sql3 = "UPDATE admission SET adDisease='$pdias',adDescription='$adDes', adDate='$addate', adTime='$adtime',pID='$paID' WHERE adID='$adno'";

     
  
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
<body background="images/Untitled-1.jpg" onload="setADID(); setPID();">
<center><label style="font-size:250%">Update admission</label></center>
<form action="" method="post" id="myForm">

	<div class="row">
		<div class="col-sm-4">
			<label>Admission number</label>
			<select  id="selectbox3" name="id" class="form-control" onclick="setADID()">
				<option><?php echo $adno; ?></option>
			      <?php
			      	include 'DBconnection.php';
			      $sql = mysqli_query($conn, "SELECT adID FROM admission");
			      while ($row = $sql->fetch_assoc()){
			      echo "<option value='" . $row['adID'] . "'>" . $row['adID'] . "</option>";
			      }
			      ?>
			 </select>
			 	<input type="hidden" name="adid" value="" id="idAD"/>


			<label>Admission date</label>
			<input id="datee" type="date" name="adDt" class="form-control" value="<?php echo $addate; ?>" />
		</div>

		<div class="col-sm-4">
			<label>Patient disease</label>
			<input type="text" name="pdease" class="form-control" value="<?php echo $pdias; ?>" />

			<label>Admission time</label>
			<input id="time" type="time" name="adTm" class="form-control" value="<?php echo $adtime; ?>" />
			

			 	 
		</div>

		<div class="col-sm-4">
			
			<label>Patient ID</label>
			<select  id="selectbox2" name="id2"  class="form-control" onclick="setPID()">
				<option><?php echo $paID; ?></option>
			      <?php
			      	include 'DBconnection.php';
			      $sql = mysqli_query($conn, "SELECT pid FROM patient");
			      while ($row = $sql->fetch_assoc()){
			      echo "<option value='" . $row['pid'] . "'>" . $row['pid'] . "</option>";
			      }
			      ?>
			 </select>
			 	<input type="hidden" name="Pid" value="" id="idP"/>


			 <label>Admission description</label>
			<textarea name="adDesc" cols="40" class="form-control"><?php echo $adDes; ?></textarea>
			 
			 <input type="submit" name="btnSearch" value="Search" class="btn btn-lg btn-primary btn-block" />
			<input type="submit" name="btnUpdate" value="Update" class="btn btn-lg btn-primary btn-block" />
			
		</div>

	</div>
	
</form>
</body>
</html>