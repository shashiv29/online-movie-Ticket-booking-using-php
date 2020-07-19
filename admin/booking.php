<?php
include "security.php";
include("includes/header.php");
include("includes/navbar.php");
?>

<div class="container">
    <div class="card  shadow mb-4">
       
        <div class="card-body">
        <?php if(isset($_SESSION['response'])) { ?>
        <div class="alert alert-<?= $_SESSIOn['res_type']; ?> alert-dismissible text-center alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?= $_SESSION['response']; ?>
        </div>
        <?php } unset($_SESSION['response']); ?>

            <div class="table-responsive">
                <?php
                 $query = "SELECT A.book_id, A.book_seat, B.username, C.mov_name, D.cin_name, E.show_starttime from booking as A NATURAL JOIN userlogin as B NATURAL JOIN movie
                 as C NATURAL JOIN cinema  as D Natural JOIN showtime as E";
                  $stmt=$conn->prepare($query);
                  $stmt->execute();
                  $result=$stmt->get_result();
                ?>  


                <table class="table table-bordered" id="dataTable" width="100%" cellspacing='0'>
                    <thead class="thead-dark text-center">
                        <tr>
                            <th>Booking Id</th>
							<th> Seat</th>
                            <th>Username</th>
							<th>Movie Name</th>
							<th>Cinema Name</th>
							<th>Showtime</th>
							<th>Delete</th>
							
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row=$result->fetch_assoc()){ ?>
                        <tr>
                            <td><?= $row['book_id']; ?></td>
						
                            <td><?= $row['book_seat']; ?></td>
                            <td><?= $row['username']; ?></td>
							<td><?= $row['mov_name']; ?></td>
							<td><?= $row['cin_name']; ?></td>
                            <td><?= date("H:i",strtotime($row['show_starttime'])); ?></td>
						    
                            
                            <td class="text-center">
                              <a href="moviescode.php?delete=<?=$row['book_id']; ?>"class="btn btn-danger" onclick="return confirm('Do you want Delete this user!')" >DELETE</a>
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