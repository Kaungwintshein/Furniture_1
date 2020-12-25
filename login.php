<?php
session_start();
include('php/config/db.connect.php');

include "php/config/create-db.php";
$db = new CreateDb("reeco","product","category","orders","auth","order_product","localhost","root","123456"); 

if(isset($_POST['btnsignin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hpass = md5($password);
    $query = "select * from auth";
    $go_query = mysqli_query($conn,$query);
    while($out = mysqli_fetch_array($go_query)){
        $dbname = $out['username'];
        $dbpass = $out['password'];
        $dbrole = $out['role'];
        $dbid = $out['id'];
        if($dbname==$username&$dbpass==$hpass&$dbrole=='admin'){
            $_SESSION['role']='admin';
            $_SESSION['auth']=true;
            $_SESSION['username'] = $username;
            header('location: /admin/index.php');
        }
        else if($dbname==$username&$dbpass==$hpass){
            $_SESSION['username']=$username;
            $_SESSION['role']= 'user';
            $_SESSION['auth']=true;
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $dbid;
            header('location: /index.php');
        }
        else{
            echo "<script>window.alert('Sorry! This user does not exist')</script>";
            echo "<script>window.location.href='/login.php'</script>";
        }
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>

<!-------------------------------------- style ----------------------->
<style>
    body{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background: #ECF0F1;
}
.box{
  width: 300px;
  padding: 40px;
  position: absolute;
  top: 50%;
  left: 50%;
  border-radius: 20px;
  transform: translate(-50%,-50%);
  background: #191919;
  text-align: center;
}
.box h1{
  color: white;
  text-transform: uppercase;
  font-weight: 500px;
}
.box input[type = "text"],.box input[type = "password"]{
  border: 0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid #3498db;
  padding: 14px 10px;
  width: 200px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
}
.box input[type = "text"]:focus,.box input[type = "password"]:focus{
  width: 280px;
  border-color: purple ;
}
.box input[type = "submit"]{
  border: 0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid green;
  padding: 14px 40px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  cursor: pointer;
}
.box input[type = "submit"]:hover{
  background: green;
}

</style>

</head>
<body>
    
    <!---------------------------------- form ------------------------->
    <form class="box" action="" method="post">
        <h1>Login</h1>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="btnsignin" value="Sign in">
    </form>

</body>
</html>