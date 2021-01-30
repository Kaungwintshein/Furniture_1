<?php
session_start();
include "php/config/db.connect.php";
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $error = array(
        'username'=>'',
        'password'=>'',
        'confirmpassword'=>'',
        'matchpassword'=>'',
        'email'=>'',
        'phone'=>'',
        'address'=>'',
      );
      if($username==''){
        $error['username']='Username must be enter';
      }
      else{
        if(strlen($username)<3){
          $error['username']='Username need too be longer';
        }
      }
      if($password==''){
        $error['password']='Password must be enter';
      }
      else{
        if(strlen($password)<6){
          $error['password']='Password need atleast 6 character';
        }
      }
      if($confirmpassword==''){
        $error['confirmpassword']='Confirm  password must be enter';
      }
      else{
        if($password!=$confirmpassword){
          $error['matchpassword']='Password do not match';
        }
      }
      if($email==''){
        $error['email']='E-mail must be enter';
      }
      if($phone==''){
        $error['phone']='Phone must be enter';
      }
      if($address==''){
        $error['address']='Address must be enter';
      }
      foreach ($error as $key => $value) {
        if(empty($value)){
          unset($error[$key]);
        }
      }
      if(empty($error)){
        global $conn;
        global $username;
        global $password;
        global $email;
        global $phone;
        global $address;
        $hpass = md5($password);
        $query = "select * from auth where username='$username' and password='$hpass'";
        $go_query = mysqli_query($conn,$query);
        $count =mysqli_num_rows($go_query);
        if($count>0){
            echo "<script>window.alert('Alerady exist')</script>";
        }
        else{
            $query = "insert into auth(username,password,email,phone,address,role,created_date)";
            $query.= "values('$username','$hpass','$email','$phone','$address','user',now())";
            $go_query = mysqli_query($conn,$query);
            if(!$go_query){
                die("query failed".mysqli_error($conn));
            }
            else{
                echo "<script>window.alert('Successfully created an account')</script>";
                echo "window.location ='/login.php' ";
            }
        }
      }
    }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>REECO - Register</title>
 
  <!------------------------ style ------------------------------>
<style>
    body{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background: #ECF0F1;
}
.box{
  width: 500px;
  padding: 40px;
  position: absolute;
  margin-left: 30%;
  /* top: 50%;
  left: 50%; */
  border-radius: 20px;
  /* transform: translate(-50%,-50%); */
  background: #191919;
  text-align: center;
}
.box h1{
  color: white;
  text-transform: uppercase;
  font-weight: 500px;
}
.box input[type = "text"],.box input[type = "password"],.box input[type = "email"],.box textarea[type = "text"]{
  border: 0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid #3498db;
  padding: 12px 10px;
  width: 230px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  font-size: 14px;
}
.box input[type = "text"]:focus,.box input[type = "password"]:focus,.box input[type = "email"]:focus,.box textarea[type = "text"]:focus{
  width: 300px;
  border-color: purple ;
}
.box input[type = "submit"]{
  border: 0;
  background: none;
  display: inline;
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
  background: #33FF66;
}

.box input[type = "reset"]{
    border: 0;
    background: none;
    display: inline;
    margin: 20px auto;
    text-align: center;
    border: 2px solid red;
    padding: 14px 40px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
    cursor: pointer;
  }
  .box input[type = "reset"]:hover{
    background: red;
  }

</style>

  </head>
  <body>


<form class="box" action="" method="post">
<h1>Register</h1>
<input type="text" name="username" placeholder="Username" value="<?php if(isset($username)){echo $username;} ?>">
<label style="color:red;"><?php echo isset($error['username'])?$error['username']:'' ?></label>


<input type="password" name="password" placeholder="Password" value="<?php if(isset($username)){echo $username;} ?>">
<label style="color: red;"><?php echo isset($error['password'])?$error['password']:'' ?></label>


<input type="password" name="confirmpassword" placeholder="Confirm Password" value="<?php if(isset($password)){echo $password;} ?>">
<label style="color: red;"><?php echo isset($error['confirmpassword'])?$error['confirmpassword']:'' ?></label>
<label style="color: red;"><?php echo isset($error['matchpassword'])?$error['matchpassword']:'' ?></label>

<input type="email" name="email" placeholder="E-mail" value="<?php if(isset($email)){echo $email;} ?>">
<label style="color:red;"><?php echo isset($error['email'])?$error['email']:'' ?></label>

<input type="text" name="phone" placeholder="Phone" value="<?php if(isset($phone)){echo $phone;} ?>">
<label style="color:red;"><?php echo isset($error['phone'])?$error['phone']:'' ?></label>

<textarea type="text" name="address" id="" cols="30" rows="7" placeholder="Address" value="<?php if(isset($address)){echo $address;} ?>"></textarea>
<label style="color:red;"><?php echo isset($error['address'])?$error['address']:'' ?></label> <br>

<input type="reset" name="reset" value="Reset">
<input type="submit" name="register" value="Sign up">
<h4><a style="color:grey; text-decoration: none;" href="/login.php">login here</a></h4>
</form>

  </body>
</html>
