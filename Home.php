<?php
session_start();
include 'connection.php';
$username = isset($_POST['Uname']) ? $_POST['Uname'] : "";
$password = isset($_POST['pass']) ? $_POST['pass'] : "";
$result = validation($_POST);//validates the user
//$error = "<p class='text-danger'>Username and password Error</p>";
 //generates id of the user
//$id1 = $_GET["id"];
//$_SESSION['val'] = $result; //checks for error
 //assigns the value in flag variable
// $_SESSION['Name'] = getNameById($_GET['id']);
 //update logged status of a user in database
//echo $res;
//echo $id." ".$_SESSION['name'];
if (isset($_POST['login'])) {
    $id = getId($username);
    $_SESSION['ID']=$id;
    $_GET["flag"] = $_SESSION['val'];
    $_SESSION['name'] = getNameById($id);
    $res = updateLoggedStatusBy1($id);
    if (!($result)) 
    {
      redirect("index.php?flag=".$_GET["flag"]); 
    }
    else
    {
      redirect("Home.php?id=".$id);
      
    }
}
// if($_POST["remember_me"]=='1' || $_POST["remember_me"]=='on')
// {
//     $hour = time() + 3600 * 24 * 30;
//     setcookie('username', $username, $hour);
//     setcookie('password', $password, $hour);
// }
//$oid = $_GET['id'];
// if($_SESSION['ID']!=$_GET['id'])
// {
//     redirect("Error.php?id=".$id);
// }
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

  <body id="page-top">

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

      <!-- Navbar -->
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
  
        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © ExpenseTracker</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

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

<?php 
  } else{
      header('location:index.php');
  }
?>
  </body>

</html>
