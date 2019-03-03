<?php
   $xid = $_GET['xid'];
   $host = "localhost";
   $user = "root";
   $password = "";
   $database = "expensetracker";
   $con = mysqli_connect($host, $user, $password, $database);
   $sql = "delete from expense where ExpID = ".$xid;
   $result = mysqli_query($con,$sql);
   //$rows = mysqli_num_rows($result);
   if($result)
   {
      header('location:displayExpense.php?id='.$_GET['id']);
   }


?>
