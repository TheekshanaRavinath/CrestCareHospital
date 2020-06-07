 <!doctype html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>database connections</title>
      <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
    </head>
    <style type="text/css">
      th {
    display: table-cell;
    vertical-align: inherit;
    font-weight: bold;
    text-align: center;
    font-color: white;
    background-color: #e2e2e2;
}
    #myFrame{
      margin-left: 1%;
    }
    .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: 2px solid #a9a9a9;
    }
    </style>
    <body>
      <?php
      include 'DBconnection.php';

      //execute the SQL query and return records
      
      $result = $conn->query("SELECT * FROM staff ");
      ?>
      
      <table class="table table-bordered" >
      <thead class="thead-inverse">
        <tr>
          <th>Member ID</th>          
          <th>First name</th>
          <th>Last name</th>
          <th>Date of birth</th>
          <th>Gender</th>                   
          <th>Address</th>
          <th>Email Address</th>
          <th>Position</th>
          <th>Time</th>
          <th>Date</th>
          

        </tr>
      </thead>
      <tbody>
        <?php
          while( $row = mysqli_fetch_assoc( $result ) ){
            echo
            "<tr>
              <td>{$row['smID']}</td>              
              <td>{$row['fname']}</td>
              <td>{$row['lname']}</td>
              <td>{$row['smDOB']}</td>
              <td>{$row['smGender']}</td> 
              <td>{$row['smAddress']}</td>
              <td>{$row['smEmail']}</td>
              <td>{$row['smPosition']}</td>
              <td>{$row['smDate']}</td>
              <td>{$row['smTime']}</td>
              
            </tr>";
          }
        ?>
      </tbody>
    </table>
     <?php mysqli_close($conn); ?>
    </body>
    </html>