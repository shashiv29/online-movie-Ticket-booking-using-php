<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<?php

include 'security.php';
include("includes/header.php");
include("includes/navbar.php");
?>

<!-- Modal -->
<div class="modal fade" id="addmovies" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center bg-mattBlackDark" id="exampleModalLabel">Movies</h4>
                <button type="button" class="close text-mattGray" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="moviescode.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="mov_name" class="form-control" placeholder="Enter Movie Name" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="sel1" placeholder="Movie Type" name="mov_type" required>
                            <option hidden>Movie Type</option>
                            <option>Bollywood</option>
                            <option>Hollywood</option>
                            <option>Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="sel2" placeholder="Movie Status" name="mov_status" required>
                            <option hidden>Movie Status</option>
                            <option>Running Movies</option>
                            <option>Comming Soon</option>
                        </select>
                    </div>
					<div class="form-group">
						<select class="form-control" id="mov_trend" placeholder="Movie Trend" name="mov_trend">
							<option hidden >Movie Trending</option>
							<option>Trending movie</option>
							<option>Non-Trending movie</option>
						</select>
					</div>
                    <div class="form-group">
                        <input class="form-control" name="mov_released_date" id="exampleFormControlTextarea1" placeholder="Enter Released date" rows="3" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="text" name="mov_tailor" id="exampleFormControlTextarea1" placeholder="Enter Tailor link" required>
                    </div>
					
                    <div class="form-group">
                        <textarea class="form-control" name="mov_description" id="exampleFormControlTextarea1" placeholder="Enter Movie Description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="mov_cast" id="exampleFormControlTextarea1" placeholder="Cast Names" rows="2" required></textarea>
                    </div>
                    <div class="form_group">
                        <label for="#">Choose Movie Image :</label>
                        <input type="file" name="mov_image" class="custom-file"  required>
                    </div>
                    <div class="form_group">
                        <label for="#">Choose Banner Image :</label>
                        <input type="file" name="mov_banner_image" class="custom-file"   required>
                    </div>

                    <br>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="upload" name="addmovies" class="btn btn-outline-danger">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="container-fluid bg-mattBlackLight">
    <div class="card  shadow mb-4">
        <div class="card-header py-3">
            <h1 class="text-dark font-weight-bold"> Movies List

                <button type="button" class="btn btn-outline-danger float-right" data-toggle="modal" data-target="#addmovies">
                    Add Movies
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
                $query = "SELECT * FROM movie";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();
                ?>


                <table class="table table-bordered" id="dataTable" width="100%" cellspacing='0'>
                    <thead class="thead-dark text-center">
                        <tr>
                            <th>Movie Id</th>
                            <th>Movie Image</th>
                            <th>Movie Name</th>
                            <th>Movie Released_date</th>
                            <th>Movie type</th>
							<th>Movie Trend</th>
                            <th>Movie status</th>
                            <th>Movie Description</th>
                            <th>Cast Names</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?= $row['mov_id']; ?></td>
                                <td><img src="<?= $row['mov_image']; ?>" width="50"></td>
                                <td><?= $row['mov_name']; ?></td>
                                <td><?= date("F j",strtotime($row['mov_released_date'])); ?></td>
                                <td><?= $row['mov_type']; ?></td>
								<td><?= $row['mov_trend']; ?></td>
                                <td><?= $row['mov_status']; ?></td>
                                <td><?= $row['mov_description']; ?></td>
                                <td><?= $row['mov_cast']; ?></td>
                                <td class="text-center">
                                    <form action="movies_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?= $row['mov_id']; ?>">
                                        <button type="submit" name="edit_btn" class=" btn btn-success">EDIT</button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <a href="moviescode.php?delete=<?= $row['mov_id']; ?>" class="btn btn-danger" onclick="return confirm('Do you want Delete this user!')">DELETE</a>
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