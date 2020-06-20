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
      
      <li><a href="MReportDe.php" target="thisFrame">Add medical report</a></li>
      <li><a href="MReportUpdateDe.php" target="thisFrame">Update medical report detail</a></li>
      <li><a href="MReportViewAll.php" target="thisFrame">Search medical report detail</a></li>
      <li><a href="MReportDeleteDe.php" target="thisFrame">Delete medical report</a></li>
    </ul>
  </div>

</nav>
  

  <iframe id="myFrame" style="height: 600px; width: 1330px"  name="thisFrame" ></iframe>


    

</body>
</html>