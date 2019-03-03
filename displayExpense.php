<?php
   include 'connection.php';
   session_start();
   $id=$_GET['id'];
   $host = "localhost";
   $user = "root";
   $password = "";
   $database = "expensetracker";
   $con = mysqli_connect($host, $user, $password, $database);
   $sql = "select * from expense where user_id = ".$id;
   $result = mysqli_query($con,$sql);
   $rows = mysqli_num_rows($result);
   //echo $id;
   //echo $rows;
   //print_r($data);
?>
<?php
  $status=getLoggedInStatus($_GET['id']);
  if($status==1){
?>
<html>
 <head>
   <title>Display Expense</title>
   <link href="css/ExpenseTracker.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--     <link href="bootstrap3/css/bootstrap.min.css" rel="stylesheet"> -->
    
    <!-- Custom fonts-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom style-->
    <style>
    #dataTable{
       margin-left:120px;
       margin-top:30px;
       
    }
    </style>
   
    
 </head>
 <body>
 
<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="Home.php">Start</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#"><?php echo getNameById($_GET['id']) ?></a>
            <a class="dropdown-item" href="View_Profile.php?id=<?php echo $_GET['id']?>">View Profile</a>
            <a class="dropdown-item" href="Change_Password.php?id=<?php echo $_GET['id'] ?>">Change Password</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
      
        <li class="nav-item">
          <a class="nav-link" href="displayExpense.php?id=<?php echo $_GET['id'] ?>">
         <i class="fa fa-eye" style="font-size:20px"></i> 
            <span>Display Expense</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="AddExpense.php?id=<?php echo $_GET['id'] ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Add Expense</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Savings.php?id=<?php echo $_GET['id'] ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Total Savings</span>
          </a>
        </li>
      </ul> 
<div id="dataTable">
 <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Expense Name </th>
                <th>Expense Type</th>
                <th>Cost</th>
                <th>Date</th>
                <th>Operation on Expenses</th>
            </tr>
        </thead>
        <tbody>
            <?php
               for($i=1;$i<=$rows;$i++){
               $data = mysqli_fetch_array($result);
            ?>
              <tr>
              <td><?php echo $i  ?></td>
              <td><?php echo $data["ExpName"]  ?></td>
              <td><?php echo $data["ExpType"]  ?></td>
              <td><?php echo $data["Cost"]  ?></td>
              <td><?php echo $data["Date"]  ?></td>
              <td><pre><a href="View.php?xid=<?php echo $data['ExpID'] ?>&id=<?php echo $_GET['id'] ?>">View</a>  <a href="Update.php?xid=<?php echo $data['ExpID'] ?>&id=<?php echo $_GET['id']?>">Update</a>  <a href="Delete.php?id=<?php echo $_GET['id'] ?>&xid=<?php echo $data['ExpID']?>">Delete</button></a></pre></td>
              
              </tr>
            <?php
               }?> 
            
        </tbody> 
        <tfoot>
         
        </tfoot>
    </table>
</div>
  <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="LogOut.php?id=<?php echo $_GET['id'] ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/ExpenseTracker.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
 $(document).ready(function() {
    $('#example').DataTable();
} );
 </script>
<?php 
  } else{
      header('location:index.php');
  }
?>
 </body>
</html>