<?php
include 'admin/database/config.php';

session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
$u = $_SESSION["userid"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/userstyle.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<nav class="navbar navbar-expand-md bg-dark navbar-dark">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav">
					<li class="nav-item">
						<?php
						if (isset($_SESSION["userid"])) { ?>
							<a class="nav-link" href="logout.php">Logout</a>
						<?php
						} else { ?>

							<a class="nav-link" href="loginn.php">Signup/Login</a>


						<?php   }
						?>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item move">
						<a class="nav-link" href="home1.php">Home</a>
					</li>
					<li class="nav-item move">
						<a class="nav-link" href="movies1.php">Movies</a>
					</li>
					<li class="nav-item  move">
						<a class="nav-link" href="cinema.php">Cinemas</a>
					</li>
					<li class="nav-item  move">
						<a class="nav-link" href="aboutus.php">About Us</a>
					</li>
					<li class="nav-item">
						<?php
						if (isset($_SESSION["userid"])) { ?>
							<a class="nav-link" href="bookinghistory.php">Booking history</a>
						<?php
						}
						?>
					</li>
				</ul>
			</div>
		</nav>
		<div id="demo" class="carousel slide" data-ride="carousel">

			<!-- Indicators -->
			<ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>
				<li data-target="#demo" data-slide-to="2"></li>
			</ul>

			<!-- The slideshow -->
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="carousel images/cinema1.jpg" alt="Los Angeles">
				</div>
				<div class="carousel-item">
					<img src="carousel images/cinema3.jpg" alt="Chicago">
				</div>
				<div class="carousel-item">
					<img src="carousel images/background.jpg" alt="New York">
				</div>
			</div>

			<!-- Left and right controls -->
			<a class="carousel-control-prev" href="#demo" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next" href="#demo" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>
		</div>
		<div class="card  shadow mb-4">

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
					$query = "SELECT u.name,c.cin_name,m.mov_name,s.show_date,s.show_starttime,s.show_endtime 
                 FROM booking b left join cinema c on c.cin_id=b.cin_id left join movie m on m.mov_id=b.mov_id left join showtime s on s.show_id=b.show_id left join userlogin u on u.user_id=b.user_id where u.user_id=$u";
					$stmt = $conn->prepare($query);
					$stmt->execute();
					$result = $stmt->get_result();
					?>


					<table class="table table-bordered" id="dataTable" width="100%" cellspacing='0'>
						<thead class="thead-dark text-center">
							<tr>
								<th>Name</th>
								<th>Cinema Name</th>
								<th>Movie Name</th>
								<th>Show Date</th>
								<th>Show Starttime</th>
								<th>show-endtime</th>

								<th>View</th>

							</tr>
						</thead>
						<tbody>
							<?php while ($row = $result->fetch_assoc()) { ?>
								<tr>
									<td><?= $row['name']; ?></td>
									<td><?= $row['cin_name']; ?></td>
									<td><?= $row['mov_name']; ?></td>

									<td><?= $row['show_date']; ?></td>


									<td><?= $row['show_starttime']; ?></td>
									<td><?= $row['show_endtime']; ?></td>




									<td class="text-center">
										<a href="display.php" class="btn btn-info btn-lg">View</a>
									</td>

								</tr>
							<?php } ?>



						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


</body>

</html>