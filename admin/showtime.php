<?php
include "security.php";
include("includes/header.php");
include("includes/navbar.php");
?>

<!-- Modal -->
<div class="modal fade" id="addshowtime" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center bg-mattBlackDark" id="exampleModalLabel">Showtime</h4>
                <button type="button" class="close text-mattGray" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="showtimecode.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
					<div class="form-group">
						<select class="form-control" id="mov_name" placeholder="Movie Name" name="mov_name">
							<option hidden >Movie Name</option>
							<?php 
								$query="select mov_name from movie";
								$stmt=$conn->prepare($query);
								$stmt->execute();
								$result=$stmt->get_result();
							    while($row=$result->fetch_assoc())
								{
							?>
								<option><?php echo $row['mov_name']; ?></option>
						   <?php }?>
						</select>
					</div>
					<div class="form-group">
						<select class="form-control" id="cin_name" placeholder="Cinema Name" name="cin_name">
							<option hidden >Cinema Name</option>
							<?php 
								$query="select cin_name from cinema";
								$stmt=$conn->prepare($query);
								$stmt->execute();
								$result=$stmt->get_result();
							    while($row=$result->fetch_assoc())
								{
							?>
								<option><?php echo $row['cin_name']; ?></option>
						   <?php }?>
						</select>
					</div>
					<div class="form-group">
                        <input class="form-control" name="show_starttime" id="show_start_time" placeholder="Show Start Time" rows="3">
                    </div>
					<div class="form-group">
                        <input class="form-control" name="show_endtime" id="show_end_time" placeholder="Show End Time" rows="3">
                    </div>
					<div class="form-group">
                        <input class="form-control" name="show_date" id="show_date" placeholder="Show Date" rows="3">
                    </div>
					<br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" id="btn_close" data-dismiss="modal">Close</button>
                    <button type="submit"  name="addshowtime" class="btn btn-outline-danger">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="container bg-mattBlackLight">
    <div class="card  shadow mb-4">
        <div class="card-header py-3">
            <h4 class="text-primary"> Showtime List
                <button type="button" class="btn btn-outline-danger float-right" data-toggle="modal" data-target="#addshowtime">
                    Add Showtime
                </button>
            </h4>
           
        </div>
        <div class="card-body">
			<?php if(isset($_SESSION['response'])) { ?>
			<div class="alert alert-<?= $_SESSIOn['res_type']; ?> alert-dismissible text-center alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<?= $_SESSION['response']; ?>
			</div>
			<?php } unset($_SESSION['response']); ?>

            <div class="table-responsive">
                <?php
                  $query="select A.show_id,A.show_starttime,A.show_endtime,A.show_date,B.mov_name,C.cin_name from showtime as A natural join movie as B natural join cinema as C order by A.show_id;";
                  $stmt=$conn->prepare($query);
                  $stmt->execute();
                  $result=$stmt->get_result();
                ?>  


                <table class="table  centered responsive-table table-bordered table-striped" cellspacing='0' id="dataTable">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th>Show Id</th>
							<th>Movie Name</th>
                            <th>Cinema Name</th>
							<th>Show Start Time</th>
							<th>Movie End Time</th>
							<th>Show Date</th>
							<th>Edit</th>
							<th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row=$result->fetch_assoc()){ ?>
                        <tr>
                            <td><?= $row['show_id']; ?></td>
                            <td><?= $row['mov_name']; ?></td>
							<td><?= $row['cin_name']; ?></td>
							<td><?= date("H:i",strtotime($row['show_starttime'])); ?></td>
                            <td><?= date("H:i",strtotime($row['show_endtime'])); ?></td>
							<td><?= date("F j",strtotime($row['show_date'])); ?></td>
                            <td class="text-center">
                                    <form action="showtime_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?= $row['show_id']; ?>">
                                        <button type="submit" name="edit_btn" class=" btn btn-success">EDIT</button>
                                    </form>
                                </td>
                            <td>
                              <a href="showtimecode.php?delete=<?=$row['show_id']; ?>"class="btn btn-danger" onclick="return confirm('Do you want Delete this user!')" >DELETE</a>
                            </td>

                        </tr>
                        <?php } ?>



                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</div>
<?php
include("includes/footer.php");
include("includes/scripts.php");

?>