<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>

  <script type="text/javascript"> //get staff member ID from selectbox and set to hidden field
  function setSMID(){
    var t1 = document.getElementById('selectbox').value;
    document.getElementById('idP').value = t1;
  }
</script>

<script type="text/javascript"> //get staff member schedule ID from selectbox and set to hidden field
  function setDID(){
    var t1 = document.getElementById('selectbox2').value;
    document.getElementById('idDate').value = t1;
  }
</script>

<script type="text/javascript">
	<?php
	 include 'DBconnection.php';		//database connection

     $sfTime="";		//pre defined variables for search staff member
     $stTime="";
     $sAssto="";
     $smemid="";

     $sdate="";
     



  if(isset($_POST["btnSearch"])){ //check the pressed button name is btnSearch
  $sdate = $_POST["Did"];		//get the id from text field which want to search

  $sql = "select * from staff_schedule WHERE scdate='".$sdate."'"; //execute the select query 
  $result = $conn->query($sql); 

if ($result) {
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     
     $sfTime=$row["fromTime"];	//define the database values to variable
     $stTime=$row["toTime"];
     $sAssto=$row["assignTo"];
     $smemid=$row["smID"];

     $sdate=$row["scdate"];

     
  }else{
  
     
     
}
 
$conn-> close();
}


?>
</script>
<script type="text/javascript">
	<?php
		if (isset($_POST['btnUpdate'])) {  //check the pressed button name is btnUpdate
      

     $sfTime=$_POST["scfTime"];		//define values to variables from text fields
     $stTime=$_POST["sctTime"];
     $sAssto=$_POST["assignTO"];
     $smemid=$_POST["rid"];

     $sdate=$_POST["Did"];

     

     
    		//execute the update query
     $sql3 = "UPDATE staff_schedule SET fromTime='$sfTime', toTime='$stTime', assignTo='$sAssto',smID='$smemid' WHERE scdate='$sdate'";

     
  
   if ($conn->query($sql3) === TRUE) {
    echo "Record updated successfully";  //Message if updated
    } else {
        echo "Error updating record: " . $conn->error; //error message if not updated
    }

    
    }

     $conn->close(); //close the connection
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
<body background="images/Untitled-1.jpg" onload="setSMID(); setDID();">
<center><label style="font-size:250%">Update Staff schedule </label></center>
<form action="" method="post" id="myForm">

	<div class="row">
		<div class="col-sm-4">
							<label>Schedule date</label>
							<select  id="selectbox2" name="id2"  class="form-control" onclick="setDID()">
								<option><?php echo $sdate; ?></option>
							      <?php
							      	include 'DBconnection.php';
							      $sql = mysqli_query($conn, "SELECT scdate FROM staff_schedule");
							      while ($row = $sql->fetch_assoc()){
							      echo "<option value='" . $row['scdate'] . "'>" . $row['scdate'] . "</option>";
							      }
							      ?>
				  		    </select>
						 	 	<input type="hidden" name="Did" id="idDate"/>


			<label>Schedule assigned to</label>
			<select id="setState" name="assignTO" class="form-control">
				<option><?php echo $sAssto; ?></option>
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
			<input type="time" name="scfTime" value="<?php echo $sfTime; ?>" class="form-control" />
			<label>Staff member ID</label>
			<select  id="selectbox" name="id"  class="form-control" onclick="setSMID()">
				<option><?php echo $smemid; ?></option>
			      <?php
			      	include 'DBconnection.php';
			      $sql = mysqli_query($conn, "SELECT smID FROM staff");
			      while ($row = $sql->fetch_assoc()){
			      echo "<option value='" . $row['smID'] . "'>" . $row['smID'] . "</option>";
			      }
			      ?>
  		    </select>
		 	 	<input type="hidden" name="rid" id="idP"/>
		</div>

		<div class="col-sm-4">
			<label>Schedule time to</label>
			<input type="time" name="sctTime" value="<?php echo $stTime; ?>" class="form-control" />
			
			<input type="submit" name="btnSearch" value="Search" class="btn btn-lg btn-primary btn-block" />
			<input type="submit" name="btnUpdate" value="Update" class="btn btn-lg btn-primary btn-block" />
		</div>

	</div>
</form>
</body>
</html>