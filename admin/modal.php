<!---------------------------------------- Create User ------------------------------------->
<div class="modal fade" id="createUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form class=""  method="post">
                    <div class="form-group">
                        <input type="hidden" name="cid" id="_catid" class="form-control">
                        <input type="text" name="catname" id="_catname" class="form-control">
                        <!-- <select type="" name="uprole" id="_ct" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select> -->
                    </div>

                    <div class="modal-footer">
                        <button  type="submit" name="updatecategory" class="btn btn-primary">Update Category</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>                             


<!---------------------------------------- Edit Modal ------------------------------------->
<div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php
                // include "./php/config/db_connect.php";
                // $result = mysqli_query($conn, "SELECT * FROM auth WHERE id='$id'");
            ?>
            <div class="modal-body">
                <form class=""  method="post">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="hidden" name="cid" id="user_id" class="form-control">
                        <input type="text" name="catname" id="user_name" value="" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button  type="submit" name="updatecategory" class="btn btn-primary">Update Category</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
<!---------------------------------------- Edit Modal ------------------------------------->