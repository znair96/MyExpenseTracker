<?php 
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
//After submitting the modified data this code should run
if(isset($_POST['update']))
{
  $sqlUpdate = "update expense set ExpName='{$data['ExpName']}',ExpType='{$data['ExpType']}',Cost={$data['Cost']},Date='{$data['Date']}' where id=".$_GET['xid'];
  $result2 = mysqli_query($con, $sqlUpdate);
  if($result2)
  {
     header('location:displayExpense.php?id='.$_GET['id']);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ExpenseTracker - AddExpense</title>

  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles-->
  <link href="css/ExpenseTracker.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .btn1 {
    background-color: Red; 
    border: none; 
    color: white; 
    padding: 4px 10px; 
    font-size: 16px; 
    float: right;
    cursor: pointer; 
}

.btn:hover {
    background-color: Royalblue;
}
</style>
</head>

<body class="bg-dark">

  <div class="container" align="center">
    <div class="card card-AddExpense mx-auto mt-2">
      <div class="card-header">Add Expense
      <button name="Close" type="Close" class="btn1 btn1-primary" onclick="window.location.href='Home.php?id=<?php echo $_GET['id'] ?>'">X</button><!--Add anchor tag and apply css -->
      </div>
       <div class="card-body">
        <form action="UpdatePage.php?xid=<?php echo $_GET['xid']?>&id=<?php echo $_GET['id']?>" method="post"><!-- Add action and method attribute -->
        <div class="form-group row">
          <label for="name" class="col-2 col-form-label">Expense Name</label> 
            <div class="col-6">
              <input value="<?php echo $data['ExpName'] ?>" id="name" name="name" placeholder="Expense Name" class="form-control here" required="required" type="text">
            </div>
        </div>
       
          <div class="form-group row">
            <label for="select" class="col-2 col-form-label">Expense Type</label> 
              <div class="col-6">
                <select id="select" name="select" class="custom-select" >  
                  <option value="<?php echo $data['ExpType']?>"><?php echo $data['ExpType']?></option>                
                  <option value="Education">Education</option>
                  <option value="Entertainment">Entertainment</option>
                  <option value="Housing">Housing</option>
                  <option value="Household">Household</option>
                  <option value="Health">Health</option>
                  <option value="Insurance">Insurance</option>
                  <option value="Living Cost">Living Cost</option>
                  <option value="Pets">Pets</option>
                  <option value="Personal">Personal</option>
                  <option value="Subscriptions/Donations">Subscriptions/Donations</option>
                  <option value="Savings">Savings</option>
                  <option value="Transportation">Transportation</option>
                  <option value="Utilities">Utilities</option>
                  <option value="Vacation/Travel">Vacations/Travel</option>
                  <option value="Others">Others</option>
                </select>
              </div>
          </div>
          <div class="form-group row">
          <label for="cost" class="col-2 col-form-label">Expense Cost</label> 
            <div class="col-6">
              <input value="<?php echo $data['Cost']?>" id="name" name="cost" placeholder="Add Expense Cost" class="form-control here" required="required" type="number">
            </div>
        </div>
        <div class="form-group row">
          <label for="date" class="col-2 col-form-label">Expense Date</label> 
            <div class="col-6">
              <input id="date" value="<?php echo $data['Date']?>" name="date" placeholder="Select Your Expense date" class="form-control here" required="required" type="date">
            </div>
        </div>
        <div class="form-group row">
          <div class="offset-2 col-8">
            <button name="update" type="submit" class="btn btn-primary">Update</button>
            <button name="reset" type="reset" class="btn btn-primary">Cancel</button>
          </div>
        </div>
        </form>

      </div>
    </div>
  </div>
  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
