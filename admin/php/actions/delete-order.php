<?php 

    include("../config/db_connect.php");
    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $category_img = $_GET['product_img'];

        $sql = "DELETE FROM orders WHERE orders_id='$id' ";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            //SEt Success MEssage and REdirect
            $_SESSION['delete'] = "<div class='text-success'>Product Deleted Successfully.</div>";
            //Redirect to Manage Category
            header('location: /admin/manage-order.php');
        }
        else
        {
            //SEt Fail MEssage and Redirecs
            $_SESSION['delete'] = "<div class='text-danger'>Failed to Delete Product.</div>";
            //Redirect to Manage Category
            header('location: /admin/manage-order.php');
        }
    }
    else{
        header('location:/admin/manage-order.php');
    }

?>