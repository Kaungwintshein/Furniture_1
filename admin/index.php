<?php
    include("./php/config/auth.php");
    include('./php/config/db_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>User - List</title>
    <?php 
        include "./php/includes/head.php";
    ?>
</head>
<body>

    <?php include("./php/includes/header.php") ?>
    <div class="container">
        <h3 class='title m-4'>Manage Userlist</h3>
        
        <a href='./php/actions/add-user.php' class="btn-primary btn button m-4">Add User</a>
        <table class="table  table-striped table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th scope="col">#ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Role</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Delete</th> 
                    <!-- <th scope="col">Edit</th>  -->
                </tr>
            </thead>
            <tbody>

                <?php 
                    $query = "select * from auth order by id desc";
                    $go_query = mysqli_query($conn,$query);
                    foreach($go_query as $row){
                        $id = $row['id'];
                        $username = $row['username'];
                        $password = $row['password'];
                        $role = $row['role'];
                        $created_date = $row['created_date'];
                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td>{$id}</td>";
                        echo "<td>{$username}</td>";
                        echo "<td>{$password}</td>";
                        echo "<td>{$role}</td>";
                        echo "<td>{$created_date}</td>";
                        //echo "<td><a href='index.php?action=delete&cid={$id}'><i class='fa fa-trash' style='color:red;cursor:pointer;'></i></a></td>";
                        //echo "<td><button type='submit' class='btn btn-primary' onclick='OpenModel('{$id}','{$username}')'>EDIT</button></td>";
                        echo "<td><a href='index.php?action=delete&cid={$id}' class='btn btn-danger' onclick=\"return confirm('Are you sure?')\">DELETE</a></td>";
                        //echo "<td><type='submit' name='button' a href='index.php?action=edit&cid={$id}' class='btn btn-primary' onclick=\"OpenModel('{$id}', '{$username}')\">EDIT</a>";
                        //echo "<td><type='submit' name='button' a href='index.php?action=edit&cid={$id}' class='btn btn-primary' onclick=\"OpenModel('{$id}', '{$username}')\">EDIT</a>";
                        
                        echo "</tr>";
                    }
                ?>
            </tbody>
        
<?php
    include "./modal.php";
    if (isset($_GET['action']) && $_GET['action']=='delete'){
        try
        {
            $id = $_GET['cid'];
            $query = "DELETE FROM auth WHERE id='$id'";
            $go_query = mysqli_query($conn,$query);
            echo "<script type='text/javascript'>
                window.location = '/admin/index.php';
                </script>";
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    if(isset($_POST['updatecategory'])){
        global $conn;
        $catname = $_POST['catname'];
        $cid = $_POST['cid'];
        $query = "update auth set username='$catname',created_date=now() where id='$cid'";
        $go_query = mysqli_query($conn,$query);
        if(!$go_query){
            die("querry failed".mysqli_error($conn));
        }
    }
                                


?>

<script>
  function OpenModel(id, name){
    $("#editUser").modal();
    $('#user_id').val(id);
    $('#user_name').val(name);
  }
</script>
    
</body>
</html>