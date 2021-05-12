<?php 
    include("../includes/header.php");
    include("../config/db_connect.php");
?>
<div class="container mt-4">
<?php 
        
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
    
    ?>
    <form action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="name">
                Category Name
            </label>
            <input  type="text" name="name" class="form-control">
        </div>
        <a href="/admin/manage-category.php" class="btn btn-secondary">Cancel</a>
        <button type="submit" name="submit" value="Submit" class="btn btn-primary">Save</button>

    </form>
</div>

<?php 

if(isset($_POST['submit'])){
    $category_name = $_POST['name'];

    $result = mysqli_query($conn,"SELECT * FROM category WHERE category_name = '$category_name'");
    $categories = mysqli_fetch_all($result,MYSQLI_ASSOC);
    foreach($categories as $category){
        $cat_name_db = $category['category_name'];
    };
    echo $cat_name_db;

    // if($cat_name_db == $category_name){
    //     die("HELLOO WORLD");
    // }
    if($cat_name_db == $category_name){
        $message = "Category Name Is Already Taken";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script type='text/javascript'>
        window.location = '/admin/manage-category.php';
        </script>";
    }else{
        $sql = "INSERT INTO category(category_name) VALUES ('$category_name')";
        $res = mysqli_query($conn,$sql);

        if($res){
            $_SESSION['add'] = "<div class='text-success'>Category Added Successfully.</div>";
            header('location: /admin/manage-category.php');

        }else{
            $error = mysqli_error($conn);
            $_SESSION['add'] = "<div class='text-danger'>Failed to Add Category.$error</div>";
            header('location: /admin/php/actions/add-category.php');
        }
    }
}

?>


<?php include("../includes/footer.php") ?>