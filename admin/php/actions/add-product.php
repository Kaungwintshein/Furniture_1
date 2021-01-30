<?php 
    include("../includes/header.php");
    include("../config/db_connect.php");

    $sql = "SELECT * FROM product";
    $res = mysqli_query($conn,$sql);
    $products = mysqli_fetch_all($res, MYSQLI_ASSOC);
    foreach($products as $product){
        $name_from_db = $product['item_name'];
        $img_from_db = $product['img'];
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
            <input  type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="Price">
                Price
            </label>
            
            <input  type="input" name="price" class="form-control">
        </div>
        <div class="form-group">
            <label for="Price">
                Stock
            </label>
            
            <input  type="input" name="stock" class="form-control">
        </div>
        <div class="form-group">
            <textarea name="description"  class="form-control" placeholder="Description of Product."></textarea>
        </div>


        <div class="form-group">
            <label for="image">
                Category
            </label>
            <select name="category"  class="form-control">
                <?php 
                
                    $sql = "SELECT * FROM category";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    $products = mysqli_fetch_all($res,MYSQLI_ASSOC);
                
                ?>
                <?php if($count > 0) :?>

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
            <input type="file" name="image" class="d-block mt-2">
        </div>

        <a href="/admin/manage-product.php" class="btn btn-secondary">Cancel</a>
        <button type="submit" name="submit" value="Submit" class="btn btn-primary">Save</button>

    </form>
</div>

<?php 

if(isset($_POST['submit'])){
    $item_name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $detail = $_POST['description'];
    $category_id = $_POST['category'];

    if(isset($_FILES['image']['name'])){
        $image_name = $_FILES['image']['name'];

        if($image_name != ''){
            //$ext = end(explode('.', $image_name));
            //$image_name = "Product_".rand(000, 999).'.'.$ext;

            $source_path = $_FILES['image']['tmp_name'];
            
            $destination_path = '../../../images/product/'.$image_name;
            
            $upload = move_uploaded_file($source_path,$destination_path);

            if($upload == false){
                $_SESSION['upload'] = "<div class='text-danger'>Failed to Upload Image. </div>";
                header('location: /admin/php/actions/add-category.php');
                die();
            }
        }else{
            $image_name="";
        }
        
    }
    
    if($img_from_db == $image_name && $name_from_db == $item_name){
        $message = "Product Already Exist";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script type='text/javascript'>
        window.location = '/admin/manage-product.php';
        </script>";
    }else{
        $sql = "INSERT INTO product(item_name,category_id,price,detail,stock,img,created_date) VALUES ('$item_name','$category_id','$price','$detail','$stock','$image_name',now())";

        $res = mysqli_query($conn,$sql);

        if($res){
            $_SESSION['add'] = "<div class='text-success'>Product Added Successfully.</div>";
            header('location: /admin/manage-product.php');

        }else{
            $error = mysqli_error($conn);
            $_SESSION['add'] = "<div class='text-danger'>Failed to Add Product.$error</div>";
            header('location: /admin/manage-product.php');
        }
    }
    
}

?>


<?php include("../includes/footer.php") ?>