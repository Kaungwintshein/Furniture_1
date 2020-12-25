<?php 
    include("./php/config/auth.php");
    include("./php/includes/header.php");
    include("./php/config/db_connect.php");
?>
<?php 

if(isset($_GET['id'])){
    $id = $_GET['id'];

    //$sql = "SELECT * FROM product WHERE id=$id";
    $sql = "SELECT * FROM category INNER JOIN product ON category.id = product.category_id WHERE product.id='$id'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if($count==1)
    {
        //Get all the data
        $row = mysqli_fetch_assoc($res);
        $item_name = $row['item_name'];
        $price = $row['price'];
        $detail = $row['detail'];
        $current_image = $row['img'];
        $category_name = $row['category_name']; 
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
                Product Name
            </label>
            <input  type="text" value="<?php echo htmlspecialchars($item_name) ?>" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="Price">
                Price
            </label>
            
            <input value="<?php echo htmlspecialchars($price) ?>"   type="number" name="price" class="form-control">
        </div>
        <div class="form-group">
            <textarea  name="description"  class="form-control"
                            placeholder="Description of the Food.">
                            
                             <?php echo htmlspecialchars($detail) ?>
                            </textarea>
        </div>
        <div>
            <label for="image">
                Current image
            </label>
            <?php 
                            if($current_image != "")
                            {
                                //Display the Image
                                ?>
            <img class='img d-block' src="../images/product/<?php echo $current_image; ?>">
            <?php
                            }
                            else
                            {
                                //Display Message
                                echo "<div class='text-danger mb-4'>Image Not Added.</div>";
                            }
                        ?>
        </div>

        <div class="form-group">
            <label for="image">
                Category
            </label>
            <select name="category" class="form-control">
                <?php 
                
                    $sql = "SELECT * FROM category";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    $products = mysqli_fetch_all($res,MYSQLI_ASSOC);
                
                ?>
                <?php if($count > 0) :?>
                    <option value="<?php echo $id; ?>" selected><?php echo $category_name ?></option>
                    <?php foreach($products as $product) :?>
                        <option value="<?php echo $product['id'] ?>"> <?php echo $product['category_name'] ?></option>

                    <?php endforeach; ?>


                <?php else: ?>
                    <option value="0">No Category Found</option>
                <?php endif; ?>

             </select>
        </div>

        <div class="form-group">
            <label for="image">
                Image
            </label>
            <input type="file" name="image" class="form-control">
        </div>

        <a href="/admin" class="btn btn-secondary">Cancel</a>
        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>" >
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" name="submit" value="Submit" class="btn btn-primary">Save</button>

    </form>
</div>

<?php 

if(isset($_POST['submit'])){
    $item_name = $_POST['name'];
    $price = $_POST['price'];
    $detail = $_POST['description'];
    $category_id = $_POST['category'];
    $id = $_POST['id'];
    $current_image = $_POST['current_image'];
    if(isset($_FILES['image']['name'])){
        $category_img = $_FILES['image']['name'];
        $upload = move_uploaded_file($_FILES['image']['tmp_name'],'../images/product/'.$category_img);
        // if($category_img != ''){
        //     $ext = end(explode('.', $category_img));
        //     $category_img = "Product_".rand(000, 999).'.'.$ext;

        //     $source_path = $_FILES['image']['tmp_name'];
        
        //     $destination_path='../images/product/'.$category_img;
        
        //     $upload = move_uploaded_file($source_path,$destination_path);

        //     if($upload ==false){
        //         //SEt message
        //         $_SESSION['upload'] = "<div class='text-danger'>Failed to Upload Image. </div>";
        //         //Redirect to Add CAtegory Page
        //         header('location:/admin/add-product.php');
        //         //STop the Process
        //         die();
        //    }

        //    if($current_image !=""){
        //        $remove_path = "../images/product/".$current_image;

        //        $remove = unlink($remove_path);

        //        if($remove==false){
        //            $_SESSION['failed-remove'] = "<div class='text-danger'>Failed to remove current Image.</div>";
        //            header('location:/admin/manage-category.php');
        //            die();//Stop the Process
        //        }
        //    }
        // }
        // else{
        //     $category_img = $current_image;
        // }

    }else{
        $category_img = $current_image;
    }
        $sql2 = "UPDATE category INNER JOIN product SET item_name='$item_name',price='$price',detail='$detail',category_id='$category_id',img='$category_img' WHERE product.id='$id'";
        //$sql2 = "UPDATE product SET item_name='$item_name',price='$price',detail='$detail',category_id='$category_id',img='$category_img' WHERE id='$id'";
          $res2 = mysqli_query($conn, $sql2);
          if($res2==true)
          {
              //Category Updated
              $_SESSION['update'] = "<div class='text-success'>Category Updated Successfully.</div>";
              header('location:/admin/manage-product.php');
          }
          else
          {
              $error = mysqli_error($conn);
              //failed to update category
              $_SESSION['update'] = "<div class='text-danger'>Failed to Update Category.$error</div>";
              header('location: /admin/manage-product.php');
          }
}


?>



<?php include("./php/includes/footer.php") ?>