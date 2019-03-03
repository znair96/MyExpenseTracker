<?php
   include 'connection.php';
   session_start();
   //$_SESSION['ID']=$_GET['id'];
   $res=insertExpense($_POST,$_GET['id']);
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
        <form action="AddExpense.php?id=<?php echo $_GET['id'] ?>" method="post"><!-- Add action and method attribute -->
        <div class="form-group row">
          <label for="name" class="col-2 col-form-label">Expense Name</label> 
            <div class="col-6">
              <input id="name" name="name" placeholder="Expense Name" class="form-control here" required="required" type="text">
            </div>
        </div>
       
          <div class="form-group row">
            <label for="select" class="col-2 col-form-label">Expense Type</label> 
              <div class="col-6">
                <select id="select" name="select" class="custom-select">  
                  <option value="No type">Select--</option>                
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
              <input id="name" name="cost" placeholder="Add Expense Cost" class="form-control here" required="required" type="number">
            </div>
        </div>
        <div class="form-group row">
          <label for="date" class="col-2 col-form-label">Expense Date</label> 
            <div class="col-6">
              <input id="date" name="date" placeholder="Select Your Expense date" class="form-control here" required="required" type="date">
            </div>
        </div>
        <!-- Display the result whether added or not here starts -->
        <div>
           <?php
           if(isset($_POST['submit']))
           {
             if($res)
             {
               echo "Expense added successfully.To add more <span><a href='AddExpense.php?id=".$_GET['id']."'>Click here</a></span>";
             }
             else
             {
               echo "Not Added";
             }
           }
           ?>
        </div>
        <!-- Display the result whether added or not here ends   -->
        <div class="form-group row">
          <div class="offset-2 col-8">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            <button name="reset" type="reset" class="btn btn-primary">Reset</button>
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
