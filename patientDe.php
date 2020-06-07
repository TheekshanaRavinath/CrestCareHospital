<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>

<script>
function startTime() {    //to get the current time
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

<script type="text/javascript"> //validation of the form
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

<script type="text/javascript"> //calculate birth date from current date
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

<?php //select data for auto increment Patient ID

	include 'DBconnection.php';
	$idno = "";
 
	$result = $conn->query("SELECT max(pid) FROM patient ");
	$row = mysqli_fetch_array($result,MYSQLI_NUM);
		
?>

<?php  //select data from room table for Room ID
  include 'DBconnection.php';
  $roomNo = "";
 
  $result1 = $conn->query("SELECT roomID FROM room ");
  

    $row1 = mysqli_fetch_array($result1,MYSQLI_NUM);
                  
                 
  ?>

<script type="text/javascript">  // get room id from a select box and set to a hidden field
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
input[type=radio] {
    margin: 6px 7px 8px;
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
<body background="images/Untitled-1.jpg" onload="startTime()">
<form action="patientreg.php" method="post" name="myForm" onsubmit="return validation()">
	<center><label id="mainLabel" style="font-size:250%">Patient registration</label></center>
<div class="row">
  <div class="col-sm-4">

  <label id="pidL">Patient ID:</label>
  <input id="petID" name="pid" type="text" class="form-control" readonly="" value="<?php echo $row[0]+1; ?>" />
  <label>Gender:</label>
  <input id="gen" name="gender" type="radio" value="Male" />Male
  <input id="gen" name="gender" type="radio" value="Female" />Female
  <input id="gen" name="gender" type="radio" value="Other" />Other<br />
  <label>Contact number</label><br>
  <input id="contact" name="Ppnumber" type="text" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" />
  

  

  </div>
  <div class="col-sm-4">

  	<label>Your fist name</label>
  <input id="fname" name="pFname" type="text" class="form-control" />
  <label>Date of Birth</label>
  <input id="dob" name="bdate" type="date" class="form-control" onblur="bdateCal()" />
  <label>Email Address</label>
  <input id="mail" name="Peaddr" type="text" class="form-control" />
  <input id="xtime" name="xtime" type="hidden"  />
  <input id="xdate" name="xdate" type="hidden"   />
  <label>Room number</label>
  

  <select  id="selectbox" name="id"  class="form-control" onclick="setRoomID()"> 
      <?php

      $sql = mysqli_query($conn, "SELECT roomID FROM room");
      while ($row = $sql->fetch_assoc()){
      echo "<option value='" . $row['roomID'] . "'>" . $row['roomID'] . "</option>";
      }
      ?>
  </select>

  </div>
  <div class="col-sm-4">

  	<label>Your last name</label>
  <input id="lname" name="pLname" type="text" class="form-control" />
  <label>Age</label>
  <input id="age" name="page" type="text" class="form-control" readonly="" />
  <label>Address</label><br/><textarea id="addr" name="pAddr" cols="40" class="form-control" ></textarea>
  

  <div class="col-sm-6">
    <label id="txt" name="regTime" ></label><br/>
  <label id="eledate" name="regDate" value="empty"><p><span id="datetime"></span></p></label>
  </div>
  <div class="col-sm-6">
  <div class="col-sm-2">
    <label>Status</label>
  </div>

  <div class="col-sm-10">
    <input id="status" name="stat" type="radio" value="Discharge" />Discharge
  <input id="status" name="stat" type="radio" value="Admit" />Admit
  </div>
  
  <input type="hidden" name="rid" value="" id="idRoom"/>
  
  </div>

  <input name="btnReg" type="submit" value="Register" class="btn btn-lg btn-primary btn-block" />
  
  <script type="text/javascript">
  	var dt = new Date(); //to get the current date
	document.getElementById("datetime").innerHTML = dt.toLocaleDateString();

	var dt2 = new Date();
  document.getElementById("xdate").value = dt2.toLocaleDateString();
  </script>

  </div>
</div>

</form>
</body>
</html>