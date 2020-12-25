<?php 

    include("../config/db_connect.php");
    if(isset($_GET['id'])){



    $id = $_GET['id'];
    //$category_img = $_GET['category_img'];

    // if($category_img != ''){

    //     $path = "../images/category/".$category_img;
    //     $remove = unlink($path);

    //     if($remove==false)
    //     {
    //         //Set the SEssion Message
    //         $_SESSION['remove'] = "<div class='text-danger'>Failed to Remove Category Image.</div>";
    //         //REdirect to Manage Category page
    //         header('location:/admin/manage-category.php');
    //         //Stop the Process
    //         die();
    //     }
        $sql = "DELETE FROM category WHERE id=$id ";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            //SEt Success MEssage and REdirect
            $_SESSION['delete'] = "<div class='text-success'>Category Deleted Successfully.</div>";
            //Redirect to Manage Category
            header('location: /admin/manage-category.php');
        }
        else
        {
            //SEt Fail MEssage and Redirecs
            $_SESSION['delete'] = "<div class='text-danger'>Failed to Delete Category.</div>";
            //Redirect to Manage Category
            header('location: /admin/manage-category.php');
        }

    }
    // }else{
    //     header('location:/admin/manage-category.php');
    // }

?>