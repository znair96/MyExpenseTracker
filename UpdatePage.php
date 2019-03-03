<?php
session_start();
$id=$_GET['xid'];
$host = "localhost";
$user = "root";
$password = "";
$database = "expensetracker";
$con = mysqli_connect($host, $user, $password, $database);
$sqlUpdate = "update expense set ExpName='{$_POST['name']}',ExpType='{$_POST['select']}',Cost={$_POST['cost']},Date='{$_POST['date']}' where ExpID=".$id;
$result = mysqli_query($con, $sqlUpdate);
print_r($_POST);
//After submitting the modified data this code should run
if($result)
{
   header('location:displayExpense.php?id='.$_GET['id']);
}
?>