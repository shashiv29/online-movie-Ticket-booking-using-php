<?php
include "admin/database/config.php";
	session_start();
	$sid=base64_decode(urldecode($_GET['id']));
	$_SESSION["cin_id"]=$sid;
	$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/userstyle1.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  

</head>
<body class="bg_color">
	<div class="container">
		<nav class="navbar navbar-expand-md bg-dark navbar-dark">
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
				  <img src="carousel images/cinema1.jpg"  class="carousel_image" alt="Los Angeles">
				</div>
				<div class="carousel-item">
				  <img src="carousel images/cinema3.jpg"  class="carousel_image" alt="Chicago">
				</div>
				<div class="carousel-item">
				  <img src="carousel images/cinema10.jpg" class="carousel_image" alt="New York" >
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
	<ul class="nav nav-tabs nav-fill">
		  <li class="nav-item">
			<a class="nav-link show_color text-size active"  data-toggle="tab" href="#showtime">Showtime</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link show_color text-size"  data-toggle="tab" href="#aboutcinema">About Cinema</a>
		  </li>
	</ul><br>
	<?php
		include 'admin/database/config.php';
		$date_arr=array();
		$tab_menuquery="select distinct(show_date) from showtime order by show_date";
		$menu_result=mysqli_query($conn,$tab_menuquery) or die("database error:".mysqli_error($conn));
		while($record=mysqli_fetch_assoc($menu_result))
		{
			$date_arr[]=$record["show_date"];
		}
	?>
	<div class="tab-content">
		<div id="showtime" class="tab-pane active">
			<ul class="nav nav-pills">
				<li class="btn btn-group nav-item active">
					<button class="btn btn-outline-danger nav-link active"  data-toggle="tab" href="#day1"><?php echo date("F j",strtotime($date_arr[0])); ?></button>
				</li>
				<li class="btn btn-group nav-item">
					<button class="btn btn-outline-danger nav-link"  data-toggle="tab" href="#day2"><?php echo date("F j",strtotime($date_arr[1])); ?></button>
				</li>
				<li class="btn btn-group nav-item">
					<button class=" btn btn-outline-danger nav-link"  data-toggle="tab" href="#day3"><?php echo date("F j",strtotime($date_arr[2])); ?></button>
				</li>
				<li class="btn btn-group nav-item">
					<button class="btn btn-outline-danger nav-link"  data-toggle="tab" href="#day4"><?php echo date("F j",strtotime($date_arr[3])); ?></button>
				</li>
				<li class="btn btn-group nav-item">
					<button class="btn btn-outline-danger nav-link"  data-toggle="tab" href="#day5"><?php echo date("F j",strtotime($date_arr[4])); ?></button>
				</li>
			</ul>
		<br><br>
			<div class="tab-content">
				<div id="day1" class="tab-pane active">
					<?php
						$query="select mov_id,mov_name from movie where mov_status='Running Movies'";
						$resultset=mysqli_query($conn,$query) or die("database error:".mysqli_error($conn));
						while($record=mysqli_fetch_assoc($resultset))
						{
							 $c=$record['mov_id'];
					?>
						<h4><?php echo $record['mov_name'];?></h4>
		
							<?php
								$query1="select show_id,show_starttime from showtime where cin_id=$sid and mov_id=$c and show_date='$date_arr[0]'";
								$resultset1=mysqli_query($conn,$query1) or die("database error:".mysqli_error($conn));
								while($record1=mysqli_fetch_assoc($resultset1))
								{
							?>
									<a class="btn btn-info mar" href="book1.php?mov_id=<?php echo $record['mov_id'] ?>&show_id=<?php echo $record1['show_id'] ?> " ><?php echo date("H:i",strtotime($record1['show_starttime'])) ;?></a>
							<?php
								}
							?>
							<hr class="line">
					<?php
						}
					?>
				</div>
				<div id="day2" class="tab-pane">
					<?php
						$query="select mov_id,mov_name from movie where mov_status='Running Movies'";
						$resultset=mysqli_query($conn,$query) or die("database error:".mysqli_error($conn));
						while($record=mysqli_fetch_assoc($resultset))
						{
							 $c=$record['mov_id'];
					?>
						<h4><?php echo $record['mov_name'];?></h4>
		
							<?php
	
								$query1="select show_id,show_starttime from showtime where cin_id=$sid and mov_id=$c and show_date='$date_arr[1]'";
								$resultset1=mysqli_query($conn,$query1) or die("database error:".mysqli_error($conn));
								while($record1=mysqli_fetch_assoc($resultset1))
								{
							?>
									<a class="btn btn-info mar" href="book1.php?mov_id=<?php echo $record['mov_id'] ?>&show_id=<?php echo $record1['show_id'] ?> " ><?php echo date("H:i",strtotime($record1['show_starttime'])) ;?></a>
							<?php
								}
							?>
							<hr class="line">
					<?php
						}
					?>
				</div>
				<div id="day3" class="tab-pane">
					<?php
						$query="select mov_id,mov_name from movie where mov_status='Running Movies'";
						$resultset=mysqli_query($conn,$query) or die("database error:".mysqli_error($conn));
						while($record=mysqli_fetch_assoc($resultset))
						{
							 $c=$record['mov_id'];
					?>
						<h4><?php echo $record['mov_name'];?></h4>
		
							<?php
	
								$query1="select show_id,show_starttime from showtime where cin_id=$sid and mov_id=$c and show_date='$date_arr[2]'";
								$resultset1=mysqli_query($conn,$query1) or die("database error:".mysqli_error($conn));
								while($record1=mysqli_fetch_assoc($resultset1))
								{
							?>
									<a class="btn btn-info mar" href="book1.php?mov_id=<?php echo $record['mov_id'] ?>&show_id=<?php echo $record1['show_id'] ?> " ><?php echo date("H:i",strtotime($record1['show_starttime'])) ;?></a>
							<?php
								}
							?>
							<hr class="line">
					<?php
						}
					?>
				</div>
				<div id="day4" class="tab-pane">
					<?php
						$query="select mov_id,mov_name from movie where mov_status='Running Movies'";
						$resultset=mysqli_query($conn,$query) or die("database error:".mysqli_error($conn));
						while($record=mysqli_fetch_assoc($resultset))
						{
							 $c=$record['mov_id'];
					?>
						<h4><?php echo $record['mov_name'];?></h4>
		
							<?php
	
								$query1="select show_id,show_starttime from showtime where cin_id=$sid and mov_id=$c and show_date='$date_arr[3]'";
								$resultset1=mysqli_query($conn,$query1) or die("database error:".mysqli_error($conn));
								while($record1=mysqli_fetch_assoc($resultset1))
								{
							?>
									<a class="btn btn-info mar" href="book1.php?mov_id=<?php echo $record['mov_id'] ?>&show_id=<?php echo $record1['show_id'] ?> " ><?php echo date("H:i",strtotime($record1['show_starttime'])) ;?></a>
							<?php
								}
							?>
							<hr class="line">
					<?php
						}
					?>
				</div>
				<div id="day5" class="tab-pane">
					<?php
						$query="select mov_id,mov_name from movie where mov_status='Running Movies'";
						$resultset=mysqli_query($conn,$query) or die("database error:".mysqli_error($conn));
						while($record=mysqli_fetch_assoc($resultset))
						{
							 $c=$record['mov_id'];
					?>
						<h4><?php echo $record['mov_name'];?></h4>
		
							<?php
	
								$query1="select show_id,show_starttime from showtime where cin_id=$sid and mov_id=$c and show_date='$date_arr[4]'";
								$resultset1=mysqli_query($conn,$query1) or die("database error:".mysqli_error($conn));
								while($record1=mysqli_fetch_assoc($resultset1))
								{
							?>
									<a class="btn btn-info mar" href="book1.php?mov_id=<?php echo $record['mov_id'] ?>&show_id=<?php echo $record1['show_id'] ?> " ><?php echo date("H:i",strtotime($record1['show_starttime'])) ;?></a>
							<?php
								}
							?>
							<hr class="line">
					<?php
						}
					?>
				</div>
			</div>
		</div>
		<?php
			$sid = base64_decode(urldecode($_GET['id']));
			$movieQuery = "SELECT * FROM cinema WHERE cin_id = $sid";
			$movieImageById = mysqli_query($conn, $movieQuery);
			$row = mysqli_fetch_array($movieImageById);
			?>
			<div id="aboutcinema" class="tab-pane">
				<div class="show_color">

					<div class="jumbotron" style='background-color:black;'>
						<div class="d-flex align-items-stretch">
							<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
								<div class="card card-color border-light text-white shadow">
									<div class="inner img-thumbnail img-fluid ">
										<?php
										echo '<img id="cinema-image"  src="' . $row['cin_image'] . '" alt="" >';
										?>
									</div>

								</div>
							</div>

							<div class="table-responsive ">

								<table class="table text-center font-weight-normal" border="5px solid red">
									<tr>
										<td class="text-warning">NAME</td>
										<td class="text-white"><?php echo $row['cin_name']; ?></td>
									</tr>
									<tr>
										<td class="text-warning">Address</td>
										<td class="text-white"><?php echo $row['cin_address']; ?></td>
									</tr>
									<tr>
										<td class="text-warning">Description</td>
										<td class="text-white"><?php echo $row['cin_description']; ?></td>
									</tr>
									
								</table>

							</div>
						</div>

					</div>


				</div>
			</div>
	</div>
 </div>
</body>
</html>
