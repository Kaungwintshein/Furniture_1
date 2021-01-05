<?php

    include("../config/db_connect.php");
    $id = $_GET['id'];

    $sql = "DELETE FROM feedback WHERE id=$id ";
    $res = mysqli_query($conn, $sql);

    if($res==true)
    {
        //SEt Success MEssage and REdirect
        $_SESSION['delete'] = "<div class='text-success'>Feedback Deleted Successfully.</div>";
        //Redirect to Manage Category
        header('location: /admin/manage-feedback.php');
    }
    else
    {
        //SEt Fail MEssage and Redirecs
        $_SESSION['delete'] = "<div class='text-danger'>Failed to Delete Feedback.</div>";
        //Redirect to Manage Category
        header('location: /admin/manage-feedback.php');
    }
    
?>