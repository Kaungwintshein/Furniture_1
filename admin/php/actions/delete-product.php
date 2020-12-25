<?php 

    include("../config/db_connect.php");
    if(isset($_GET['id']) && isset($_GET['product_img'])){

    $id = $_GET['id'];
    $category_img = $_GET['product_img'];

    // if($category_img != ''){

    //     $path = "../../../images/product/".$category_img;
    //     $remove = unlink($path);

    //     if($remove==false)
    //     {
    //         //Set the SEssion Message
    //         $_SESSION['remove'] = "<div class='text-danger'>Failed to Remove Product Image.</div>";
    //         //REdirect to Manage Category page
    //         header('location:/admin/manage-product.php');
    //         //Stop the Process
    //         die();
    //     }

    // }
        $sql = "DELETE FROM product WHERE id=$id ";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            //SEt Success MEssage and REdirect
            $_SESSION['delete'] = "<div class='text-success'>Product Deleted Successfully.</div>";
            //Redirect to Manage Category
            header('location: /admin/manage-product.php');
        }
        else
        {
            //SEt Fail MEssage and Redirecs
            $_SESSION['delete'] = "<div class='text-danger'>Failed to Delete Product.</div>";
            //Redirect to Manage Category
            header('location: /admin/manage-category.php');
        }
    }
    else{
        header('location:/admin/manage-category.php');
    }

?>