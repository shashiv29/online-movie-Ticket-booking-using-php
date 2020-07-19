<?php
include 'security.php';
include("includes/header.php");
include("includes/navbar.php");
?>

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-success">Edit Cinema</h6>
        </div>

        <div class="card-body">
            <?php


            if (isset($_POST['edit_btn'])) {

                $id = $_POST['edit_id'];
                $query = "SELECT * FROM cinema where cin_id='$id'";
                $query_run = mysqli_query($conn, $query);

                foreach ($query_run as $row) {
                    ?>
                    <form action="cinemascode.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="editt_id" value="<?= $row['cin_id']; ?> ">
                            
                            <div class="form-group">
                                <input type="text" name="edit_cin_name" class="form-control" placeholder="Enter Cinema Name" value="<?= $row['cin_name']; ?>" required>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="edit_cin_address" id="exampleFormControlTextarea1" placeholder="Address" rows="2" value="<?= $row['cin_address']; ?>" required></textarea>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="edit_cin_description" id="exampleFormControlTextarea1" placeholder="Description" rows="2" value="<?= $row['cin_description']; ?>" required></textarea>
                            </div>

                            
                            <div class="form_group">
                                    <label for="#">Choose Cinema Image :</label>
                                    <input type="file" name="edit_cin_image" class="custom-file" id="cinemaUpload" value="<?= $row['cin_image']; ?>" required>
                                

                            </div>

                        </div>

                        <div class="modal-footer">
                            <a href="cinemas.php" class=" btn btn-outline-danger">Cancel </a>
                            <button type="submit" name="update_btn" id="Upload" class="btn btn-outline-success">Update</button>
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