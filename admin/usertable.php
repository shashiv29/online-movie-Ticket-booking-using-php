<?php

include "security.php";
include("includes/header.php");
include("includes/navbar.php");


?>
<div class="container bg-mattBlackLight">
    <div class="card  shadow mb-4">
        <div class="card-header py-3">
            <h1 class="text-primary text-center "> User Profile list</h1>
           
           
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
                  $query="SELECT * FROM userlogin";
                  $stmt=$conn->prepare($query);
                  $stmt->execute();
                  $result=$stmt->get_result();
                ?>  


                <table class="table table-bordered" id="dataTable" width="100%" cellspacing='0'>
                    <thead class="thead-dark text-center">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
							<th>username</th>
							<th>Gmail</th>
							<th>Mobile Number</th>
							
							<th>Delete</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row=$result->fetch_assoc()){ ?>
                        <tr>
                            <td><?= $row['user_id']; ?></td>
							
                            <td><?= $row['name']; ?></td>
							<td><?= $row['username']; ?></td>
							<td><?= $row['email']; ?></td>
                            <td><?= $row['phone']; ?></td>
						    
                            
                            <td class="text-center">
                              <a href="logincode.php?delete=<?=$row['user_id']; ?>"class="btn btn-danger" onclick="return confirm('Do you want Delete this user!')" >DELETE</a>
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