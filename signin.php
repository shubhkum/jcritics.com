<?php 
	require_once('include/db.php');
?>
<?php require_once('include/session.php'); ?>
<?php require_once('include/functions.php'); ?>

<?php 
	if(isset($_POST['submit'])){
		global $con;
		$username=mysqli_real_escape_string($con,$_POST['username']);
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$password=mysqli_real_escape_string($con,$_POST['password']);
		$Confirm_Password=mysqli_real_escape_string($con,$_POST['confirm_password']);
		$token=bin2hex(openssl_random_pseudo_bytes(40));

		if(empty($username)||empty($password)||empty($Confirm_Password)||empty($email)){
			$_SESSION['ErrorMessage']='All fields must be filled out';
			Redirect_to("signin.php");
		}
		elseif ($password!==$Confirm_Password) {
			$_SESSION['ErrorMessage']='Passwords do not match';
			Redirect_to("signin.php");
		}
		elseif (strlen($password)<6) {
			$_SESSION['ErrorMessage']='Passwords should be at least 6 letters long';
			Redirect_to("signin.php");
		}
		elseif (check_email_exists($email)) {
			$_SESSION['ErrorMessage']='You already have an account!!';
			Redirect_to("signin.php");
		}
		else{
					global $con;
					$hashed_password=password_encryption($password);
					$query="INSERT INTO users(username,password,email,token) VALUES('$username','$hashed_password','$email','$token')";
					$execute=mysqli_query($con,$query);
					if($execute){
						$_SESSION['SuccessMessage']="User Added Successfully";
						Redirect_to('login.php');
					}
					else{
						$_SESSION['ErrorMessage']="User Failed to add";
						Redirect_to('signin.php');
					}

		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!--Font Awesome-->
	<!--<script src="https://kit.fontawesome.com/f7ef469c0b.js"></script>-->
	<!--Bootstrap javascript -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.4.1.min.js"></script>
	<!---CSS FILE-->
	<link rel="stylesheet" type="text/css" href="css/signin_style.css">

</head>
<body>
	<div class="container">
		<div class="row">

			<div class="col-sm-4 offset-4">
				<h2>Create Your Account</h2>
				<?php echo Message();
				     echo SuccessMessage(); ?>
				<div>
					<form action="signin.php" method="post">
						<fieldset>
							<div class="form-group">
							<label for="username"><span class="fieldinfo">UserName:</span></label>
							<input class="form-control" type="text" name="username" id="username" placeholder="UserName">
							</div>
							<div class="form-group">
							<label for="email"><span class="fieldinfo">Email:</span></label>
							<input class="form-control" type="email" name="email" id="email" placeholder="Email">
							</div>
							<div class="form-group">
							<label for="password"><span class="fieldinfo">Password:</span></label>
							<input class="form-control" type="password" name="password" id="Password" placeholder="Password">
							</div>
							<div class="form-group">
							<label for="confirm_password"><span class="fieldinfo">Confirm Password:</span></label>
							<input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password">
							</div>
							<br>
							<input type="Submit" name="submit" value="Submit" class="btn btn-success btn-block">
							
							<div class="float-right" style="margin-top: 10px;">
							<span style="color:#000000DB;margin-right: 10px;">Have an account?</span><a href="login.php">Login</a>
							</div>
						</fieldset>
						
					</form>
					
				</div>
				

				
			</div><!-- Ending of Main Area-->
		</div><!--Row Ending-->
	</div><!--Container Ending-->

	
</body>
</html>