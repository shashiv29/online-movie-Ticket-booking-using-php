<?php
include 'security.php';
include("includes/header.php");
include("includes/navbar.php");
?>


<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-success diplay-4">Edit movies List</h6>
        </div>


        <div class="card-body">
            <?php


            if (isset($_POST['edit_btn'])) {

                $id = $_POST['edit_id'];
                $query = "SELECT * FROM adminlogin where id='$id'";
                $query_run = mysqli_query($conn, $query);

                foreach ($query_run as $row) {
                    ?>
                    <form action="signupcode.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="editt_id"  value="<?= $row['id']; ?> ">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user-circle"></i> </span>
                            </div>
                            <input class="form-control" name="edit_fullName" placeholder="Full name" type="text" value="<?= $row['fullName']; ?>">
                        </div> <!-- form-group// -->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input class="form-control" name="edit_username" placeholder="username" type="text" value="<?= $row['username']; ?>">
                        </div> <!-- form-group// -->

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="edit_gmail" class="form-control" placeholder="Email address" type="email" value="<?= $row['gmail']; ?>">
                        </div> <!-- form-group// -->

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                            </div>




                            <input type="text" name="edit_phone" minlength="10" maxlength="10" class="form-control" placeholder="Your Phone *" value="<?= $row['phone']; ?>">

                        </div> <!-- form-group// -->

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input name="edit_password" class="form-control" placeholder="Create password" type="password" value="<?= $row['password']; ?>">
                        </div> <!-- form-group// -->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input name="edit_confirmPassword" class="form-control" placeholder="Repeat password" type="password" value="<?= $row['confirmPassword']; ?>">
                        </div> <!-- form-group// -->
                        <br>


        </div>
        <div class="modal-footer">
            <a href="admintable.php" class=" btn btn-outline-danger">Cancel </a>
            <button type="submit" name="update_btn" class="btn btn-outline-success">Update</button>
        </div>
        </form>
<?php
    }
}
?>
    </div>
</div>
</div>

<?php
include("includes/footer.php");
include("includes/scripts.php");

?>