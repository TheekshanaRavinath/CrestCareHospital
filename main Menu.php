<html class="no-js" lang="en">
<head>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="mainCSS.css">
  <link rel="stylesheet" type="text/css" href="css/w3.css">

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,5.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}

function iframeDis(){
	document.getElementById('ifm').style.display="block";

}
</script>

</head>
 <style type="text/css">
 	
 	#mainL{
    display: inline-block;
    max-width: 100%;
    margin-bottom: -1px;
    font-weight: 700;
    margin-left: 26%;
    font-size: 226%;
    color: #818181;
}
#main{
  padding: 0px;
      transition: margin-left 1.4s;
}
body {
    
    background-color: #fff;
}
 </style>





<body  >


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  <a href="wardNavii.php" target="iframe_a" id="ww">Ward</a>
  <a href="roomNavii.php" target="iframe_a" id="rr">Room</a>
  <a href="MReportDE.php" target="iframe_a" id="rr">Medical report</a>




  
  
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Open</span>
  <label id="mainL">Crestcare Hospital</label>
  <input type="hidden" id="staff_position" name="pos" value="<?php echo($position); ?>">
  <iframe id="ifm" height="100%" width="100%"  name="iframe_a" style="width:1366px;height:553px;background-image:url(images/back2.jpg)">
</div>


</iframe>




</body>



</html>