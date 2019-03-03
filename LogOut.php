<?php
    session_start();
    include 'connection.php';
    $name = $_SESSION['name'];
    $id = $_GET["id"];
    $res = updateLoggedStatusBy0($id);
    session_destroy();
    if($res)
    {
        header("location:index.php");
    }
    /*
      LoggedInStatus = 1
      logged
      LoggedInStatus = 0
      logged out
      if(logged out)
         index.php
     */
 ?>
