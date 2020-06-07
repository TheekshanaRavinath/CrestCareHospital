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

    var log = document.getElementById('usern').value;
    var log1 = document.getElementById('pass').value;
    var log2 = document.getElementById('pass2').value;


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
    }else if(log==""){
      alert("Username must be filled");

      return false;
    }else if (log1 != log2) {

      alert("Password must be match");
      
      return false;
    }
	
    return true;
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
    margin: 6px 7px 39px;
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
#logDiv{
  
    margin-top: 8%;
    padding: 6%;
    border: 2px solid #337ab7;
    border-radius: 5%;

}
	
</style>
<body background="images/Untitled-1.jpg" onload="startTime(); hideLog();">
<form action="fOfficereg.php" method="post" name="myForm" onsubmit="return validation();">
	<center><label id="mainLabel" style="font-size:250%">Staff member registration</label></center>
<div class="row">
  <div class="col-sm-4">

			  <label id="pidL">Staff member ID:</label>
			  <input id="petID" name="pid" type="text" class="form-control" readonly="" value="" />
			  <label>Gender:</label>
			  <input id="gen" name="gender" type="radio" value="Male" />Male
			  <input id="gen" name="gender" type="radio" value="Female" />Female
			  <input id="gen" name="gender" type="radio" value="Other" />Other<br />
			  <label>Contact number</label><br>
			  <input id="contact" name="Ppnumber" type="text" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" />
			  
			  <label id="logLabel1">Experience</label>
			  <input id="ex" name="exper" type="text" class="form-control"  />
  
  
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
			  <div id="logDiv">
			  <label id="logLabel1">User name</label>
			  <input id="usern" name="uname" type="text" class="form-control"  />
			  <label id="logLabel2">Password</label>
			  <input id="pass" name="upass" type="password" class="form-control"  />
			  <label id="logLabel3">Re-enter Password</label>
			  <input id="pass2" name="upass2" type="password" class="form-control"  />
  
  
  
  </div>
  

  </div>
  <div class="col-sm-4">

			  	<label>Your last name</label>
			  <input id="lname" name="pLname" type="text" class="form-control" />
			  <label>Position</label>
			  <input type="text" name="position" readonly="" value="Front Office" class="form-control">
			  
			  
			  <label>Address</label><br/><textarea id="addr" name="pAddr" cols="40" class="form-control" ></textarea>
			  

			  
			  <label id="txt" name="regTime" ></label><br/>
			  <label id="eledate" name="regDate" value="empty"><p><span id="datetime"></span></p></label><br>
			  <input name="btnReg" type="submit" value="Register" class="btn btn-lg btn-primary btn-block" />
  
   
  
  

  
  
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