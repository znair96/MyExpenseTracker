
<html>
 <head>
  <title></title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


</head>
<body>


<div class="container">
  <!-- Trigger the modal with a button -->
<!--   <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

  <!-- Modal -->
  <div class="modal show" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <a href="displayExpense.php?id=<?php echo $_GET['id']?>"><button type="button" class="close" data-dismiss="modal">&times;</button></a>
          <h4 class="modal-title">Delete the Expense</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure to delete?</p>
        </div>
        <div class="modal-footer">
          <a href="DeleteExpense.php?xid=<?php echo $_GET['xid']?>&id=<?php echo $_GET['id'] ?>"><button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button></a>
          <a href="displayExpense.php?id=<?php echo $_GET['id']?>"><button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button></a>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
  
</body>
</html>