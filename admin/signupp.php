<?php
include "security.php";
include "includes/header.php";
include "includes/navbar.php";


?>

<div class="modal fade" id="adminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog " role="document" style="max-width: 400px;">
		<div class="modal-content">
			<h4 class="card-title mt-3 text-center text-dark">Create Account</h4>



			<form action="signupcode.php" method="post">
				<div class="modal-body">
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-user-circle"></i> </span>
						</div>
						<input class="form-control" name="fullName" placeholder="Full name" type="text">
					</div> <!-- form-group// -->
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-user"></i> </span>
						</div>
						<input class="form-control" name="username" placeholder="username" type="text">
					</div> <!-- form-group// -->

					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
						</div>
						<input name="gmail" class="form-control" placeholder="Email address" type="email">
					</div> <!-- form-group// -->

					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
						</div>




						<input type="text" name="phone" minlength="10" maxlength="10" class="form-control" placeholder="Your Phone *" value="" />

					</div> <!-- form-group// -->

					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
						</div>
						<input name="password" class="form-control" placeholder="Create password" type="password">
					</div> <!-- form-group// -->
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
						</div>
						<input name="confirmPassword" class="form-control" placeholder="Repeat password" type="password">
					</div> <!-- form-group// -->
					<div class="form-group">
						<button type="submit" class="btn btn-outline-secondary btn-block" name="signup_btn"> Create Account </button>
					</div> <!-- form-group// -->

					<p class="text-center text-dark">Have an account? <a href="loginn.php" class="#">Log In</a> </p>
				</div>
			</form>
		</div>
	</div> <!-- card.// -->

</div>
<!--container end.//-->

<div class="container bg-mattBlackLight">
	<div class="card  shadow mb-4">
		<div class="card-header py-3">
			<h1 class="text-dark font-weight-bold"> Admin List

				<button type="button" class="btn btn-outline-danger float-right" data-toggle="modal" data-target="#adminprofile">
					Add Profile
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
				$query = "SELECT * FROM adminlogin";
				$stmt = $conn->prepare($query);
				$stmt->execute();
				$result = $stmt->get_result();
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
							<th>Edit</th>

						</tr>
					</thead>
					<tbody>
						<?php while ($row = $result->fetch_assoc()) { ?>
							<tr>
								<td><?= $row['id']; ?></td>

								<td><?= $row['fullName']; ?></td>
								<td><?= $row['username']; ?></td>
								<td><?= $row['gmail']; ?></td>
								<td><?= $row['phone']; ?></td>

								<td class="text-center">
									<form action="admin_edit.php" method="post">
										<input type="hidden" name="edit_id" value="<?= $row['id']; ?>">
										<button type="submit" name="edit_btn" class=" btn btn-success">EDIT</button>
									</form>
								</td>
								<td class="text-center">
									<a href="signupcode.php?delete=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Do you want Delete this user!')">DELETE</a>
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
include "includes/scripts.php";
include "includes/footer.php";
?>