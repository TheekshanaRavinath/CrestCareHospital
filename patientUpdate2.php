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

	if(isset($_POST["pid"])){
	$ppid = $_POST["pid"];

	$sql = "select * from patient WHERE pid='".$ppid."'";
	$result = $conn->query($sql);

if ($result) {
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		 $fname=$row["pfname"];
		$lname=$row["plname"];
		 $gen=$row["pgender"];
		 $dob=$row["pbdate"];
		 $address=$row["paddress"];
		 $pno=$row["pcontact"];
		 $pmail=$row["pemail"];


	}else{
	
		 $fname="id does not exist";
		 $lname="id does not exist";
		 $gen="id does not exist";
		 $dob="id does not exist";
		 $address="id does not exist";
		 $pno="id does not exist";
		 $pmail="id does not exist";
}

$conn-> close();
}


?>
	
		
	


	


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
<body background="img/Untitled-1.jpg" onload="startTime()">
<form action="patientUpdate2.php?" method="post" name="myForm" >
	<center><label id="mainLabel" style="font-size:250%">Update patient details</label></center>
<div class="row">
  <div class="col-sm-4">

  <label id="pidL">Patient ID:</label>
  <input id="petID" name="pid" type="text" class="form-control"  " />
  <label>Gender:</label>
  <input id="gen" name="gender" type="radio" value="Male" />Male
  <input id="gen" name="gender" type="radio" value="Female" />Female
  <input id="gen" name="gender" type="radio" value="Other" />Other<br />
  <label>Phone number</label>
  <input id="contact" name="Ppnumber" type="text" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" />
  

  </div>
  <div class="col-sm-4">

  	<label>Your fist name</label>
  <input id="fname" name="pFname" type="text" class="form-control" value="<?php echo $fname;  ?>" />
  <label>Date of Birth</label>
  <input id="dob" name="bdate" type="date" class="form-control" />
  <label>Email Address</label>
  <input id="mail" name="Peaddr" type="text" class="form-control" />
  <input id="xtime" name="xtime" type="hidden"  />
  <input id="xdate" name="xdate" type="hidden"   />
  <input name="btnReg" type="submit" value="Search" class="btn btn-lg btn-primary btn-block" />

  </div>
  <div class="col-sm-4">

  	<label>Your last name</label>
  <input id="lname" name="pLname" type="text" class="form-control" value="<?php echo $lname;  ?>" />
  <label>Address</label><br/><textarea id="addr" name="pAddr" cols="40" class="form-control" ></textarea>
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