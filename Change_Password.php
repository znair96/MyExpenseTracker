<?php
include 'connection.php';
 session_start();
 /*
  Input the old password
  Input the new password 
  Input the confirm new password
  Steps to change the password - 
  1. Input all the input boxes (passwords)
  2. The new password and confirm new password should be same
  3. After submitting -
    1. Password does not exist pls enter the correct password
    2. Password Changed successfully Click Here to go to main page
  */
  $id=$_GET['id'];
  $pass= isset($_POST['oldPassword']) ? $_POST['oldPassword'] : NULL;
 
  $oldPass = getPassword($id);
  $newPass =  isset($_POST['newPassword']) ? $_POST['newPassword'] : NULL;
  //$conPass = $_POST['cPassword'];
  $a="";
  if(isset($_POST['confirm']))
  {
      if($oldPass == $pass)
      {
          $updateStatus=setPassword($newPass, $id);
          if($updateStatus)
          {
              $a="Password Changed successfully"."<a href='Home.php?id={$id}'>Click Here</a> to go to main page";            
          }
      }
      else 
      {
          $a="Password does not exist please enter the correct password";
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

    <title>ExpenseTracker - Change Password</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles-->
    <link href="css/ExpenseTracker.css" rel="stylesheet">
    <script type="text/javascript">
    var check = function() {
	  if (document.getElementById('NPassword').value == document.getElementById('confirmPassword').value) {
	    document.getElementById('message').style.color = 'green';
	    document.getElementById('message').innerHTML = 'Passwords matched';
	  } else {
	    document.getElementById('message').style.color = 'red';
	    document.getElementById('message').innerHTML = 'Passwords not matched';
	  }
    }
</script>
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

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Change Password
         <button name="Close" type="Close" class="btn1 btn1-primary" onclick="window.location.href='Home.php?id=<?php echo $_GET['id'] ?>'">X</button>
        </div>
        <div class="card-body">
          <form action="#" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="Password" name="oldPassword" id="pass" class="form-control" placeholder="Enter Your Old Password" required="required">
                <label for="pass">Enter Your Old Password</label>
              </div>
            </div>
            <div class="form-group">
                  <div class="form-label-group">
                    <input type="password" name="newPassword" id="NPassword" class="form-control" onkeyup="check()" placeholder="Enter Your New Password" pattern=".{9,}" title="Password should be more than 9 characters" required="required">
                    <label for="NPassword">Enter Your New Password</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="password" name="cPassword" id="confirmPassword" class="form-control" onkeyup="check()" placeholder="Confirm Your New password" pattern=".{9,}" title="Password should be more than 9 characters" required="required">
                    <label for="confirmPassword">Confirm Your password</label>
                  </div>
                  <span id='message'></span>
                  <span><?php echo $a ?></span>
                </div>
                <button type="submit" name="confirm" class="btn btn-primary btn-block">Submit</button>
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