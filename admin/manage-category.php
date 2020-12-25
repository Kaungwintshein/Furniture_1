<?php 
    include("./php/config/auth.php");
    include("./php/includes/header.php");
    include("./php/config/db_connect.php");
?>

  
<?php 
$sql = "SELECT * FROM category ";
$res = mysqli_query($conn, $sql);

$count = mysqli_num_rows($res);
$sn=1;
$categories = mysqli_fetch_all($res,MYSQLI_ASSOC);

mysqli_free_result($res);

mysqli_close($conn);

?>
<div class="container">
    <h3 class='title m-4'>Manage Category</h3>

    <?php 
    
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }

    if(isset($_SESSION['remove']))
    {
        echo $_SESSION['remove'];
        unset($_SESSION['remove']);
    }

    if(isset($_SESSION['delete']))
    {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }
    if(isset($_SESSION['no-category-found']))
    {
        echo $_SESSION['no-category-found'];
        unset($_SESSION['no-category-found']);
    }

    if(isset($_SESSION['update']))
    {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }
    if(isset($_SESSION['upload']))
    {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }

    if(isset($_SESSION['failed-remove']))
    {
        echo $_SESSION['failed-remove'];
        unset($_SESSION['failed-remove']);
    }

    
    ?>

    <a href='/admin/php/actions/add-category.php' class="btn-primary btn button m-4">Add category</a>
    <table class="table  table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">S.N.</th>
                <th scope="col">Title</th>
                <!-- <th scope="col">Image</th> -->
                <th  scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        
        <?php if($count >0) : ?>
                <?php foreach($categories as $category): ?>
                     <tr>
                <th scope="row"> <?php echo $sn++ ?></th>
                

                <td>                
                    <?php echo $category['category_name'] ?>
                </td>

                <td  colspan="2" >
                <a href='/admin/update-category.php?id=<?php echo $category['id']; ?>' class="btn-success btn button">Update category</a>
                <a href='/admin/php/actions/delete-category.php?id=<?php echo $category['id']; ?>' class="btn-danger btn button ">Delete category</a>
                </td>
            </tr>
                <?php endforeach; ?>

            <?php else: ?>
                <tr>
                    <td colspan="4">
                        <div class="text-danger">No Category Added.</div>
                    </td>
                </tr>
        <?php endif; ?>

           
        </tbody>
    </table>
</div>



<?php include("./php/includes/footer.php") ?>