<?php 
include 'connection.php';
session_start();
$id=$_GET['xid'];
$host = "localhost";
$user = "root";
$password = "";
$database = "expensetracker";
$con = mysqli_connect($host, $user, $password, $database);
$sql = "select * from expense where ExpID = ".$id;
$result = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($result);
?>
<?php
  $status=getLoggedInStatus($_GET['id']);
  if($status==1){
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ExpenseTracker</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--     <link href="bootstrap3/css/bootstrap.min.css" rel="stylesheet"> -->
    
    <!-- Custom fonts-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom style-->
    <link href="css/ExpenseTracker.css" rel="stylesheet">
    
  </head>

  <body>
    
<div>
      <!-- /.content-wrapper -->
      <h2>Expense Record</h2>
<table class="table table-bordered table-hover">
  <tbody>
    <tr>
      <th>Expense ID</th>
      <td><?php echo $data['ExpID']?></td>
    </tr>
    <tr>
      <th>Expense Name</th>
      <td><?php echo $data['ExpName'] ?></td>
    </tr>
    <tr>
      <th>Expense Type</th>
      <td><?php echo $data['ExpType'] ?></td>
    </tr>
    <tr>
      <th>Cost</th>
      <td><?php echo $data['Cost'] ?></td>
    </tr>
    <tr>
      <th>Date</th>
      <td><?php echo $data['Date'] ?></td>
    </tr>
  </tbody>
</table>
</div>
<a href="displayExpense.php?id=<?php echo $_GET['id'] ?>" class="btn btn-success">Go Back</a>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/ExpenseTracker.min.js"></script>

<?php 
  } else{
      header('location:index.php');
  }
?>
  </body>

</html>
