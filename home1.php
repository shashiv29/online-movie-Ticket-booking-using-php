<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
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
			   <h2 class="navbar-brand brand" href="#">Cinematic</h2>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			  </button>
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav">
					  <li class="nav-item">
						<?php 
						if(isset($_SESSION["userid"]))
						{?>
											<a class="nav-link" href="logout.php">Logout</a>
						<?php		
						}	
						else
						{?>
										 
						<a class="nav-link" href="loginn.php">Signup/Login</a>
											
		 
					<?php  }
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
									if(isset($_SESSION["userid"]))
									{?>
											<a class="nav-link" href="bookinghistory.php">Booking history</a>
									<?php		
									}
								 ?>	
						  </li> 
					</ul>
				</div>  
	</nav>
	<br>
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
				  <img src="carousel images/background.jpg" alt="New York" >
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
<br>
		<h5>Trending Movies</h5>
		<div class="row">
			<?php
					include 'admin/database/config.php';
					$query="select * from movie where mov_status='Running Movies' and mov_trend='Trending movie'";
					$resultset=mysqli_query($conn,$query) or die("database error:".mysqli_error($conn));
					while($record=mysqli_fetch_assoc($resultset))
					{
				?>
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
					<div class="card card-color border-light text-white shadow">
					<div class="inner">
						<img src="admin/<?php echo $record['mov_image'];?>" class="card-img-top" width="300px">
					</div>
						<div class="card-body">
							<h4 class="card-title"><?php echo $record['mov_name'];?></h4>
							<h6 class="card-subtitle mb-2 text-muted"><?php echo $record['mov_type'];?></h6>
							<a class="btn btn-outline-danger btn-block a_color" href="showtime_movie.php?id=<?php echo urlencode(base64_encode($record["mov_id"])); ?> ">Book Ticket</a>
						</div>
					</div>
				</div>
				<?php
					}
				?>
			</div>
<br>
		<h5>OUR CINEMAS</h5>
		<div class="row">
			<?php
					include 'admin/database/config.php';
					$query="select * from cinema";
					$resultset=mysqli_query($conn,$query) or die("database error:".mysqli_error($conn));
					while($record=mysqli_fetch_assoc($resultset))
					{
			?>
				<div class="col-lg-3 col-md-12 col-sm-6 col-xs-6">
					<div class="card card-color border-light text-white">
						<div class="inner">
							<img src="admin/<?php echo $record['cin_image'];?>" class="card-img-top">
						</div>
						<div class="card-body">
							<h4 class="card-title"><?php echo $record['cin_name'];?></h4>
							<h6 class="card-subtitle mb-2 text-muted"><?php echo $record['cin_address'];?></h6>
							<a class="btn btn-outline-danger btn-block a_color" href="showtime_cinema.php?id=<?php echo urlencode(base64_encode($record["cin_id"])); ?> ">Book Here</a>
						</div>
					</div>
				</div>
			<?php
					}
			?>
		</div>
</div>
</body>
</html>
<?php
include "footer.php";
?>