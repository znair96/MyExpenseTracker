<?php
  error_reporting(E_ERROR | E_PARSE);
  include 'connection.php';
  session_start();
  //$_SESSION['ID']=$_GET['id'];
  $totalAmount = isset($_POST['amount']) ? $_POST['amount'] : NULL;
  $select = isset($_POST['select']) ? $_POST['select'] : NULL;
  $totalExpense = getTotalExpense($_GET['id'], $select);
  //$savings=0;
  $result='';
   if(isset($_POST['submit']))
   {
       $saved = $totalAmount-$totalExpense;
       if($saved==$totalAmount)
       {
           $result='No expense found during this month';;
       }
       else if($saved>0)
       {
           $savings=$saved;
       }
       else
       {
           $savings=0;
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

  <title>ExpenseTracker - Total Savings</title>

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
      <div class="card-header">Savings
      <button name="Close" type="Close" class="btn1 btn1-primary" onclick="window.location.href='Home.php?id=<?php echo $_GET['id'] ?>'">X</button>
      </div>
       <div class="card-body">
        <form action="#" method="post">
        <div class="form-group row">
          <label for="cost" class="col-2 col-form-label">Total Budget</label> 
            <div class="col-6">
              <input id="cost" name="amount" placeholder="Your Budget" class="form-control here" required type="number">
            </div>
        </div>   
        <div class="form-group row">
            <label for="select" class="col-2 col-form-label">Expenditure</label> 
              <div class="col-6">
                <select id="select" name="select" class="custom-select">  
                  <option value="option">Select--</option>                
                  <option value="1">January</option>
                  <option value="2">Feburary</option>
                  <option value="3">March</option>
                  <option value="4">April</option>
                  <option value="5">May</option>
                  <option value="6">June</option>
                  <option value="7">July</option>
                  <option value="8">August</option>
                  <option value="9">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
              </div>
          </div>
          <div class="form-group row">
          <label for="cost" class="col-2 col-form-label">Total Savings</label>
         <label><?php echo isset($savings) ? "Rs. ".$savings : $result ?></label>  
         </div>
        <div class="form-group row">
          <div class="offset-2 col-8">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
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