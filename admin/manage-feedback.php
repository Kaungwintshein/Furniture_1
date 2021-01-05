<?php 
    include("./php/config/auth.php");
    include("./php/includes/header.php");
    include("./php/config/db_connect.php");

    if(isset($_SESSION['delete'])){
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }

    $result = mysqli_query($conn,"SELECT * FROM feedback");
    $count = mysqli_num_rows($result);
    $sn = 1;
    $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
?>
<div class="container">
    <h3 class='title m-4'>Manage Feedback</h3>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">S.N.</th>
                <th scope="col">User Name</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Email</th>
                <th scope="col">Feedback</th>
                <th scope="col">Send Date</th>
            </tr>
        </thead>
        <tbody>
        
        <?php if($count > 0) : ?>
            <?php foreach($orders as $row): ?>
                <tr>
                    <th scope="row"> <?php echo $sn++ ?></th>
                    <td>              
                        <?php echo $row['user'] ?>
                    </td>
                    <td>              
                        <?php echo $row['username'] ?>
                    </td>
                    <td>              
                        <?php echo $row['email'] ?>
                    </td>
                    <td>              
                        <?php echo $row['feedback'] ?>
                    </td>
                    <td>              
                        <?php echo $row['created_date'] ?>
                    </td>
                    <td  colspan="2" >
                        <a href='/admin/php/actions/delete-feedback.php?id=<?php echo $row['id']; ?>' class="btn-danger btn button ">Delete</a>
                    </td>
                    
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
                <tr>
                    <td colspan="8">
                        <div class="text-danger">No Feedback YET.</div>
                    </td>
                </tr>
        <?php endif; ?>

           
        </tbody>
    </table>
</div>

<?php include("./php/includes/footer.php") ?>