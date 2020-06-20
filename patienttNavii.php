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
      
      <li><a href="patientDe.php" target="thisFrame">Add new Patient</a></li>
      <li><a href="patientUpdate.php" target="thisFrame">Update patient detail</a></li>
      <li><a href="patientViewAll.php" target="thisFrame">Search patiet detail</a></li>
      <li><a href="patientDeleteDe.php" target="thisFrame">Delete patient</a></li>
    </ul>
  </div>

</nav>
  

  <iframe id="myFrame" style="height: 600px; width: 1330px"  name="thisFrame" ></iframe>


    

</body>
</html>