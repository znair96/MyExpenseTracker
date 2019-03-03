<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ExpenseTracker - Update Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-12">
		                    <h4>Edit Profile</h4>
		                    <hr>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-12">
		                    <form>
                              <div class="form-group row">
                                <label for="username" class="col-4 col-form-label">User Name*</label> 
                                <div class="col-8">
                                  <input id="username" name="username" placeholder="Username" class="form-control here" required="required" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Name</label> 
                                <div class="col-8">
                                  <input id="name" name="name" placeholder="Name" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="occup" class="col-4 col-form-label">Occupation</label> 
                                <div class="col-8">
                                  <input id="occup" name="occup" placeholder="Occupation" class="form-control here" type="text">
                                </div>
                              </div>
                               
                              <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Email*</label> 
                                <div class="col-8">
                                  <input id="email" name="email" placeholder="Email" class="form-control here" required="required" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="contact" class="col-4 col-form-label">Contact</label> 
                                <div class="col-8">
                                  <input id="contact" name="contact" placeholder="contact" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="bio" class="col-4 col-form-label">Bio</label> 
                                <div class="col-8">
                                  <textarea id="bio" name="bio" cols="40" rows="4" class="form-control"></textarea>
                                </div>
                              </div>
                               
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button name="submit" type="submit" class="btn btn-primary" href="Home.php">Save</button>
                                  <button name="cancel" type="cancel" class="btn btn-primary" href="Edit.php">Reset</button>
                                </div>
                              </div>
                            </form>
		                </div>
		            </div>
		            
		        </div>
		    </div>
		</div>
	</div>
</div>
</body>
</html>