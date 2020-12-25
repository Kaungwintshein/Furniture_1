<?php 
    include "./php/config/auth.php";
    include("./php/includes/header.php") ?> 
        <div class="container">
    <h3 class='title m-4'>Manage Category</h3>


    <a href='/admin/actions/add-category.php' class="btn-primary btn button m-4">Add category</a>
    <table class="table  table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">S.N.</th>
                <th scope="col">Full Name</th>
                <th scope="col">Username</th>
                <th  scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        
                     <tr>
                <th scope="row">1</th>
                <td>             
                   Ko Ko
                </td>
                <td>
                   Ko Ko
                </td>
                <td  colspan="2" >
                <a href='/admin' class="btn-primary btn button">Change password</a>
                <a href='/admin' class="btn-success btn button">Update category</a>
                <a href='/admin' class="btn-danger btn button ">Delete category</a>

                </td>
            </tr>

           

           
        </tbody>
    </table>
</div>

<?php include("./php/includes/footer.php") ?>