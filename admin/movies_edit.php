<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

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
                $query = "SELECT * FROM movie where mov_id='$id'";
                $query_run = mysqli_query($conn, $query);

                foreach ($query_run as $row) {
                    ?>
                    <form action="moviescode.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="editt_id" value="<?= $row['mov_id']; ?>">
                            <div class="form-group">
                                <input type="text" name="edit_mov_name" class="form-control" placeholder="Enter Movie Name" value="<?= $row['mov_name']; ?>" required>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="sel1" placeholder="Movie Type" name="edit_mov_type">
                                    <option hidden>Movie Type</option>
                                    <option>Bollywood</option>
                                    <option>Hollywood</option>
                                    <option>Others</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="sel2" placeholder="Movie Status" name="edit_mov_status" value="<?= $row['mov_status']; ?>" required>
                                    <option hidden>Movie Status</option>
                                    <option>Running Movies</option>
                                    <option>Comming Soon</option>
                                    <option>Trending Movies</option>
                                </select>
                            </div>
                         

                            <div class="form-group">
                                <input class="form-control" name="edit_mov_released_date" id="exampleFormControlTextarea1" placeholder="Enter Released date" rows="3" value="<?= $row['mov_released_date']; ?>" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="edit_mov_tailor" id="exampleFormControlTextarea1" placeholder="Enter Trailer Link" rows="3" value="<?= $row['mov_tailor']; ?>" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="edit_mov_description" id="exampleFormControlTextarea1" placeholder="Enter Movie Description" rows="3" value="<?= $row['mov_description']; ?>" required></textarea>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="edit_mov_cast" id="exampleFormControlTextarea1" placeholder="Cast Names" rows="2" value="<?= $row['mov_cast']; ?>"></textarea>
                            </div>
                            <div class="form_group">
                                <label for="#">Choose Movie Image :</label>
                                <input type="file" name="edit_mov_image" class="custom-file"   id="fileUpload" value="<?= $row['mov_image']; ?>"required  >
                            </div>
                            <div class="form_group">
                                <label for="#">Choose Banner Image :</label>
                                <input type="file" name="edit_mov_banner_image" class="custom-file"  id="bannerUpload" value="<?= $row['mov_banner_image']; ?>" required>
                            </div>
                            <br>


                        </div>
                        <div class="modal-footer">
                            <a href="movies.php" class=" btn btn-outline-danger">Cancel </a>
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