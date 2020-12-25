<?php
session_start();
include('../config/db_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>User - List</title>
    <?php 
        include "../includes/head.php";
    ?>

<!----------------------------------------- style ------------------------>
<style>
    body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: #ECF0F1;
    }
    .box{
    width: 450px;
    padding: 40px;
    position: absolute;
    /* top: 80%; */
    left: 35%;
    border-radius: 20px;
    /* transform: translate(-50%,-50%); */
    background: #191919;
    text-align: center;
    }
    .box h1{
    color: white;
    font-weight: 500px;
    }
    .box input[type = "text"],.box input[type = "password"],.box input[type = "email"],textarea{
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
    .box select[name="usertype"]{
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #3498db;
    padding: 14px 10px;
    width: 200px;
    outline: none;
    color: gray;
    border-radius: 24px;
    transition: 0.25s;
    }
    .box input[type = "text"]:focus,.box input[type = "password"]:focus,.box select[name="usertype"]:focus,.box input[type = "email"]:focus,textarea{
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
<!------------------------------- php --------------------->
    <?php
        if(isset($_POST['adduser'])){
            global $conn;
            $uname = $_POST['username'];
            $password = $_POST['password'];
            $cpassword = $_POST['confirmpassword'];
            $usertype = $_POST['usertype'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            if($password!=$cpassword){
                echo "<script>window.alert('Password and Confirm Password are must be same')</script>";
            }

            else if($password!='' && $uname!=''){
                $query = "select * from auth where username='$uname' and password=md5('$password')";
                $go_query = mysqli_query($conn,$query);
                $count = mysqli_num_rows($go_query);
                if($count>0){
                    echo "<script>window.alert('This user is already exist')</script>";
                }
                else{
                    $mpass = md5($password);
                    $query = "insert into auth(role,username,password,email,phone,address,created_date)";
                    $query.= "values('$usertype','$uname','$mpass','$email','$phone','$address',now())";

                    $go_query = mysqli_query($conn,$query);
                    if(!$go_query){
                        die("query failed".mysqli_error($conn));
                    }
                    header('location: /admin/user-list.php');
                }
            }
        }
    ?>

<body>


               <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <div  class="col-lg-12 col-sm-12">

                        <!------------------------------ form ---------------------->
                        <form class="box" action="" method="post">
                        <h1>Add User</h1>
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <input type="password" name="confirmpassword" placeholder="Confirm Password" required>
                        <input type="email" name="email" placeholder="Email Address" required>
                        <input type="text" name="phone" placeholder="Phone number" required>
                        <textarea name="address" id="" cols="30" rows="10"></textarea>
                        
                        <select  name="usertype">
                        <option name="choice" value="admin">-----Admin-----</option>
                        <option name="choice" value="user">-----User-----</option>
                        </select>
                    
                        <input type="submit" name="adduser" value="Submit">
                        </form>

                        </div>
                    </div>
                </div><!-- .animated -->
            </div><!-- .content -->

    
</body>
</html>