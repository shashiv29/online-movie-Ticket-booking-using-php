<?php
include 'security.php';
include("includes/header.php");
include("includes/navbar.php");
?>

<!-- Modal -->
<div class="modal fade" id="addcinema" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center bg-mattBlackDark" id="exampleModalLabel">Add new Theatre</h4>
                <button type="button" class="close text-mattGray" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="cinemascode.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">

                        <input type="text" name="cin_name" class="form-control" placeholder="Enter Theatre Name" required>
                    </div>




                    <div class="form-group">
                        <textarea class="form-control" name="cin_address" id="exampleFormControlTextarea1" placeholder="Cinema Address" rows="2" required></textarea>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="cin_description" id="exampleFormControlTextarea1" placeholder="Cinema information" rows="2" required></textarea>
                    </div>

                    <div class="form_group">
                        <label for="#">Choose Cinema Image :</label>
                        <input type="file" name="cin_image" class="custom-file" required>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="addcinema" class="btn btn-dark bg-mattRed">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="container-fluid bg-mattBlackLight">
    <div class="card  shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800 ">
                Cinema
                <button type="button" class="btn btn-dark bg-mattRed float-right" data-toggle="modal" data-target="#addcinema">
                    Add cinema
                </button>
            </h1>
        </div>
        <div class="card-body">
            <?php if (isset($_SESSION['response'])) { ?>
                <div class="alert alert-<?= $_SESSIOn['res_type']; ?> alert-dismissible text-center alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?= $_SESSION['response']; ?>
                </div>
            <?php }
            unset($_SESSION['response']); ?>


            <div class="table-responsive">
                <?php
                $query = "SELECT * FROM cinema";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();
                ?>


                <table class="table table-bordered" id="dataTable" width="100%" cellspacing='0'>
                    <thead class="thead-dark text-center">
                        <tr>
                            <th>Id</th>
                            <th>Cinemas</th>
                            <th>Poster</th>
                            <th>Description</th>


                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['cin_id']; ?></td>
                                <td><?php echo $row["cin_name"]; ?></td>
                                <td><img src="<?= $row['cin_image']; ?>" width="80"></td>
                                <td><?php echo $row['cin_description']; ?></td>
                                <td class="text-center">
                                    <form action="cinema_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?= $row['cin_id']; ?>">
                                        <button type="submit" name="edit_btn" class=" btn btn-success">EDIT</button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <a href="cinemascode.php?delete=<?= $row['cin_id']; ?>" class="btn btn-danger" onclick="return confirm('Do you want Delete this user!')">DELETE</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/scripts.php");
include("includes/footer.php");

?>