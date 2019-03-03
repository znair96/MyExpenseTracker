<?php
    $arr = array();

    function redirect($url)
     {
         header('location: '.$url);
         die();
    }
    function insert($arr)
    {
        $arr['Name'] = isset($_POST['Name']) ? $_POST['Name'] : NULL;
        $arr['Uname'] = isset($_POST['Uname']) ? $_POST['Uname'] : NULL;
        $arr['pass'] = isset($_POST['pass']) ? $_POST['pass'] : NULL;
        $arr['gender'] = isset($_POST['gender']) ? $_POST['gender'] : NULL;
        $arr['email'] = isset($_POST['email']) ? $_POST['email'] : NULL;
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "expensetracker";
        $con = mysqli_connect($host, $user, $password, $database);
        $sql = "insert into users(`name`, `username`, `email`, `password`, `gender`) values('{$arr['Name']}','{$arr['Uname']}','{$arr['email']}','{$arr['pass']}','{$arr['gender']}')";
        $result = mysqli_query($con,$sql);
        return $result;
    }

    function validation($arr)
    {
        $arr['Uname'] =  isset($_POST['Uname']) ? $_POST['Uname'] : "";
        $arr['pass'] =  isset($_POST['pass']) ? $_POST['pass'] : NULL;
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "expensetracker";
        $con = mysqli_connect($host, $user, $password, $database);
        $sql = "select username,password from users where username='{$arr['Uname']}' and password='{$arr['pass']}'";
        $res = mysqli_query($con, $sql);
        $rows = mysqli_num_rows($res);
        return $rows;
    }
    /*function getIdByName($name)
    {
      $host = "localhost";
      $user = "root";
      $password = "";
      $database = "expensetracker";
      $con = mysqli_connect($host, $user, $password, $database);
      $sql = "select user_id from users where name = '$name'";
      $result = mysqli_query($con,$sql);
      $data = mysqli_fetch_assoc($result);
      return data["user_id"];
    }*/
    function getName($name)
    {
      $host = "localhost";
      $user = "root";
      $password = "";
      $database = "expensetracker";
      $con = mysqli_connect($host, $user, $password, $database);
      $sql = "select name from users where username = '$name'";
      $res = mysqli_query($con,$sql);
      $data = mysqli_fetch_assoc($res);
      return $data["name"];
    }
    function getId($uname)
    {
      $host = "localhost";
      $user = "root";
      $password = "";
      $database = "expensetracker";
      $con = mysqli_connect($host, $user, $password, $database);
      $sql = "select user_id from users where username = '$uname'";
      $res = mysqli_query($con,$sql);
      $data = mysqli_fetch_assoc($res);
      return $data["user_id"];
    }
    function getNameById($id)
    {
      $host = "localhost";
      $user = "root";
      $password = "";
      $database = "expensetracker";
      $con = mysqli_connect($host, $user, $password, $database);
      $sql = "select name from users where user_id = '$id'";
      $res = mysqli_query($con,$sql);
      $data = mysqli_fetch_assoc($res);
      return $data["name"];
    }
    function updateLoggedStatusBy1($id)
    {
      $host = "localhost";
      $user = "root";
      $password = "";
      $database = "expensetracker";
      $con = mysqli_connect($host, $user, $password, $database);
      $sql = "update users set LoggedInStatus = 1 where user_id = '$id'";
      $res = mysqli_query($con,$sql);
      return $res;
    }
    function updateLoggedStatusBy0($id)
    {
      $host = "localhost";
      $user = "root";
      $password = "";
      $database = "expensetracker";
      $con = mysqli_connect($host, $user, $password, $database);
      $sql = "update users set LoggedInStatus = 0 where user_id = '$id'";
      $res = mysqli_query($con,$sql);
      return $res;
    }
    function userPasswordError($username,$password)
    {
      $host = "localhost";
      $user = "root";
      $password = "";
      $database = "expensetracker";
      $con = mysqli_connect($host, $user, $password, $database);
      $sql = "select username,password from users where username='$username' and password='$password'";
      $res = mysqli_query($con, $sql);
      $rows = mysqli_num_rows($res);
      return $rows;
    }
    function dispError($error)
    {
       return $error;
    } 
    function insertExpense($arr,$id)
    {
        $arr['name'] = isset($_POST['name']) ? $_POST['name'] : NULL;
        $arr['select'] = isset($_POST['select']) ? $_POST['select'] : NULL;
        $arr['cost'] = isset($_POST['cost']) ? $_POST['cost'] : NULL;
        $arr['date'] = isset($_POST['date']) ? $_POST['date'] : NULL;
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "expensetracker";
        $con = mysqli_connect($host, $user, $password, $database);
        $sql = "insert into expense(`ExpName`, `ExpType`, `Cost`, `Date`, `user_id`) values('{$arr['name']}','{$arr['select']}',{$arr['cost']},'{$arr['date']}',$id)";
        $result = mysqli_query($con,$sql);
        return $result;
    }
    function getPassword($id)
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "expensetracker";
        $con = mysqli_connect($host, $user, $password, $database);
        $sql = "select password from users where user_id=".$id;
        $result=mysqli_query($con, $sql);
        $fetchPass = mysqli_fetch_assoc($result);
        return $fetchPass['password'];
    }
    function setPassword($Password,$id)
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "expensetracker";
        $con = mysqli_connect($host, $user, $password, $database);
        $sql = "update users set password = '{$Password}' where user_id=".$id;
        $result=mysqli_query($con, $sql);
        return $result;
    }
    function getLoggedInStatus($id)
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "expensetracker";
        $con = mysqli_connect($host, $user, $password, $database);
        $sql="select LoggedInStatus from users where user_id=".$id;
        $result=mysqli_query($con,$sql);
        $fetchStatus=mysqli_fetch_assoc($result);
        return $fetchStatus['LoggedInStatus'];
    } 
    function getTotalExpense($id,$month)
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "expensetracker";
        $con = mysqli_connect($host, $user, $password, $database);
        $sql="select sum(Cost) as TotalExpense from expense where user_id={$id} and month(Date)={$month}";
        $result=mysqli_query($con,$sql);
        $sum=mysqli_fetch_assoc($result);
        return $sum['TotalExpense'];
    }
?>
