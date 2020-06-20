<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>

<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    document.getElementById('xtime').value =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

</script>

<script type="text/javascript">
	function validation(){
	var x1 = document.getElementById('fname').value;
	var x2 = document.getElementById('lname').value;
	
	var x4 = document.getElementById('dob').value;
	var x5 = document.getElementById('addr').value;
	var x6 = document.getElementById('contact').value;
	
	var mai = document.forms["myForm"]["mail"].value;
    var atpos = mai.indexOf("@");
    var dotpos = mai.lastIndexOf(".");

	if (x1=="") {
		alert("First name must be filled");
		return false;
	}else if(x2==""){
		alert("Last name must be filled");
		return false;
	}
	var gender = document.getElementsByName('gen');
        var genValue = false;

        for(var i=0; i<gen.length;i++){
            if(gen[i].checked == true){
                genValue = true;    
            }
        }
        if(!genValue){
            alert("Please Choose the gender");
            return false;
        }else if(x4==""){
		alert("Birth date must be filled");
		return false;
		}else if(x5==""){
		alert("Address must be filled");
		return false;
		}else if(x6==""){
		alert("Contact number must be filled");
		return false;
		}else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=mai.length) {
        alert("Not a valid e-mail address");
        return false;
    }
	
    return true;
}
</script>

<?php 

	include 'DBconnection.php';

		 $fname="";
		 $lname="";
		 $gen="";
		 $dob="";
		 $address="";
		 $pno="";
		 $pmail="";
		 $ppid="";
     $roomNo="";
     $pid="";
     $pAge="";
     $state="";

	if(isset($_POST["btnSearch"])){
	$ppid = $_POST["Pid"];

	$sql = "select * from patient WHERE pid='".$ppid."'";
	$result = $conn->query($sql);

  

if ($result) {
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $pid = $row["pid"];
    $roomNo=$row["roomid"];
		 $fname=$row["pfname"];
		$lname=$row["plname"];
		 $gen=$row["pgender"];
		 $dob=$row["pbdate"];
     $pAge=$row["page"];
		 $address=$row["paddress"];
		 $pmail=$row["pmail"];
     $state=$row["pstatus"];     

		
	}else{
	
		 $fname="id does not exist";
		 $lname="id does not exist";
		 $gen="id does not exist";
		 $dob="id does not exist";
		 $address="id does not exist";
		 $pno="id does not exist";
		 $pmail="id does not exist";
}

$sql1 = "select pcontact from patient_contact WHERE pid='".$ppid."'";
  $result1 = $conn->query($sql1);

if ($result1) {
$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
     
     $pno=$row1["pcontact"];
     
   
  }else{
    
     $pno="id does not exist";
     
}

$conn-> close();
}


if(isset($_POST["btnUpdate"])){
     
     $ppid = $_POST["Pid"];
     $roomNum = $_POST["rid"];
     $fname=$_POST["pFname"];
     $lname=$_POST["pLname"];
     $gen=$_POST["gender"];
     $dob=$_POST["bdate"];
     $address=$_POST["pAddr"];
     $pmail=$_POST["Peaddr"];
     
     $cNumber=$_POST["Ppnumber"];
     $pAge=$_POST["page"];
     $state=$_POST["status"];

     

     

     $sql = "UPDATE patient SET roomid='$roomNum', pfname='$fname', plname='$lname', pgender='$gen',pbdate='$dob', page='$pAge', paddress='$address', pmail='$pmail', pstatus='$state' WHERE pid='$ppid'";

     $sql2 = "UPDATE patient_contact SET pcontact='$cNumber' WHERE pid='$ppid'";
    
     

     if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    if ($conn->query($sql2) === TRUE) {
    echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
  
  $conn-> close();
  }

?>
	
		
<?php
  include 'DBconnection.php';
  
 
  $result1 = $conn->query("SELECT roomID FROM room ");
  

    $row1 = mysqli_fetch_array($result1,MYSQLI_NUM);
                  
                 
  ?>	


	
<script type="text/javascript">
  function setRoomID(){
    var t1 = document.getElementById('selectbox').value;
    document.getElementById('idRoom').value = t1;
  }
</script>


<script type="text/javascript">
  function setPID(){
    var t1 = document.getElementById('selectbox2').value;
    document.getElementById('idP').value = t1;
  }
</script>

<script type="text/javascript">
  function bdateCal(){

    var xdob = document.getElementById('dob').value;
var year=Number(xdob.substr(0,4));
var month=Number(xdob.substr(4,2))-1;
var day=Number(xdob.substr(6,2));
var today=new Date();
var age=today.getFullYear()-year;
if(today.getMonth()<month || (today.getMonth()==month && today.getDate()<day)){age--;}
document.getElementById('age').value = age;
  }
</script>


</head>
<style type="text/css">
	.row {
    margin-right: 5px;
    margin-left: 5px;
}
input[type=radio] {
    margin: 6px 7px 40px;
    margin-top: 1px\9;
    line-height: normal;
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
<body background="images/Untitled-1.jpg" onload="startTime(); setPID();">
<form action="" method="post" name="myForm" >
	<center><label id="mainLabel" style="font-size:250%">Update patient details</label></center>
<div class="row">
  <div class="col-sm-4">

  <label id="pidL">Patient ID:</label>
  <select  id="selectbox2" name="id2"  class="form-control" onclick="setPID()">
    <option><?php echo $pid; ?></option>
      <?php

      $sql = mysqli_query($conn, "SELECT pID FROM patient");
      while ($row = $sql->fetch_assoc()){
      echo "<option value='" . $row['pID'] . "'>" . $row['pID'] . "</option>";
      }
      ?>
  </select>
  <input type="hidden" name="Pid" id="idP" />


  <label>Gender:</label>
  
  <input id="gen" name="gender" type="radio" value="Male"  <?php echo ($gen=='Male')?'checked':'' ?>/>Male
  <input id="gen" name="gender" type="radio" value="Female" <?php echo ($gen=='Female')?'checked':'' ?>/>Female
  <input id="gen" name="gender" type="radio" value="Other" <?php echo ($gen=='Other')?'checked':'' ?>/>Other<br />
  <label>Phone number</label>
  <input id="contact" name="Ppnumber" type="text" class="form-control" value="<?php echo $pno;  ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" />
  
  <label>Change to room number</label>
  <select  id="selectbox" name="id"  class="form-control" onclick="setRoomID()">
    <option><?php echo $roomNo;  ?></option>
      <?php

      $sql = mysqli_query($conn, "SELECT roomID FROM room");
      while ($row = $sql->fetch_assoc()){
      echo "<option value='" . $row['roomID'] . "'>" . $row['roomID'] . "</option>";
      }
      ?>
  </select>
  <input type="hidden" name="rid" value="" id="idRoom"/>
  

  </div>
  <div class="col-sm-4">

  	<label>Your fist name</label>
  <input id="fname" name="pFname" type="text" class="form-control" value="<?php echo $fname;  ?>" />
  <label>Date of Birth</label>
  <input id="dob" name="bdate" type="date" class="form-control" onblur="bdateCal()" value="<?php echo $dob; ?>" />
  <label>Email Address</label>
  <input id="mail" name="Peaddr" type="text" class="form-control" value="<?php echo $pmail;  ?>" />
  <input id="xtime" name="xtime" type="hidden" />
  <input id="xdate" name="xdate" type="hidden"  />
  <input name="btnSearch" type="submit" value="Search" class="btn btn-lg btn-primary btn-block" />
  <input name="btnUpdate" type="submit" value="Update" class="btn btn-lg btn-primary btn-block" />

  </div>
  <div class="col-sm-4">

  	<label>Your last name</label>
  <input id="lname" name="pLname" type="text" class="form-control" value="<?php echo $lname;  ?>" />
  <label>Age</label>
  <input id="age" name="page" type="text" class="form-control" readonly="" value="<?php echo $pAge;  ?>"   />
  <label>Address</label><br/>
  <textarea id="addr" name="pAddr" cols="40"  class="form-control" ><?php echo $address; ?></textarea>
  <input type="radio" name="status" value="Discharge" <?php echo ($state=='Discharge')?'checked':'' ?> />Discharge<br>
  <input type="radio" name="status" value="Admit" <?php echo ($state=='Admit')?'checked':'' ?> />Admit<br>
  <label id="txt" name="regTime" ></label><br/>
  <label id="eledate" name="regDate" value="empty"><p><span id="datetime"></span></p></label>

  

  <script type="text/javascript">
  	var dt = new Date();
	document.getElementById("datetime").innerHTML = dt.toLocaleDateString();

	var dt2 = new Date();
  document.getElementById("xdate").value = dt2.toLocaleDateString();
  </script>

  </div>
</div>

</form>
</body>
</html>