<?php 
	require_once('include/db.php');
?>
<?php require_once('include/session.php'); ?>
<?php require_once('include/functions.php'); ?>

<?php 
	if(isset($_POST['submit'])){
		$email=mysql_real_escape_string($_POST['email']);

		if(empty($email)){
			$_SESSION['ErrorMessage']='All fields must be filled out';
			Redirect_to("recover.php");
		}
		elseif (!check_email_exists($email)) {
			$_SESSION['ErrorMessage']='Wrong Email';
			Redirect_to("recover.php");
		}
		else{
					global $con;
					$query="SELECT * FROM users WHERE email='$email'";
					$execute=mysqli_query($con,$query);
					if($admin=mysqli_fetch_array($execute)){
						$admin['username'];
						$admin['token'];
						$subject="Reset Passwords";
						$body='Hi'.$admin['username'].'Here is the link to reset your password http://localhost/Avtar/reset_password.php?token='.$admin['token'];
						$sender="From:shubham460kumar@gmail.com";
						if(mail($email,$subject,$body,$sender)){
							$_SESSION['SuccessMessage']="Check Email for Resetting Password";
							Redirect_to('login.php');
						}
						else{
							$_SESSION['SuccessMessage']="Something Went Wrong";
							Redirect_to('login.php');
						}

					}
					else{
						$_SESSION['ErrorMessage']="Wrong Email!!";
						Redirect_to('recover.php');
					}

		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!--Font Awesome-->
	<script src="https://kit.fontawesome.com/f7ef469c0b.js"></script>
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
					<form action="recover.php" method="post">
						<fieldset>
							
							<div class="form-group">
							<label for="email"><span class="fieldinfo">Email:</span></label>
							<input class="form-control" type="email" name="email" id="email" placeholder="Email">
							</div>
							<br>
							<input type="Submit" name="submit" value="Submit" class="btn btn-success btn-block">
							<br>
						</fieldset>
						
					</form>
				</div>
				

				
			</div><!-- Ending of Main Area-->
		</div><!--Row Ending-->
	</div><!--Container Ending-->

	
</body>
</html>