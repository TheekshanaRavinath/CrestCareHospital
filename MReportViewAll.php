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
      
      $result = $conn->query("SELECT * FROM medical_report ");
      ?>
      
      <table class="table table-bordered" >
      <thead class="thead-inverse">
        <tr>
          <th>Report Number</th>
          <th>disease</th>
          <th>Report description</th>
          <th>Report date</th>
          <th>Report time</th>
          <th>Patient ID</th>

        </tr>
      </thead>
      <tbody>
        <?php
          while( $row = mysqli_fetch_assoc( $result ) ){
            echo
            "<tr>
              <td>{$row['mrID']}</td>
              <td>{$row['mrDisease']}</td>
              <td>{$row['mrDescription']}</td>
              <td>{$row['mrDate']}</td>
              <td>{$row['mrTime']}</td>
              <td>{$row['pID']}</td>
            </tr>";
          }
        ?>
      </tbody>
    </table>
     <?php mysqli_close($conn); ?>
    </body>
    </html>