
<?php
include 'security.php';
include("includes/header.php");
include("includes/navbar.php");
?>


<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-success diplay-4">Edit showtime</h6>
        </div>


        <div class="card-body">
            <?php



            if (isset($_POST['edit_btn'])) {

                $id = $_POST['edit_id'];
                $query = "SELECT * FROM showtime where show_id='$id'";
                $query_run = mysqli_query($conn, $query);

                foreach ($query_run as $row) {
                    ?>
                    <form action="showtimecode.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="editt_id" value="<?= $row['show_id']; ?>">
                            <div class="form-group">
                                <select class="form-control" id="mov_name" placeholder="Movie Name" name="edit_mov_name" value="<?= $row['mov_name']; ?>">
                                    <option hidden>Movie Name</option>
                                    <?php
                                            $query = "select mov_name from movie";
                                            $stmt = $conn->prepare($query);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            while ($row = $result->fetch_assoc()) {
                                                ?>
                                        <option><?php echo $row['mov_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="cin_name" placeholder="Cinema Name" name="edit_cin_name" value="<?= $row['cin_name']; ?>">
                                    <option hidden>Cinema Name</option>
                                    <?php
                                            $query = "select cin_name from cinema";
                                            $stmt = $conn->prepare($query);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            while ($row = $result->fetch_assoc()) {
                                                ?>
                                        <option><?php echo $row['cin_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="edit_show_starttime" id="show_start_time" placeholder="Show Start Time" rows="3" value="<?= $row['show_starttime']; ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="edit_show_endtime" id="show_end_time" placeholder="Show End Time" rows="3" value="<?= $row['show_endtime']; ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="edit_show_date" id="show_date" placeholder="Show Date" rows="3" value="<?= $row['show_date']; ?>">
                            </div>
                            <br>


                        </div>
                        <div class="modal-footer">
                            <a href="showtime.php" class=" btn btn-outline-danger">Cancel </a>
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