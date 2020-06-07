<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
</head>
<style type="text/css">
	#myFrame{
		border: aliceblue;
	}
</style>
<body background="images/Untitled-1.jpg">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="main Menu.php" target="main Menu.php">Home</a>
    </div>
    <ul class="nav navbar-nav">
      
  

        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Add new member<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="staffDe.php" target="thisFrame">Front Office</a></li>
          <li><a href="doctorDe.php" target="thisFrame">Doctor</a></li>
          <li><a href="nurseDe.php" target="thisFrame">Nurse</a></li>
        </ul>
      </li>

      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Update member<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="updateFOmemberDe.php" target="thisFrame">Front Office</a></li>
          <li><a href="updateDoctorDe.php" target="thisFrame">Doctor</a></li>
          <li><a href="updateNurseDe.php" target="thisFrame">Nurse</a></li>
        </ul>
      </li>

      
      <li><a href="staffViewAll.php" target="thisFrame">Search member detail</a></li>
      <li><a href="staffDeleteDe.php" target="thisFrame">Delete member</a></li>
    </ul>
  </div>

</nav>
  

  <iframe id="myFrame" style="height: 600px; width: 1330px"  name="thisFrame" ></iframe>


    

</body>
</html>