<?php
	session_start();
	include 'admin/database/config.php';
	if(isset($_SESSION["userid"]))
	{
		if(isset($_GET["cin_id"]) && isset($_GET["show_id"]))
		{
			$_SESSION["cin_id"]=$_GET['cin_id'];
			$_SESSION["show_id"]=$_GET['show_id'];
		}
		else if(isset($_GET["mov_id"]) && isset($_GET["show_id"]))
		{
			$_SESSION["mov_id"]=$_GET['mov_id'];
			$_SESSION["show_id"]=$_GET['show_id'];
		}
	
		$c=$_SESSION["cin_id"];
		$m=$_SESSION["mov_id"];
		$s=$_SESSION["show_id"];
		$u=$_SESSION["userid"];
		
		$myArr = array();
		$query="select book_seat from booking where mov_id=$m and show_id=$s  and cin_id=$c ";
		$resultset=mysqli_query($conn,$query) or die("database error:".mysqli_error($conn));
		while($record=mysqli_fetch_array($resultset))
		{
			$ex=explode(',', $record['book_seat']);//what will do here
			 foreach($ex as $out) 
			 {
				$myArr[] = $out;
			 }
		}
		
		
		if(isset($_POST["book_seat"]))
		{
			$seats_arr=$_POST["seats"];
			//print_r($seats_arr);
			//echo "<br/>";
			$selected_seats=implode(",",$seats_arr);
			//echo "Selected Seats ".$selected_seats;
			$query="INSERT INTO booking(book_seat,user_id,mov_id,cin_id,show_id) VALUES('".$selected_seats."',".$u.",".$m.",".$c.",".$s.")";
			$result=mysqli_query($conn,$query) or die("database error:".mysqli_error($conn));
			exit();
		}

	}
	else
	{
		$_SESSION["iv_user"]="Please Login To Book Ticket <a href='loginn.php'>Login</a>";
		header("Location:".$_SESSION['url']);
	}
	
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Lato', sans-serif;
			text-decoration: none;
			color: unset;
		}

		body {
			background: url(images/banner.jpg) no-repeat center;
			background-size: cover;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			-ms-background-size: cover;
			background-attachment: fixed;
			font-family: 'Source Sans Pro', sans-serif;
		}

		.wrapper {
			display: grid;
			grid-template-columns: repeat(20, 0.2fr);
			grid-gap: 1em;
			grid-auto-rows: minmax(1px, auto);

		}

		.seattable {
			width: 700px;
			margin: 0 5vw;
			background: rgba(128, 128, 128, 0.34);
			padding: 3.5vw;
			box-sizing: border-box;
			display: flex;
			display: -webkit-flex;
			flex-wrap: wrap;
		}

		ul {

			list-style: none;

		}

		h1,
		h2 {
			width: 40px;
			font-weight: 600;
			font-size: 1.5em;
			color:#000;
			height: 24px;
		}

		li {
			font-size: 1em;
			color: black;
			font-family: Arial, Helvetica, sans-serif;
			padding-left: 10px;
			margin-top: 10px;
			justify-content: center;

		}

		@media (max-width: 480px) {
			.seattable {
				width: 450px;
			}
		}

		@media (max-width: 600px) {
			.seattable {
				width: 500px;
			}
		}

		@media only screen and (max-width: 64em) {
			body {
				padding-bottom: 82px !important;
			}
		}

		@media (max-width: 768px) {
			body {
				padding-top: 36px !important;
				padding-bottom: 64px !important;
			}
		}
	</style>
	<script type="text/javascript">
		var values = [];
		$(document).ready(function() {
			$(".sat").click(function() {
				var uid = this.id;
				//alert(uid);
				if (values.includes(uid)) {
					$(this).attr("src", "seat-empty.png");
					var index = values.indexOf(uid);
					if (index > -1) {
						values.splice(index, 1);
					}
					$("p").last().html(values);
				} else {
					$(this).attr("src", "seat-selected.png");
					values.push($(this).attr('id'));
					$("p").last().html(values);
				}
			});
			$("#btn_seat_book").click(function() {
				$.ajax({
						url: 'book1.php',
						type: 'POST',
						data: {
							book_seat: 'book_seat',
							seats: values
						},
						dataType: 'html'
					})
					.done(function(data){
						//alert(data);
						window.location.assign("book1.php");
					})
					.fail(function(data) {
						alert(data);
					});
			});
		});
	</script>
</head>
<body>
	<div class="container">
		<div class="seattable">
			<div class="wrapper">
				<?php

				for ($i = 0; $i <= 10; $i++) {
					if ($i == 0) {
						?> <h2></h2>
					<?php   } else {
							$s = " " . $i; ?>
						<h2 style="color:white"><?php echo $s; ?></h2>
					<?php   } ?>
				<?php   } ?>
			</div>
			<div class="wrapper">
				<h2 style="color:white"> A</h2>
				<?php
				for ($i = 1; $i <= 10; $i++) { ?>
					<?php
						$check = "A" . $i;
						if (in_array($check, $myArr)) { ?>
						<img id="A<?php echo $i ?>" src="seat-booked.png" height="40px">
					<?php
						} else { ?>
						<img class="sat" id="A<?php echo $i ?>" src="seat-empty.png" height="40px">
					<?php } ?>

				<?php } ?>
				</a>
			</div>

			<div class="wrapper">
				<h2 style="color:white"> B</h2>
				<?php
				for ($i = 1; $i <= 10; $i++) { ?>
					<?php
						$check = "B" . $i;
						if (in_array($check, $myArr)) { ?>
						<img id="B<?php echo $i ?>" src="seat-booked.png" height="40px">
					<?php
						} else { ?>
						<img class="sat" id="B<?php echo $i ?>" src="seat-empty.png" height="40px">
					<?php   } ?>

				<?php } ?>
				</a>
			</div>
			<div class="wrapper">
				<h2 style="color:white"> C</h2>
				<?php
				for ($i = 1; $i <= 10; $i++) { ?>
					<?php
						$check = "C" . $i;
						if (in_array($check, $myArr)) { ?>
						<img id="C<?php echo $i ?>" src="seat-booked.png" height="40px">
					<?php
						} else { ?>
						<img class="sat" id="C<?php echo $i ?>" src="seat-empty.png" height="40px">
					<?php   } ?>

				<?php } ?>
				</a>
			</div>
			<div class="wrapper">
				<h2 style="color:white">D</h2>
				<?php
				for ($i = 1; $i <= 10; $i++) { ?>

					<?php
						$check = "D" . $i;
						if (in_array($check, $myArr)) { ?>
						<img id="D<?php echo $i ?>" src="seat-booked.png" height="40px">
					<?php
						} else { ?>
						<img class="sat" id="D<?php echo $i ?>" src="seat-empty.png" height="40px">
					<?php   } ?>

				<?php } ?>
				</a>
			</div>

			<div class="wrapper">
				<h2 style="color:white">E</h2>
				<?php
				for ($i = 1; $i <= 10; $i++) { ?>
					<?php
						$check = "E" . $i;
						if (in_array($check, $myArr)) { ?>
						<img id="E<?php echo $i ?>" src="seat-booked.png" height="40px">
					<?php
						} else { ?>
						<img class="sat" id="E<?php echo $i ?>" src="seat-empty.png" height="40px">
					<?php   } ?>

				<?php } ?>
				</a>
			</div>
			<div class="wrapper">
				<h2 style="color:white">F</h2>
				<?php
				for ($i = 1; $i <= 10; $i++) { ?>
					<?php
						$check = "F" . $i;
						if (in_array($check, $myArr)) { ?>
						<img id="F<?php echo $i ?>" src="seat-booked.png" height="40px">
					<?php
						} else { ?>
						<img class="sat" id="F<?php echo $i ?>" src="seat-empty.png" height="40px">
					<?php   } ?>

				<?php } ?>
				</a>
			</div>
			<div class="wrapper">
				<h2 style="color:white">G</h2>
				<?php
				for ($i = 1; $i <= 10; $i++) { ?>
					<?php
						$check = "G" . $i;
						if (in_array($check, $myArr)) { ?>
						<img id="G<?php echo $i ?>" src="seat-booked.png" height="40px">
					<?php
						} else { ?>
						<img class="sat" id="G<?php echo $i ?>" src="seat-empty.png" height="40px">
					<?php   } ?>

				<?php } ?>
				</a>
			</div>
			<div class="wrapper">
				<h2 style="color:white">H</h2>
				<?php
				for ($i = 1; $i <= 10; $i++) { ?>
					<?php
						$check = "H" . $i;
						if (in_array($check, $myArr)) { ?>
						<img id="H<?php echo $i ?>" src="seat-booked.png" height="40px">
					<?php
						} else { ?>
						<img class="sat" id="H<?php echo $i ?>" src="seat-empty.png" height="40px">
					<?php   } ?>

				<?php } ?>
				</a>
			</div>
			<div class="wrapper">
				<h2 style="color:white">I</h2>
				<?php
				for ($i = 1; $i <= 10; $i++) { ?>
					<?php
						$check = "I" . $i;
						if (in_array($check, $myArr)) { ?>
						<img id="I<?php echo $i ?>" src="seat-booked.png" height="40px">
					<?php
						} else { ?>
						<img class="sat" id="I<?php echo $i ?>" src="seat-empty.png" height="40px">
					<?php   } ?>

				<?php } ?>
				</a>
			</div>
			<div class="wrapper">
				<h2 style="color:white">J</h2>
				<?php
				for ($i = 1; $i <= 10; $i++) { ?>
					<?php
						$check = "J" . $i;
						if (in_array($check, $myArr)) { ?>
						<img id="J<?php echo $i ?>" src="seat-booked.png" height="40px">
					<?php
						} else { ?>
						<img class="sat" id="J<?php echo $i ?>" src="seat-empty.png" height="40px">
					<?php   } ?>

				<?php } ?>
				</a>
			</div>

			<ul class="seat_w3ls">
				<li style="color:white"> <span><img src="seat-selected.png" height="24px"></span>Selected Seat</li>

				<li style="color:white"> <span><img src="seat-booked.png" height="24px"></span>Reserved Seat</li>

				<li style="color:white"><span><img src="seat-empty.png" height="24px"></span>Empty Seat</li>
			</ul>

			<div class=" container " style="overflow-y:auto;">
				<table class="table" width="100%">
					<tbody>
						<tr>
							<th class="text-warning">SEATS:</th>
							<th class="text-warning">
								<p></p>
							</th>

						</tr>


					</tbody>
				</table>
			</div>

			<div class="container-fluid">
				<button type="button" id="btn_seat_book" class="btn-outline-secondary btn-lg btn-block ">Book Ticket</button>
			</div>
		</div>
	</div>
</body>
<?php
	
?>
</html>