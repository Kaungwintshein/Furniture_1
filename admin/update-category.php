<?php 
    include("./php/config/auth.php");
    include("./php/includes/header.php");
    include("./php/config/db_connect.php");
?>


<?php 

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM category WHERE id=$id";

    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if($count==1)
    {
        //Get all the data
        $row = mysqli_fetch_assoc($res);
        $category_name = $row['category_name'];
        // $current_image = $row['category_img'];
    }
    else
    {
        //redirect to manage category with session message
        $_SESSION['no-category-found'] = "<div class='text-danger'>Category not Found.</div>";
        header('location:/admin/manage-category.php');
    }
}  else
{
    //redirect to Manage CAtegory
    header('location:/admin/manage-category.php');
}

?>

<div class="container mt-4">

    <form action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="name">
                Category Name
            </label>
            <input value="<?php echo htmlspecialchars($category_name) ?>" type="text" name="name" class="form-control">
        </div>

        
        <a href="/admin" class="btn btn-secondary">Cancel</a>

        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" name="submit" value="Submit" class="btn btn-primary">Save</button>

    </form>
</div>
<?php 

if(isset($_POST['submit'])){
    $category_name = $_POST['name'];
    $id = $_POST['id'];
    
    
        $sql2 = "UPDATE category SET category_name='$category_name' WHERE id='$id'";
        $res2 = mysqli_query($conn, $sql2);
        if($res2==true)
        {
            //Category Updated
            $_SESSION['update'] = "<div class='text-success'>Category Updated Successfully.</div>";
            header('location:/admin/manage-category.php');
        }else{
            //failed to update category
            $_SESSION['update'] = "<div class='text-danger'>Failed to Update Category.</div>";
            header('location:/admin/manage-category.php');
        }
    }



?>



<?php include("./php/includes/footer.php") ?>