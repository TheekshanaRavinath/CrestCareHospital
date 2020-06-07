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
  function setWardID(){
    var t1 = document.getElementById('selectboxw').value;
    document.getElementById('idWard').value = t1;
  }
</script>

<script type="text/javascript">
	<?php
	 include 'DBconnection.php';

     $rclass="";
     $rAvailability="";
     $rDescription="";
     $wardNu="";

     $roomid="";
     



  if(isset($_POST["btnSearch"])){
  $roomid = $_POST["rNo"];

  $sql = "select * from room WHERE roomID='".$roomid."'";
  $result = $conn->query($sql);

if ($result) {
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     
     $rclass=$row["roomClass"];
     $rAvailability=$row["roomAvailability"];
     $rDescription=$row["roomDescription"];
     $wardNu=$row["wardID"];

     $roomid=$row["roomID"];

     
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
      
     $rclass=$_POST["rClz"];
     $rAvailability=$_POST["rAvail"];
     $rDescription=$_POST["rDes"];
     $wardNu=$_POST["wid"];

     $roomid=$_POST["rNo"];

     

     
    
     $sql3 = "UPDATE room SET roomClass='$rclass',roomDescription='$rDescription', roomAvailability='$rAvailability', wardID='$wardNu' WHERE roomID='$roomid'";

     
  
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
<body background="images/Untitled-1.jpg" onload="setWardID(); setDID();">
<center><label style="font-size:250%">Update room details</label></center>
<form action="" method="post" id="myForm" >

	<div class="row">
		<div class="col-sm-4">
			<label>Room number</label>
			
			<select  id="selectbox2" name="id2"  class="form-control" onclick="setDID()">
				<option><?php echo $roomid; ?></option>
                
                    <?php
                      include 'DBconnection.php';
                    $sql = mysqli_query($conn, "SELECT roomID FROM room");
                    while ($row = $sql->fetch_assoc()){
                    echo "<option value='" . $row['roomID'] . "'>" . $row['roomID'] . "</option>";
                    }
                    ?>
                  </select>
                <input type="hidden" name="rNo" id="idDate"/>

			<label>Ward description</label>
			<textarea name="rDes" cols="40" class="form-control"><?php echo $rDescription; ?></textarea>
		</div>

		<div class="col-sm-4">
			<label>Room class</label>
			<select id="selectClz" name="rClz" class="form-control">
				<option><?php echo $rclass; ?></option>
				<option>A</option>
				<option>B</option>
				<option>C</option>
			</select>
			
			<label>Ward number</label>
			<select id="selectboxw" name="wwid"  class="form-control" onclick="setWardID()" >
				<option><?php echo $wardNu; ?></option>
				      <?php
				      	include 'DBconnection.php';
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
				<option><?php echo $rAvailability; ?></option>
				<option>Available</option>
				<option>Not available</option>
			</select>
			<input type="submit" name="btnSearch" value="Search" class="btn btn-lg btn-primary btn-block" />
			<input type="submit" name="btnUpdate" value="Update" class="btn btn-lg btn-primary btn-block" />
		</div>

	</div>
</form>
</body>
</html>