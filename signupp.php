<?php

include "admin/database/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">






	<div class="card bg-light">
		<article class="card-body mx-auto" style="max-width: 400px;">
			<h4 class="card-title mt-3 text-center">Create Account</h4>



			<form action="signupcode.php" method="post">
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-user-circle-o"></i> </span>
					</div>
					<input class="form-control" name="Name" placeholder="Full name" type="text">
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
					
                                    
                                
					
					<input type="text" name="phone" minlength="10" maxlength="10"  class="form-control" placeholder="Your Phone *" value="" />
					
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
					<button type="submit" class="btn btn-primary btn-block" name="signup_btn"> Create Account </button>
				</div> <!-- form-group// -->
				<p class="text-center">Have an account? <a href="loginn.php">Log In</a> </p>
			</form>
		</article>
	</div> <!-- card.// -->

</div>
<!--container end.//-->

	
</body>

</html>

