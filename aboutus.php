<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style type="text/css">
  
/* About Us */
h3,h5,h2,p
{
	color:#fff;
	
}
p
{
	font: caption;
	  font-family: cursive;
}

body
  {
	background-color:#070707 !important;
  }
.team-social li {
    display: inline-block;
}

ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.team-img {
    position: relative;
    width: 210px;
    height: 210px;
    border: 4px solid #276aff;
    border-radius: 50%;
    overflow: hidden;
    margin: 0 auto;
}

#team-area {
    padding: 115px 0 100px;
    background-image: url(../images/team-bg-left.png), url(../images/team-bg-right.png);
    background-position: left bottom, right top;
    background-repeat: no-repeat, no-repeat;
    background-size: contain
}

#team-area.bg-1 {
    background-image: url(../images/team-bg-left-1.png), url(../images/team-bg-right-1.png);
}

.team-img {
    position: relative;
    width: 210px;
    height: 210px;
    border: 4px solid #ffce26;
    border-radius: 50%;
    overflow: hidden;
    margin: 0 auto
}



.team-social {
    position: absolute;
    top: 201px;
    left: 0;
    right: 0;
    bottom: 0;
    padding: 25px;
    -webkit-clip-path: ellipse(50% 95% at 50% 97%);
    clip-path: ellipse(50% 95% at 50% 97%);
    background-image: -webkit-gradient(linear, left top, right top, from(#20007e), to(#e61eb6));
    background-image: linear-gradient(90deg, #20007e 0%, #e61eb6 100%);
}

.team-social.two {
    background-image: linear-gradient(30deg, rgb(157, 91, 254) 0%, rgb(56, 144, 254) 100%);
}

.team-social li {
    display: inline-block;
}

.team-social li a {
    display: block;
    border: 1px solid #fff;
    width: 30px;
    height: 30px;
    line-height: 30px;
    border-radius: 50%;
    color: #fff;
    margin: 0 2px
}



.team-info h3 {
    font-weight: 600;
    margin-top: 20px;
}

.team-info p {
    color: #ffce26;
    text-transform: uppercase
}

.section-heading {
    margin-bottom: 54px;
}

.section-heading h5 {
    color: #ffce26;
    font-weight: 700;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.section-heading h2 {
    font-weight: 700;
    margin-bottom: 10px;
}

.section-heading p {
    font-size: 16px;
    line-height: 26px
}
h3,h5,h2,p
{
	color:#fff;
	
}
p
{
	font: caption;
	  font-family: cursive;
}
  </style>
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
						if(isset($_SESSION["username"]))
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
									if(isset($_SESSION["username"]))
									{?>
											<a class="nav-link" href="bookinghistory.php">Booking history</a>
									<?php		
									}
								 ?>	
					  </li>  
					</ul>
				</div>  
	</nav>
	<br><br>
	<section id="team-area" data-scroll-index="4">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
					<div class="section-heading text-center">
						<h5>Our creative team</h5>
						<h2>Meet The Team</h2>
						<p>Meet the people behind LearnCodeOnline. Super Cool team of super cool platform!</p>
					</div>
				</div>
			</div>
			<div class="row">
				<!--start team single-->
				<div class="col-lg-3 col-md-6">
					<div class="team-single text-center">
						<div class="team-img">
							<img src="images/Shashikant.jpg" class="img-fluid" alt="">
							<div class="team-social">
								<ul>
									<li><a href="https://fb.com/hiteshchoudharypage"><i class="fa fa-facebook"></i></a></li>
									<li><a href="https://instagram.com/hiteshchoudharyofficial"><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="team-info">
							<h3>Shashikant Gupta</h3>
							<p>Lead trainer and Video creator</p>
						</div>
					</div>
				</div>
				<!--end team single-->
				<!--start team single-->
				<div class="col-lg-3 col-md-6">
					<div class="team-single text-center">
						<div class="team-img">
							<img src="images/rohit.jpg" class="img-fluid" alt="">
							<div class="team-social">
								<ul>
									<li><a href="https://www.facebook.com/sakshamchoudharypage/"><i class="fa fa-facebook"></i></a></li>
									<li><a href="https://www.instagram.com/sakshamthecomputerguy/"><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="team-info">
							<h3>Rohit Gupta</h3>
							<p>Co-Founder</p>
						</div>
					</div>
				</div>
				<!--end team single-->
				<!--start team single-->
				<div class="col-lg-3 col-md-6">
					<div class="team-single text-center">
						<div class="team-img">
							<img src="images/pradeep.jpg" class="img-fluid" alt="">
							<div class="team-social">
								<ul>

									<li><a href="https://www.linkedin.com/in/nativeaditya/"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="team-info">
							<h3>Pradeep Hore</h3>
							<p>Android Developer</p>
						</div>
					</div>
				</div>
				<!--end team single-->
				<!--start team single-->
				<div class="col-lg-3 col-md-6">
					<div class="team-single text-center">
						<div class="team-img">
							<img src="images/vaishali.jpg" class="img-fluid" alt="">
							<div class="team-social">
								<ul>
									<li><a href="https://www.instagram.com/dev_raushanjha/"><i class="fa fa-instagram"></i></a></li>
									<li><a href="https://www.linkedin.com/in/raushan-jha-489063130"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="team-info">
							<h3>Vaishali Gawai</h3>
							<p>Mobile App Developer</p>
						</div>
					</div>
				</div>
				<!-- team single start -->
		</div>
		</div>
	</section>
</div>

</body>
</html>